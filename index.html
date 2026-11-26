<?php
session_start();
include 'koneksi.php';

function sumberUtamaArtikel($konten)
{
    $bagian_konten = explode("\n[SUMBER]\n", $konten, 2);
    if (!isset($bagian_konten[1])) {
        return ['', ''];
    }

    $daftar_sumber = preg_split('/\R/', trim($bagian_konten[1]));
    if (count($daftar_sumber) < 2) {
        return ['', ''];
    }

    $judul_sumber = trim($daftar_sumber[0]);
    $url_sumber = trim($daftar_sumber[1]);
    $skema_sumber = parse_url($url_sumber, PHP_URL_SCHEME);

    if (!filter_var($url_sumber, FILTER_VALIDATE_URL) || !in_array($skema_sumber, ['http', 'https'], true)) {
        return ['', ''];
    }

    return [$judul_sumber, $url_sumber];
}

$kategori = trim($_GET['kategori'] ?? '');
$keyword = trim($_GET['q'] ?? '');
$judul_halaman = $kategori !== ''
    ? 'Kategori Artikel: ' . htmlspecialchars($kategori, ENT_QUOTES, 'UTF-8')
    : ($keyword !== '' ? 'Hasil Pencarian: ' . htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') : 'Semua Artikel & Informasi');

$query_edukasi = mysqli_query($conn, "SELECT * FROM edukasi ORDER BY id ASC");
$jumlah_modul = mysqli_num_rows($query_edukasi);

$berita_sql = "SELECT * FROM berita WHERE 1=1";
$berita_params = [];
$berita_types = '';

if ($kategori !== '') {
    $berita_sql .= " AND kategori LIKE ?";
    $berita_params[] = '%' . $kategori . '%';
    $berita_types .= 's';
}

if ($keyword !== '') {
    $berita_sql .= " AND (judul LIKE ? OR konten LIKE ? OR penulis LIKE ? OR kategori LIKE ?)";
    $search_term = '%' . $keyword . '%';
    $berita_params = array_merge($berita_params, [$search_term, $search_term, $search_term, $search_term]);
    $berita_types .= 'ssss';
}

$berita_sql .= ' ORDER BY id DESC';

if (!empty($berita_params)) {
    $stmt = mysqli_prepare($conn, $berita_sql);
    if (!$stmt) {
        die('Gagal menyiapkan query: ' . htmlspecialchars(mysqli_error($conn), ENT_QUOTES, 'UTF-8'));
    }
    $refs = [$berita_types];
    foreach ($berita_params as $key => $value) {
        $refs[] = &$berita_params[$key];
    }
    call_user_func_array([$stmt, 'bind_param'], $refs);
    mysqli_stmt_execute($stmt);
    $query_berita = mysqli_stmt_get_result($stmt);
} else {
    $query_berita = mysqli_query($conn, $berita_sql);
}

$terbaru = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC LIMIT 5");
$jumlah_berita = mysqli_num_rows($query_berita);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pusat edukasi dan pencegahan penyalahgunaan zat adiktif ramah remaja dan segala umur.">
    <title>Generasi Sehat - Pusat Edukasi Pencegahan Narkoba</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        (function () {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (prefersDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
            document.body.setAttribute('data-theme', theme);
        })();
    </script>
    <style>
        :root {
            --bg: #f8fafc;
            --bg-soft: #f1f5f9;
            --panel: #ffffff;
            --panel-soft: #f8fafc;
            --panel-alt: #e2e8f0;
            --text: #0f172a;
            --text-soft: #475569;
            --muted: #64748b;
            --line: #e2e8f0;
            --primary: #0ea5e9;
            --primary-strong: #0284c7;
            --success: #10b981;
            --shadow: rgba(15, 23, 42, 0.08);
            --card-shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
            --gradient: linear-gradient(135deg, rgba(14, 165, 233, 0.12), rgba(16, 185, 129, 0.08));
        }
        body[data-theme="dark"] {
            --bg: #020817;
            --bg-soft: #0f172a;
            --panel: #0f172a;
            --panel-soft: #111827;
            --panel-alt: #1e293b;
            --text: #e2e8f0;
            --text-soft: #cbd5e1;
            --muted: #94a3b8;
            --line: rgba(148, 163, 184, 0.25);
            --primary: #38bdf8;
            --primary-strong: #0ea5e9;
            --success: #34d399;
            --shadow: rgba(15, 23, 42, 0.55);
            --card-shadow: 0 24px 60px rgba(2, 8, 23, 0.6);
            --gradient: linear-gradient(135deg, rgba(14, 165, 233, 0.18), rgba(16, 185, 129, 0.12));
            color-scheme: dark;
        }
        html { scroll-behavior: smooth; scroll-padding-top: 5rem; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: var(--text); }
        ::selection { background: rgba(16, 185, 129, 0.22); }
        button, a { -webkit-tap-highlight-color: transparent; }
        .hero-glow { background: radial-gradient(circle at 16% 12%, rgba(16,185,129,.2), transparent 30%), radial-gradient(circle at 88% 82%, rgba(14,165,233,.16), transparent 32%); }
        .lift-card { transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease; }
        .lift-card:hover { transform: translateY(-5px); box-shadow: 0 24px 48px rgba(15,23,42,.12); }
        dialog::backdrop { background: rgba(2, 8, 23, .62); backdrop-filter: blur(5px); }
        dialog[open] { animation: dialog-in .2s ease-out; }
        @keyframes dialog-in { from { opacity: 0; transform: translateY(10px) scale(.98); } to { opacity: 1; transform: translateY(0) scale(1); } }
        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            *, *::before, *::after { animation-duration: .01ms !important; transition-duration: .01ms !important; }
        }
        .soft-grid {
            background-image: linear-gradient(rgba(148,163,184,0.08) 1px, transparent 1px), linear-gradient(90deg, rgba(148,163,184,0.08) 1px, transparent 1px);
            background-size: 24px 24px;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        body[data-theme="dark"] { background: linear-gradient(180deg, #020817, #0b1425 60%, #0f172a); }
        body[data-theme="dark"] nav.bg-white\/90,
        body[data-theme="dark"] .bg-white\/90 { background-color: rgba(15, 23, 42, .94) !important; }
        body[data-theme="dark"] .bg-white,
        body[data-theme="dark"] .bg-white\/80 { background-color: var(--panel) !important; }
        body[data-theme="dark"] .bg-slate-50 { background-color: var(--bg-soft) !important; }
        body[data-theme="dark"] .bg-slate-100 { background-color: var(--panel-soft) !important; }
        body[data-theme="dark"] .bg-slate-200 { background-color: var(--panel-alt) !important; }
        body[data-theme="dark"] .bg-slate-900 { background-color: #020817 !important; }
        body[data-theme="dark"] .bg-sky-50,
        body[data-theme="dark"] .bg-sky-100,
        body[data-theme="dark"] .bg-cyan-50 { background-color: rgba(14, 116, 144, .2) !important; }
        body[data-theme="dark"] .bg-emerald-50,
        body[data-theme="dark"] .bg-emerald-100 { background-color: rgba(5, 150, 105, .2) !important; }
        body[data-theme="dark"] .bg-amber-100 { background-color: rgba(217, 119, 6, .2) !important; }
        body[data-theme="dark"] .bg-rose-50 { background-color: rgba(225, 29, 72, .16) !important; }
        body[data-theme="dark"] .bg-slate-50,
        body[data-theme="dark"] .bg-slate-100,
        body[data-theme="dark"] .bg-slate-200,
        body[data-theme="dark"] .bg-sky-50,
        body[data-theme="dark"] .bg-sky-100,
        body[data-theme="dark"] .bg-cyan-50,
        body[data-theme="dark"] .bg-emerald-50,
        body[data-theme="dark"] .bg-emerald-100,
        body[data-theme="dark"] .bg-amber-100,
        body[data-theme="dark"] .bg-rose-50 { color: var(--text-soft) !important; }
        body[data-theme="dark"] .text-slate-900,
        body[data-theme="dark"] .text-slate-800,
        body[data-theme="dark"] .text-slate-700 { color: var(--text) !important; }
        body[data-theme="dark"] .text-slate-600,
        body[data-theme="dark"] .text-slate-500,
        body[data-theme="dark"] .text-slate-400,
        body[data-theme="dark"] .text-slate-300 { color: var(--text-soft) !important; }
        body[data-theme="dark"] .text-sky-700,
        body[data-theme="dark"] .text-sky-600,
        body[data-theme="dark"] .text-sky-500 { color: #7dd3fc !important; }
        body[data-theme="dark"] .text-emerald-700,
        body[data-theme="dark"] .text-emerald-600 { color: #6ee7b7 !important; }
        body[data-theme="dark"] .text-cyan-600 { color: #67e8f9 !important; }
        body[data-theme="dark"] .text-amber-600 { color: #fcd34d !important; }
        body[data-theme="dark"] .text-rose-600 { color: #fda4af !important; }
        body[data-theme="dark"] .border-slate-100,
        body[data-theme="dark"] .border-slate-200,
        body[data-theme="dark"] .border-slate-300,
        body[data-theme="dark"] .border-slate-800,
        body[data-theme="dark"] .border-slate-700,
        body[data-theme="dark"] .border-emerald-100,
        body[data-theme="dark"] .border-white { border-color: var(--line) !important; }
        body[data-theme="dark"] .bg-white\/90,
        body[data-theme="dark"] .bg-white\/80 { color: var(--text) !important; }
        body[data-theme="dark"] .bg-white\/90 input,
        body[data-theme="dark"] input.bg-transparent,
        body[data-theme="dark"] input.bg-white,
        body[data-theme="dark"] textarea,
        body[data-theme="dark"] select {
            color: var(--text) !important;
            caret-color: var(--primary);
        }
        body[data-theme="dark"] input::placeholder,
        body[data-theme="dark"] textarea::placeholder { color: var(--muted) !important; }
        body[data-theme="dark"] .hero-glow { background-color: var(--bg); }
        body[data-theme="dark"] #kuis > div > div {
            background: linear-gradient(135deg, #102b32, #0f1d30 58%, #10243a) !important;
            border-color: var(--line) !important;
        }
        body[data-theme="dark"] #artikel aside > div:last-child {
            background: linear-gradient(135deg, #102b32, #0f1d30) !important;
        }
        body[data-theme="dark"] #artikel article .bg-gradient-to-br {
            background-image: linear-gradient(135deg, #12334a, #12352f) !important;
        }
        body[data-theme="dark"] .lift-card:hover { box-shadow: var(--card-shadow); }
        body[data-theme="dark"] .hover\:bg-slate-100:hover,
        body[data-theme="dark"] .hover\:bg-slate-200:hover { background-color: var(--panel-alt) !important; }
        body[data-theme="dark"] .hover\:bg-slate-50:hover { background-color: var(--panel-soft) !important; }
        body[data-theme="dark"] dialog { background-color: var(--panel) !important; color: var(--text) !important; }
    </style>
</head>
<body data-theme="light" class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">
    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 gap-4">
                <a href="index.php" class="flex items-center gap-3 shrink-0">
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-sky-500 to-cyan-400 flex items-center justify-center text-white shadow-lg shadow-sky-200">
                        <i class="fa-solid fa-heart-pulse text-lg"></i>
                    </div>
                    <div>
                        <span class="block text-base font-extrabold tracking-tight text-slate-900">GEN SEHAT</span>
                        <span class="block text-[10px] text-sky-600 font-bold uppercase tracking-[0.2em]">Pusat Edukasi</span>
                    </div>
                </a>

                <div class="hidden lg:flex items-center gap-6 text-sm font-semibold text-slate-600">
                    <a href="index.php" class="hover:text-sky-600 transition">Beranda</a>
                    <a href="#modul-edukasi" class="hover:text-sky-600 transition">Modul</a>
                    <a href="#panduan-menolak" class="hover:text-sky-600 transition">Tips</a>
                    <a href="#artikel" class="hover:text-sky-600 transition">Artikel</a>
                    <a href="edukasi.php" class="hover:text-sky-600 transition">Semua Edukasi</a>
                </div>

                <div class="flex items-center gap-3">
                    <button id="mobileMenuToggle" type="button" class="lg:hidden flex items-center justify-center w-9 h-9 rounded-xl border border-slate-200 bg-slate-100 text-slate-700 hover:bg-slate-200 transition" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobileMenu">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <button id="themeToggle" type="button" class="flex items-center justify-center w-9 h-9 rounded-xl border border-slate-200 bg-slate-100 text-slate-700 hover:bg-slate-200 transition" aria-label="Toggle dark mode">
                        <i class="fa-solid fa-moon"></i>
                    </button>
                    <form action="index.php" method="GET" class="hidden md:flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-2 shadow-sm">
                        <?php if ($kategori !== '') : ?>
                            <input type="hidden" name="kategori" value="<?= htmlspecialchars($kategori, ENT_QUOTES, 'UTF-8') ?>">
                        <?php endif; ?>
                        <i class="fa-solid fa-magnifying-glass text-slate-400 text-xs"></i>
                        <input type="text" name="q" value="<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?>" placeholder="Cari berita..." class="w-36 border-0 bg-transparent text-xs text-slate-700 focus:outline-none">
                    </form>
                    <?php if (isset($_SESSION['admin'])) : ?>
                        <a href="tambah.php" class="hidden sm:inline-flex px-3 py-2 rounded-xl text-xs font-bold text-white bg-sky-600 hover:bg-sky-700 transition shadow-md shadow-sky-200">+ Tambah</a>
                        <a href="logout.php" class="hidden sm:inline-flex px-3 py-2 rounded-xl text-xs font-bold text-rose-600 bg-rose-50 hover:bg-rose-100 transition">Logout</a>
                    <?php else : ?>
                        <a href="login.php" class="hidden sm:inline-flex px-3 py-2 rounded-xl text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">Admin Login</a>
                    <?php endif; ?>
                </div>
            </div>
            <div id="mobileMenu" class="hidden lg:hidden border-t border-slate-200 py-3">
                <div class="grid grid-cols-2 gap-2 text-sm font-semibold text-slate-700">
                    <a href="index.php" class="rounded-xl px-3 py-2 hover:bg-slate-100">Beranda</a>
                    <a href="#modul-edukasi" class="rounded-xl px-3 py-2 hover:bg-slate-100">Modul belajar</a>
                    <a href="#panduan-menolak" class="rounded-xl px-3 py-2 hover:bg-slate-100">Tips sehat</a>
                    <a href="#kuis" class="rounded-xl px-3 py-2 hover:bg-slate-100">Kuis</a>
                    <a href="#artikel" class="rounded-xl px-3 py-2 hover:bg-slate-100">Artikel</a>
                    <a href="edukasi.php" class="rounded-xl px-3 py-2 hover:bg-slate-100">Semua edukasi</a>
                    <?php if (isset($_SESSION['admin'])) : ?>
                        <a href="tambah.php" class="rounded-xl px-3 py-2 text-sky-700 hover:bg-sky-50">Tambah artikel</a>
                        <a href="logout.php" class="rounded-xl px-3 py-2 text-rose-600 hover:bg-rose-50">Logout</a>
                    <?php else : ?>
                        <a href="login.php" class="rounded-xl px-3 py-2 text-sky-700 hover:bg-sky-50">Admin login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <section class="soft-grid hero-glow relative overflow-hidden py-14 md:py-20">
        <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-emerald-300/20 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-64 w-64 rounded-full bg-sky-300/20 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-12 gap-8 items-center">
                <div class="md:col-span-7 space-y-6 text-center md:text-left">
                    <span class="inline-flex items-center gap-2 rounded-full bg-sky-100 text-sky-700 px-3 py-1 text-[11px] font-bold uppercase tracking-[0.2em]">
                        <i class="fa-solid fa-graduation-cap"></i> Edukasi Segala Umur
                    </span>
                    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight text-slate-900">
                        Pilih Hidup Sehat, <br>
                        Wujudkan Masa Depan <span class="bg-gradient-to-r from-emerald-600 to-sky-600 bg-clip-text text-transparent">Cerah</span>
                    </h1>
                    <p class="max-w-xl text-slate-600 text-sm sm:text-base mx-auto md:mx-0 leading-relaxed">
                        Platform edukasi terpercaya untuk mengenali risiko zat adiktif, membangun kebiasaan sehat, dan memberdayakan remaja serta keluarga dalam memilih keputusan yang bijak.
                    </p>
                    <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                        <a href="#modul-edukasi" class="px-5 py-3 rounded-2xl bg-sky-600 hover:bg-sky-700 text-white text-sm font-bold shadow-lg shadow-sky-200 transition">
                            <i class="fa-solid fa-book-open-reader mr-2"></i>Mulai Belajar
                        </a>
                        <a href="#artikel" class="px-5 py-3 rounded-2xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-bold shadow-sm transition">
                            <i class="fa-solid fa-newspaper mr-2 text-emerald-500"></i>Baca Artikel
                        </a>
                    </div>
                    <div class="flex flex-wrap gap-4 justify-center md:justify-start pt-2 text-slate-600 text-xs font-medium">
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-500"></i> Materi faktual</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-500"></i> Mudah dipahami</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-500"></i> Cegah sejak dini</div>
                    </div>
                </div>

                <div class="md:col-span-5">
                    <div class="bg-white/90 backdrop-blur-xl rounded-[2rem] border border-white shadow-2xl shadow-slate-900/10 p-6 space-y-5">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <h3 class="text-base font-extrabold text-slate-900">Tahukah Kamu?</h3>
                            <span class="rounded-full bg-sky-100 text-sky-700 px-2.5 py-1 text-[10px] font-bold uppercase">Fakta</span>
                        </div>
                        <div class="space-y-4 text-sm text-slate-600">
                            <div class="flex gap-3 p-3 rounded-2xl bg-slate-50 border border-slate-100">
                                <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-brain"></i></div>
                                <div>
                                    <strong class="block text-slate-900 mb-1">Otak remaja masih berkembang</strong>
                                    Risiko ketergantungan lebih besar ketika proses pengambilan keputusan dan pengendalian emosi belum optimal.
                                </div>
                            </div>
                            <div class="flex gap-3 p-3 rounded-2xl bg-slate-50 border border-slate-100">
                                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-shield-heart"></i></div>
                                <div>
                                    <strong class="block text-slate-900 mb-1">Menolak itu hebat</strong>
                                    Keputusan sehat adalah bentuk pengendalian diri, bukan tanda lemah. Semakin kuat sikapmu, semakin aman masa depanmu.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-8 border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-3 gap-4">
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                    <div class="text-sky-600 text-2xl font-extrabold"><?= $jumlah_berita ?></div>
                    <div class="text-sm text-slate-600 mt-1">Artikel ditemukan</div>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                    <div class="text-sky-600 text-2xl font-extrabold"><?= $jumlah_modul ?></div>
                    <div class="text-sm text-slate-600 mt-1">Modul pembelajaran</div>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                    <div class="text-sky-600 text-2xl font-extrabold">GRATIS</div>
                    <div class="text-sm text-slate-600 mt-1">Belajar kapan saja</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-8">
                <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-sky-600">Kenapa kami?</span>
                <h2 class="mt-2 text-2xl sm:text-3xl font-extrabold text-slate-900">Platform edukasi yang dibuat untuk masa depan yang lebih aman</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="lift-card rounded-3xl border border-slate-200 bg-white p-6 shadow-lg shadow-slate-200/60">
                    <div class="w-12 h-12 rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl mb-4"><i class="fa-solid fa-user-check"></i></div>
                    <h3 class="text-lg font-extrabold text-slate-900 mb-2">Konten ramah semua umur</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">Materi disusun dengan bahasa sederhana, jelas, dan mudah dibaca oleh pelajar, orang tua, maupun masyarakat umum.</p>
                </div>
                <div class="lift-card rounded-3xl border border-slate-200 bg-white p-6 shadow-lg shadow-slate-200/60">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl mb-4"><i class="fa-solid fa-people-arrows"></i></div>
                    <h3 class="text-lg font-extrabold text-slate-900 mb-2">Mendorong tindakan nyata</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">Selain memberi informasi, kami juga menekankan langkah praktis yang bisa langsung diterapkan dalam kehidupan sehari-hari.</p>
                </div>
                <div class="lift-card rounded-3xl border border-slate-200 bg-white p-6 shadow-lg shadow-slate-200/60">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl mb-4"><i class="fa-solid fa-shield-heart"></i></div>
                    <h3 class="text-lg font-extrabold text-slate-900 mb-2">Sumber yang terpercaya</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">Setiap artikel dibangun dengan pendekatan edukatif dan referensi yang bisa diaudit agar tetap relevan dan akurat.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="modul-edukasi" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-sky-600">Materi pembelajaran</span>
                <h2 class="mt-2 text-2xl sm:text-3xl font-extrabold text-slate-900">Modul Edukasi Kesehatan</h2>
                <p class="mt-2 text-sm text-slate-500">Informasi yang mudah dipahami, relevan, dan berfokus pada pencegahan serta kesehatan mental.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $icons = ['fa-book-bookmark', 'fa-hand-holding-medical', 'fa-heart-circle-check'];
                $i = 0;
                while ($edu = mysqli_fetch_assoc($query_edukasi)):
                    $icon = $icons[$i % 3];
                    $i++;
                ?>
                    <article class="lift-card rounded-3xl border border-slate-200 bg-slate-50 p-6 flex flex-col justify-between h-full">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sky-500 to-cyan-400 text-white flex items-center justify-center text-xl shadow-lg shadow-sky-200 mb-4">
                                <i class="fa-solid <?= htmlspecialchars($icon, ENT_QUOTES, 'UTF-8') ?>"></i>
                            </div>
                            <span class="inline-block rounded-full bg-sky-100 text-sky-700 text-[10px] font-bold uppercase tracking-[0.15em] px-2.5 py-1 mb-3">
                                <?= htmlspecialchars($edu['kategori']) ?>
                            </span>
                            <h3 class="text-lg font-extrabold text-slate-900 mb-2"><?= htmlspecialchars($edu['judul']) ?></h3>
                            <p class="text-sm text-slate-600 leading-relaxed line-clamp-3"><?= htmlspecialchars($edu['konten']) ?></p>
                        </div>
                        <button type="button" class="moduleReadMore mt-5 inline-flex items-center gap-2 text-sm font-bold text-sky-600 hover:text-sky-700" data-title="<?= htmlspecialchars($edu['judul'], ENT_QUOTES, 'UTF-8') ?>" data-category="<?= htmlspecialchars($edu['kategori'], ENT_QUOTES, 'UTF-8') ?>" data-content="<?= htmlspecialchars($edu['konten'], ENT_QUOTES, 'UTF-8') ?>">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right text-[11px]"></i>
                        </button>
                    </article>
                <?php endwhile; ?>
                <?php if ($jumlah_modul === 0): ?>
                    <div class="sm:col-span-2 lg:col-span-3 rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center text-sm text-slate-500">
                        Modul edukasi akan segera ditambahkan.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="panduan-menolak" class="py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-[2rem] bg-gradient-to-r from-sky-600 via-cyan-600 to-emerald-600 text-white shadow-2xl p-8 md:p-10">
                <div class="max-w-3xl">
                    <span class="inline-block rounded-full bg-white/20 border border-white/20 px-3 py-1 text-[11px] font-bold uppercase tracking-[0.2em]">Panduan praktis remaja</span>
                    <h2 class="mt-4 text-2xl sm:text-3xl font-extrabold">3 Cara Tegas Menolak Ajakan Negatif</h2>
                    <p class="mt-3 text-sm text-sky-100">Kalau kamu berada di situasi yang tidak aman, gunakan cara ini agar tetap tenang dan berdaya.</p>
                </div>

                <div class="grid sm:grid-cols-3 gap-4 mt-8">
                    <div class="rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 p-5">
                        <span class="inline-flex w-8 h-8 rounded-full bg-white text-sky-700 font-black text-sm items-center justify-center mb-3">1</span>
                        <h4 class="font-bold text-base">Tolak secara jelas</h4>
                        <p class="text-sm text-sky-100 mt-2">Katakan dengan tenang, “Enggak dulu, makasih. Aku fokus sama kegiatan positif yang aku pilih.”</p>
                    </div>
                    <div class="rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 p-5">
                        <span class="inline-flex w-8 h-8 rounded-full bg-white text-sky-700 font-black text-sm items-center justify-center mb-3">2</span>
                        <h4 class="font-bold text-base">Alihkan pembicaraan</h4>
                        <p class="text-sm text-sky-100 mt-2">Ganti topik dengan aktivitas yang sehat seperti olahraga, makan, atau nongkrong di tempat aman.</p>
                    </div>
                    <div class="rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 p-5">
                        <span class="inline-flex w-8 h-8 rounded-full bg-white text-sky-700 font-black text-sm items-center justify-center mb-3">3</span>
                        <h4 class="font-bold text-base">Jauh dari tekanan</h4>
                        <p class="text-sm text-sky-100 mt-2">Pindah ke lingkungan yang lebih aman dan cari dukungan dari teman atau orang tua yang kamu percaya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kuis" class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-[2rem] border border-emerald-100 bg-gradient-to-br from-emerald-50 via-white to-sky-50 p-6 sm:p-9 shadow-xl shadow-emerald-900/5">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-7">
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-emerald-700">Belajar sambil bermain</span>
                        <h2 class="mt-2 text-2xl sm:text-3xl font-extrabold text-slate-900">Kuis pilihan sehat</h2>
                        <p class="mt-2 text-sm text-slate-600">Uji pemahamanmu dengan 3 pertanyaan singkat.</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-emerald-600 text-white flex items-center justify-center text-2xl shadow-lg shadow-emerald-200">
                        <i class="fa-solid fa-puzzle-piece"></i>
                    </div>
                </div>
                <form id="healthQuiz" class="space-y-5">
                    <fieldset class="rounded-2xl border border-slate-200 bg-white/80 p-4 sm:p-5">
                        <legend class="px-2 text-sm font-extrabold text-slate-900">1. Apa langkah terbaik saat mendapat ajakan yang membuatmu tidak nyaman?</legend>
                        <div class="mt-3 grid sm:grid-cols-3 gap-2 text-sm">
                            <label class="flex gap-2 items-start rounded-xl border border-slate-200 p-3 cursor-pointer hover:border-emerald-300"><input type="radio" name="q1" value="a" class="mt-1 accent-emerald-600"> Ikut saja agar diterima</label>
                            <label class="flex gap-2 items-start rounded-xl border border-slate-200 p-3 cursor-pointer hover:border-emerald-300"><input type="radio" name="q1" value="b" class="mt-1 accent-emerald-600"> Tolak tegas dan cari tempat aman</label>
                            <label class="flex gap-2 items-start rounded-xl border border-slate-200 p-3 cursor-pointer hover:border-emerald-300"><input type="radio" name="q1" value="c" class="mt-1 accent-emerald-600"> Diam dan tetap di situ</label>
                        </div>
                    </fieldset>
                    <fieldset class="rounded-2xl border border-slate-200 bg-white/80 p-4 sm:p-5">
                        <legend class="px-2 text-sm font-extrabold text-slate-900">2. Siapa yang bisa kamu hubungi untuk meminta dukungan?</legend>
                        <div class="mt-3 grid sm:grid-cols-3 gap-2 text-sm">
                            <label class="flex gap-2 items-start rounded-xl border border-slate-200 p-3 cursor-pointer hover:border-emerald-300"><input type="radio" name="q2" value="a" class="mt-1 accent-emerald-600"> Orang dewasa tepercaya</label>
                            <label class="flex gap-2 items-start rounded-xl border border-slate-200 p-3 cursor-pointer hover:border-emerald-300"><input type="radio" name="q2" value="b" class="mt-1 accent-emerald-600"> Tidak perlu siapa-siapa</label>
                            <label class="flex gap-2 items-start rounded-xl border border-slate-200 p-3 cursor-pointer hover:border-emerald-300"><input type="radio" name="q2" value="c" class="mt-1 accent-emerald-600"> Orang yang menekanmu</label>
                        </div>
                    </fieldset>
                    <fieldset class="rounded-2xl border border-slate-200 bg-white/80 p-4 sm:p-5">
                        <legend class="px-2 text-sm font-extrabold text-slate-900">3. Apa yang sebaiknya dilakukan jika teman membutuhkan bantuan pemulihan?</legend>
                        <div class="mt-3 grid sm:grid-cols-3 gap-2 text-sm">
                            <label class="flex gap-2 items-start rounded-xl border border-slate-200 p-3 cursor-pointer hover:border-emerald-300"><input type="radio" name="q3" value="a" class="mt-1 accent-emerald-600"> Menghakimi agar jera</label>
                            <label class="flex gap-2 items-start rounded-xl border border-slate-200 p-3 cursor-pointer hover:border-emerald-300"><input type="radio" name="q3" value="b" class="mt-1 accent-emerald-600"> Menjaga rahasia dan menjauh</label>
                            <label class="flex gap-2 items-start rounded-xl border border-slate-200 p-3 cursor-pointer hover:border-emerald-300"><input type="radio" name="q3" value="c" class="mt-1 accent-emerald-600"> Dukung mencari bantuan profesional</label>
                        </div>
                    </fieldset>
                    <div class="flex flex-wrap items-center gap-3">
                        <button type="submit" class="rounded-xl bg-emerald-700 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-emerald-200 hover:bg-emerald-800 transition">Lihat hasilku</button>
                        <button id="resetQuiz" type="reset" class="rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50 transition">Ulangi kuis</button>
                        <p id="quizResult" class="text-sm font-bold text-emerald-800" role="status" aria-live="polite"></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section id="artikel" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-8">
                <div class="lg:col-span-8 space-y-6">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-slate-200 pb-4">
                        <div>
                            <h2 class="text-2xl font-extrabold text-slate-900"><?= $judul_halaman ?></h2>
                            <p class="text-xs text-slate-500 mt-1">Kumpulan artikel, wawasan, dan informasi edukasi yang relevan.</p>
                        </div>
                        <div class="flex flex-wrap gap-2 text-xs font-semibold">
                            <a href="index.php#artikel" class="px-3 py-2 rounded-xl <?= $kategori == '' ? 'bg-sky-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' ?>">Semua</a>
                            <a href="index.php?kategori=Edukasi#artikel" class="px-3 py-2 rounded-xl <?= $kategori == 'Edukasi' ? 'bg-sky-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' ?>">Edukasi</a>
                            <a href="index.php?kategori=Pencegahan#artikel" class="px-3 py-2 rounded-xl <?= $kategori == 'Pencegahan' ? 'bg-sky-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' ?>">Pencegahan</a>
                            <a href="index.php?kategori=Hukum#artikel" class="px-3 py-2 rounded-xl <?= $kategori == 'Hukum' ? 'bg-sky-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' ?>">Hukum</a>
                            <a href="index.php?kategori=Pemulihan#artikel" class="px-3 py-2 rounded-xl <?= $kategori == 'Pemulihan' ? 'bg-sky-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' ?>">Pemulihan</a>
                        </div>
                    </div>

                    <form action="index.php" method="GET" class="flex flex-col sm:flex-row gap-3 rounded-2xl border border-slate-200 bg-slate-50 p-3">
                        <?php if ($kategori !== '') : ?>
                            <input type="hidden" name="kategori" value="<?= htmlspecialchars($kategori, ENT_QUOTES, 'UTF-8') ?>">
                        <?php endif; ?>
                        <div class="flex-1 flex items-center gap-2 rounded-xl bg-white border border-slate-200 px-3 py-2.5">
                            <i class="fa-solid fa-magnifying-glass text-slate-400 text-sm"></i>
                            <input type="text" name="q" value="<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?>" placeholder="Cari judul, topik, atau penulis..." class="w-full bg-transparent text-sm text-slate-700 placeholder:text-slate-400 focus:outline-none">
                        </div>
                        <button type="submit" class="px-4 py-2.5 rounded-xl bg-slate-900 text-white text-sm font-bold hover:bg-slate-700 transition">Cari</button>
                        <?php if ($keyword !== '' || $kategori !== '') : ?>
                            <a href="index.php#artikel" class="px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-600 text-sm font-bold hover:bg-slate-100 transition">Reset</a>
                        <?php endif; ?>
                    </form>

                    <div class="space-y-4">
                        <?php if ($jumlah_berita > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($query_berita)): ?>
                                <?php
                                $id_berita = (int) $row['id'];
                                [$judul_sumber_utama, $url_sumber_utama] = sumberUtamaArtikel($row['konten']);
                                $tautan_berita = $url_sumber_utama !== '' ? $url_sumber_utama : 'detail.php?id=' . $id_berita;
                                ?>
                                <article class="rounded-3xl border border-slate-200 bg-slate-50 p-5 hover:shadow-lg hover:-translate-y-0.5 transition duration-300 flex flex-col sm:flex-row gap-4">
                                    <?php if (!empty($row['gambar']) && $row['gambar'] !== 'default.jpg'): ?>
                                        <div class="w-full sm:w-40 h-28 rounded-2xl overflow-hidden bg-slate-200 flex-shrink-0">
                                            <img src="<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>" class="w-full h-full object-cover">
                                        </div>
                                    <?php else: ?>
                                        <div class="w-full sm:w-40 h-28 rounded-2xl bg-gradient-to-br from-sky-100 via-cyan-50 to-emerald-100 flex items-center justify-center text-sky-600 text-3xl flex-shrink-0">
                                            <i class="fa-solid fa-newspaper"></i>
                                        </div>
                                    <?php endif; ?>

                                    <div class="flex-1 space-y-3">
                                        <div class="flex flex-wrap items-center gap-2 text-[10px] font-bold uppercase tracking-[0.12em] text-sky-600">
                                            <span class="rounded-full bg-sky-100 px-2 py-1"><?= htmlspecialchars($row['kategori']) ?></span>
                                            <span class="text-slate-300">•</span>
                                            <span class="text-slate-500 font-normal tracking-[0.08em]">
                                                <?= date('d M Y', strtotime($row['tanggal_buat'])) ?>
                                            </span>
                                        </div>
                                        <h3 class="text-lg font-extrabold text-slate-800 leading-tight">
                                            <a href="<?= htmlspecialchars($tautan_berita) ?>" <?= $url_sumber_utama ? 'target="_blank" rel="noopener noreferrer"' : '' ?> class="hover:text-sky-600 transition">
                                                <?= htmlspecialchars($row['judul']) ?>
                                            </a>
                                        </h3>
                                        <p class="text-sm text-slate-600 line-clamp-3 leading-relaxed">
                                            <?= htmlspecialchars(strip_tags($row['konten'])) ?>
                                        </p>
                                        <div class="flex flex-wrap items-center justify-between gap-3 pt-2 border-t border-slate-200">
                                            <span class="text-xs text-slate-500">Penulis: <?= htmlspecialchars($row['penulis']) ?></span>
                                            <div class="flex items-center gap-2">
                                                <a href="detail.php?id=<?= $id_berita ?>" class="inline-flex items-center gap-1 text-xs font-bold text-sky-600 hover:text-sky-700">
                                                    Baca detail <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                                </a>
                                                <?php if (isset($_SESSION['admin'])) : ?>
                                                    <a href="edit.php?id=<?= $id_berita ?>" class="text-xs font-bold text-amber-600">Edit</a>
                                                    <a href="hapus.php?id=<?= $id_berita ?>" onclick="return confirm('Yakin ingin menghapus berita ini?');" class="text-xs font-bold text-rose-600">Hapus</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div class="bg-slate-50 border border-dashed border-slate-300 rounded-3xl p-8 text-center text-sm text-slate-500">
                                Belum ada artikel yang sesuai dengan pencarian atau kategori ini.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <aside class="lg:col-span-4 space-y-6">
                    <div class="rounded-3xl bg-slate-900 text-white p-6">
                        <div class="w-12 h-12 rounded-2xl bg-sky-500/20 text-sky-300 flex items-center justify-center text-xl mb-4">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <h3 class="text-xl font-extrabold">Layanan Bantuan</h3>
                        <p class="mt-2 text-sm text-slate-300">Konsultasi aman, cepat, dan paling penting tidak perlu malu untuk bertanya.</p>
                        <div class="mt-5 space-y-2 border-t border-slate-800 pt-4 text-sm text-slate-300">
                            <div><strong class="text-sky-300">Call center BNN</strong> : 184</div>
                            <div><strong class="text-sky-300">Konseling online</strong> : 0812-223-5265</div>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
                        <h3 class="text-lg font-extrabold text-slate-900 mb-4">Berita Terbaru</h3>
                        <div class="space-y-3">
                            <?php while ($item = mysqli_fetch_assoc($terbaru)): ?>
                                <a href="detail.php?id=<?= (int) $item['id'] ?>" class="block rounded-2xl border border-slate-200 bg-white p-3 hover:border-sky-200 hover:shadow-sm transition">
                                    <div class="text-[10px] uppercase tracking-[0.12em] text-sky-600 font-bold"><?= htmlspecialchars($item['kategori']) ?></div>
                                    <div class="mt-1 text-sm font-bold text-slate-800"><?= htmlspecialchars($item['judul']) ?></div>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-slate-200 bg-gradient-to-br from-emerald-50 to-sky-50 p-6">
                        <div class="text-emerald-600 text-2xl mb-2"><i class="fa-solid fa-circle-question"></i></div>
                        <h3 class="text-lg font-extrabold text-slate-900">FAQ</h3>
                        <div class="mt-4 space-y-3 text-sm text-slate-600">
                            <div><strong class="text-slate-900">Apa yang harus dilakukan jika teman menawarkan zat?</strong>
                                <p class="mt-1">Tolak dengan tenang, alihkan perhatian, dan jauhi lingkungan yang tidak aman.</p>
                            </div>
                            <div><strong class="text-slate-900">Apakah informasi ini aman untuk semua usia?</strong>
                                <p class="mt-1">Ya, materi disusun dengan bahasa sederhana dan fokus pada pencegahan yang sehat.</p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <dialog id="moduleDialog" aria-labelledby="moduleDialogTitle" aria-describedby="moduleDialogContent" class="w-[calc(100%-2rem)] max-w-2xl rounded-[2rem] border border-slate-200 bg-white p-0 text-slate-800 shadow-2xl">
        <div class="flex items-start justify-between gap-4 border-b border-slate-200 p-6">
            <div>
                <span id="moduleDialogCategory" class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.15em] text-emerald-700"></span>
                <h2 id="moduleDialogTitle" class="mt-3 text-2xl font-extrabold text-slate-900"></h2>
            </div>
            <button id="closeModuleDialog" type="button" class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-600 hover:bg-slate-200" aria-label="Tutup materi">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="moduleDialogContent" class="max-h-[60vh] overflow-y-auto whitespace-pre-line p-6 leading-8 text-slate-600"></div>
    </dialog>

    <footer class="mt-auto bg-slate-900 text-slate-400 py-7 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-3">
            <div class="font-extrabold text-white">GEN SEHAT — Ruang Edukasi Bebas Narkoba</div>
            <p class="text-sm">© 2026 Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script>
        const themeToggle = document.getElementById('themeToggle');
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const root = document.documentElement;
        const setTheme = (theme) => {
            document.body.setAttribute('data-theme', theme);
            root.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
            const icon = themeToggle.querySelector('i');
            icon.classList.toggle('fa-moon', theme === 'light');
            icon.classList.toggle('fa-sun', theme === 'dark');
        };

        const currentTheme = localStorage.getItem('theme') || 'light';
        setTheme(currentTheme);

        themeToggle.addEventListener('click', () => {
            const nextTheme = document.body.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            setTheme(nextTheme);
        });

        mobileMenuToggle.addEventListener('click', () => {
            const isExpanded = mobileMenuToggle.getAttribute('aria-expanded') === 'true';
            mobileMenuToggle.setAttribute('aria-expanded', String(!isExpanded));
            mobileMenuToggle.setAttribute('aria-label', isExpanded ? 'Buka menu navigasi' : 'Tutup menu navigasi');
            mobileMenu.classList.toggle('hidden', isExpanded);
            mobileMenuToggle.querySelector('i').classList.toggle('fa-bars', isExpanded);
            mobileMenuToggle.querySelector('i').classList.toggle('fa-xmark', !isExpanded);
        });

        mobileMenu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                mobileMenuToggle.setAttribute('aria-label', 'Buka menu navigasi');
                mobileMenuToggle.querySelector('i').classList.replace('fa-xmark', 'fa-bars');
            });
        });

        const moduleDialog = document.getElementById('moduleDialog');
        const closeModuleDialog = document.getElementById('closeModuleDialog');
        document.querySelectorAll('.moduleReadMore').forEach((button) => {
            button.addEventListener('click', () => {
                document.getElementById('moduleDialogTitle').textContent = button.dataset.title;
                document.getElementById('moduleDialogCategory').textContent = button.dataset.category;
                document.getElementById('moduleDialogContent').textContent = button.dataset.content;
                moduleDialog.showModal();
            });
        });
        closeModuleDialog.addEventListener('click', () => moduleDialog.close());
        moduleDialog.addEventListener('click', (event) => {
            if (event.target === moduleDialog) moduleDialog.close();
        });

        const healthQuiz = document.getElementById('healthQuiz');
        const quizResult = document.getElementById('quizResult');
        healthQuiz.addEventListener('submit', (event) => {
            event.preventDefault();
            const answers = ['q1', 'q2', 'q3'];
            const unanswered = answers.find((name) => !healthQuiz.querySelector(`input[name="${name}"]:checked`));
            if (unanswered) {
                quizResult.textContent = 'Jawab semua pertanyaan terlebih dahulu, ya.';
                healthQuiz.querySelector(`input[name="${unanswered}"]`).focus();
                return;
            }

            const correctAnswers = { q1: 'b', q2: 'a', q3: 'c' };
            const score = answers.reduce((total, name) => {
                return total + (healthQuiz.querySelector(`input[name="${name}"]:checked`).value === correctAnswers[name] ? 1 : 0);
            }, 0);
            quizResult.textContent = `Skormu ${score} dari 3. ${score === 3 ? 'Hebat! Kamu sudah memahami pilihan sehat.' : 'Terus belajar, dan ingat: meminta bantuan adalah hal yang kuat.'}`;
        });
        healthQuiz.addEventListener('reset', () => {
            quizResult.textContent = '';
        });
    </script>

</body>
</html>