<?php
include 'koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM edukasi ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Edukasi & Pencegahan Narkoba</title>
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
        }
        body[data-theme="dark"] {
            --bg: #020817;
            --panel: #0f172a;
            --panel-soft: #111827;
            --text: #e2e8f0;
            --text-soft: #cbd5e1;
            --line: rgba(148,163,184,0.25);
            --shadow: rgba(2,8,23,0.72);
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: var(--text); }
        body[data-theme="dark"] { background: linear-gradient(180deg, #020817, #0f172a); }
        .theme-panel { background: var(--panel); border-color: var(--line); box-shadow: 0 20px 40px var(--shadow); }
        .theme-muted { color: var(--text-soft); }
        .theme-line { border-color: var(--line); }
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
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-sky-600">Edukasi</span>
                </div>
            </a>
            <div class="flex items-center gap-2">
                <button id="themeToggle" type="button" class="flex items-center justify-center w-9 h-9 rounded-xl border border-slate-200 bg-slate-100 text-slate-700 hover:bg-slate-200 transition" aria-label="Toggle dark mode">
                    <i class="fa-solid fa-moon"></i>
                </button>
                <a href="index.php" class="px-3 py-2 rounded-xl bg-slate-100 text-sm font-semibold text-slate-700 hover:bg-slate-200">Beranda</a>
                <a href="login.php" class="px-3 py-2 rounded-xl bg-sky-600 text-sm font-semibold text-white hover:bg-sky-700">Admin Login</a>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-10">
        <div class="text-center mb-10">
            <span class="inline-flex items-center gap-2 rounded-full bg-sky-100 text-sky-700 px-3 py-1 text-[11px] font-bold uppercase tracking-[0.2em]">
                <i class="fa-solid fa-book-open-reader"></i> Pusat Edukasi
            </span>
            <h1 class="mt-4 text-3xl sm:text-4xl font-extrabold text-slate-900">Kenali Bahaya, Cegah Dini, Pulih Sepenuhnya</h1>
            <p class="mt-3 text-sm text-slate-600 max-w-2xl mx-auto">Kumpulan materi edukasi yang membantu remaja dan keluarga memahami risiko zat adiktif serta cara menjaga kesehatan mental dan fisik.</p>
        </div>

        <div class="space-y-5">
            <?php if (mysqli_num_rows($query) > 0) : ?>
                <?php while($row = mysqli_fetch_assoc($query)) : ?>
                    <article class="theme-panel rounded-[2rem] border p-6 shadow-sm">
                        <div class="inline-flex rounded-full bg-sky-100 text-sky-700 text-[10px] font-bold uppercase tracking-[0.18em] px-3 py-1.5 mb-4">
                            <?= htmlspecialchars($row['kategori']); ?>
                        </div>
                        <h2 class="text-2xl font-extrabold text-slate-900 mb-3"><?= htmlspecialchars($row['judul']); ?></h2>
                        <div class="text-slate-700 leading-8 whitespace-pre-line"><?= htmlspecialchars($row['konten']); ?></div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="rounded-3xl border border-dashed border-slate-300 bg-slate-100 p-8 text-center text-slate-500">Belum ada materi edukasi di database.</div>
            <?php endif; ?>
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
