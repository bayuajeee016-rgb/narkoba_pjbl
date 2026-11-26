<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'] ?? 0;
$query = mysqli_query($conn, "SELECT * FROM berita WHERE id = '$id'");
$berita = mysqli_fetch_assoc($query);

if (!$berita) { header("Location: index.php"); exit; }

$bagian_konten = explode("\n[SUMBER]\n", $berita['konten'], 2);
$isi_artikel = $bagian_konten[0];
$daftar_sumber = isset($bagian_konten[1])
    ? preg_split('/\R/', trim($bagian_konten[1]))
    : [];

if (isset($_POST['kirim_komentar'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    mysqli_query($conn, "INSERT INTO komentar (id_berita, nama, isi_komentar) VALUES ('$id', '$nama', '$isi')");
    header("Location: detail.php?id=$id");
}

$komentar = mysqli_query($conn, "SELECT * FROM komentar WHERE id_berita = '$id' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($berita['judul']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        (function () {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.body.setAttribute('data-theme', savedTheme || (prefersDark ? 'dark' : 'light'));
        })();
    </script>
    <style>
        :root {
            --bg: #f8fafc;
            --panel: #ffffff;
            --panel-soft: #f8fafc;
            --text: #0f172a;
            --text-soft: #475569;
            --line: #e2e8f0;
            --shadow: rgba(15,23,42,0.08);
            --danger-soft: #fff1f2;
        }
        body[data-theme="dark"] {
            --bg: #020817;
            --panel: #0f172a;
            --panel-soft: #111827;
            --text: #e2e8f0;
            --text-soft: #cbd5e1;
            --line: rgba(148,163,184,0.25);
            --shadow: rgba(2,8,23,0.72);
            --danger-soft: rgba(127, 29, 29, 0.25);
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: var(--text); }
        body[data-theme="dark"] { background: linear-gradient(180deg, #020817, #0f172a); }
        .theme-panel { background: var(--panel); border-color: var(--line); box-shadow: 0 20px 40px var(--shadow); }
        .theme-muted { color: var(--text-soft); }
        .theme-soft { background: var(--panel-soft); }
    </style>
</head>
<body data-theme="light" class="min-h-screen">
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-40 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between gap-4">
            <a href="index.php" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-sky-500 to-cyan-400 text-white flex items-center justify-center shadow-lg shadow-sky-200">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>
                <div>
                    <strong class="block text-base text-slate-900">GEN SEHAT</strong>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-sky-600">Artikel</span>
                </div>
            </a>
            <div class="flex items-center gap-2">
                <button id="themeToggle" type="button" class="flex items-center justify-center w-9 h-9 rounded-xl border border-slate-200 bg-slate-100 text-slate-700 hover:bg-slate-200 transition" aria-label="Toggle dark mode">
                    <i class="fa-solid fa-moon"></i>
                </button>
                <a href="index.php" class="px-3 py-2 rounded-xl bg-slate-100 text-sm font-semibold text-slate-700 hover:bg-slate-200">Beranda</a>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <a href="edit.php?id=<?= (int) $berita['id'] ?>" class="px-3 py-2 rounded-xl bg-amber-100 text-sm font-semibold text-amber-700 hover:bg-amber-200">Edit</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-10">
        <div class="grid lg:grid-cols-12 gap-8">
            <article class="theme-panel lg:col-span-8 border rounded-[2rem] p-6 sm:p-8 shadow-sm">
                <div class="mb-4 inline-flex rounded-full bg-sky-100 text-sky-700 text-[10px] font-bold uppercase tracking-[0.18em] px-3 py-1.5">
                    <?= htmlspecialchars($berita['kategori']); ?>
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight"><?= htmlspecialchars($berita['judul']); ?></h1>
                <div class="mt-4 flex flex-wrap gap-3 text-sm text-slate-500 border-b border-slate-200 pb-5">
                    <span><i class="fa-regular fa-calendar mr-2"></i><?= htmlspecialchars($berita['tanggal_buat']); ?></span>
                    <span><i class="fa-regular fa-user mr-2"></i><?= htmlspecialchars($berita['penulis']); ?></span>
                </div>

                <div class="mt-6 text-base leading-8 text-slate-700" style="white-space: pre-line;">
                    <?= htmlspecialchars($isi_artikel, ENT_QUOTES, 'UTF-8'); ?>
                </div>

                <?php if (count($daftar_sumber) >= 2) : ?>
                    <section class="mt-10 rounded-2xl border border-rose-200 bg-rose-50 p-5">
                        <h2 class="text-xl font-extrabold text-slate-900 mb-4">Sumber Bacaan</h2>
                        <ul class="space-y-2 text-sm text-slate-700">
                            <?php for ($i = 0; $i + 1 < count($daftar_sumber); $i += 2) : ?>
                                <?php
                                $judul_sumber = trim($daftar_sumber[$i]);
                                $url_sumber = trim($daftar_sumber[$i + 1]);
                                $skema_sumber = parse_url($url_sumber, PHP_URL_SCHEME);
                                $url_valid = filter_var($url_sumber, FILTER_VALIDATE_URL)
                                    && in_array($skema_sumber, ['http', 'https'], true);
                                ?>
                                <li class="flex flex-col sm:flex-row sm:items-center gap-1">
                                    <span><?= htmlspecialchars($judul_sumber, ENT_QUOTES, 'UTF-8'); ?></span>
                                    <?php if ($url_valid) : ?>
                                        <a href="<?= htmlspecialchars($url_sumber, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer" class="text-sky-600 font-semibold hover:text-sky-700">Buka sumber resmi</a>
                                    <?php elseif ($url_sumber !== '') : ?>
                                        <span class="text-slate-500"><?= htmlspecialchars($url_sumber, ENT_QUOTES, 'UTF-8'); ?></span>
                                    <?php endif; ?>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </section>
                <?php endif; ?>

                <section class="mt-10 rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <h3 class="text-xl font-extrabold text-slate-900 mb-4">Tinggalkan Komentar</h3>
                    <form action="" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Nama</label>
                            <input type="text" name="nama" required class="w-full rounded-xl border border-slate-200 bg-white px-3 py-3 text-sm focus:border-sky-400 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Komentar</label>
                            <textarea name="isi" rows="4" required class="w-full rounded-xl border border-slate-200 bg-white px-3 py-3 text-sm focus:border-sky-400 focus:outline-none focus:ring-4 focus:ring-sky-100"></textarea>
                        </div>
                        <button type="submit" name="kirim_komentar" class="px-5 py-3 rounded-xl bg-sky-600 text-white text-sm font-bold hover:bg-sky-700 transition">Kirim Komentar</button>
                    </form>

                    <div class="mt-8 space-y-4">
                        <h4 class="text-lg font-extrabold text-slate-900">Diskusi Publik</h4>
                        <?php while($k = mysqli_fetch_assoc($komentar)): ?>
                            <div class="rounded-2xl border border-slate-200 bg-white p-4">
                                <div class="flex items-center justify-between gap-2">
                                    <strong class="text-slate-900"><?= htmlspecialchars($k['nama']); ?></strong>
                                    <span class="text-xs text-slate-400"><?= htmlspecialchars($k['tanggal']); ?></span>
                                </div>
                                <p class="mt-2 text-sm text-slate-600 leading-relaxed"><?= htmlspecialchars($k['isi_komentar']); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            </article>

            <aside class="lg:col-span-4 space-y-6">
                <div class="rounded-3xl bg-gradient-to-br from-sky-600 to-cyan-500 text-white p-6 shadow-lg">
                    <div class="w-12 h-12 rounded-2xl bg-white/15 flex items-center justify-center text-xl mb-4">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>
                    <h3 class="text-xl font-extrabold">Inti pesan</h3>
                    <p class="mt-2 text-sm text-sky-100">Mengenali bahaya sejak dini adalah langkah awal untuk menjaga masa depan yang sehat dan produktif.</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-white p-6">
                    <h3 class="text-lg font-extrabold text-slate-900 mb-3">Konten rekomendasi</h3>
                    <div class="space-y-3 text-sm">
                        <a href="index.php?kategori=Edukasi#artikel" class="block rounded-2xl bg-slate-50 border border-slate-200 p-3 hover:border-sky-200 hover:bg-sky-50 transition">Edukasi</a>
                        <a href="index.php?kategori=Pencegahan#artikel" class="block rounded-2xl bg-slate-50 border border-slate-200 p-3 hover:border-sky-200 hover:bg-sky-50 transition">Pencegahan</a>
                        <a href="index.php?kategori=Pemulihan#artikel" class="block rounded-2xl bg-slate-50 border border-slate-200 p-3 hover:border-sky-200 hover:bg-sky-50 transition">Pemulihan</a>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <script>
        const themeToggle = document.getElementById('themeToggle');
        const setTheme = (theme) => {
            document.body.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
            if (themeToggle) {
                const icon = themeToggle.querySelector('i');
                icon.classList.toggle('fa-moon', theme === 'light');
                icon.classList.toggle('fa-sun', theme === 'dark');
            }
        };

        const storedTheme = localStorage.getItem('theme') || 'light';
        setTheme(storedTheme);

        themeToggle.addEventListener('click', () => {
            const nextTheme = document.body.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            setTheme(nextTheme);
        });
    </script>
</body>
</html>
