<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include 'koneksi.php';

$id = $_GET['id'] ?? 0;
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM berita WHERE id = '$id'"));

if (!$data) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $penulis = mysqli_real_escape_string($conn, $_POST['penulis']);
    $konten = mysqli_real_escape_string($conn, $_POST['konten']);

    mysqli_query($conn, "UPDATE berita SET judul='$judul', kategori='$kategori', penulis='$penulis', konten='$konten' WHERE id='$id'");
    echo "<script>alert('Berita Berhasil Diubah'); window.location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
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
            --panel: rgba(255,255,255,0.9);
            --panel-soft: #f8fafc;
            --text: #0f172a;
            --text-soft: #475569;
            --line: rgba(148,163,184,0.3);
            --primary: #0ea5e9;
            --primary-strong: #0284c7;
        }
        body[data-theme="dark"] {
            --bg: #020817;
            --panel: rgba(15,23,42,0.95);
            --panel-soft: #111827;
            --text: #e2e8f0;
            --text-soft: #cbd5e1;
            --line: rgba(148,163,184,0.28);
            --primary: #38bdf8;
            --primary-strong: #0ea5e9;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: linear-gradient(135deg, rgba(14,165,233,0.12), rgba(16,185,129,0.08)); color: var(--text); }
        body[data-theme="dark"] { background: linear-gradient(135deg, rgba(2,8,23,1), rgba(15,23,42,1)); }
        .theme-card { background: var(--panel); border-color: var(--line); box-shadow: 0 28px 60px rgba(15,23,42,0.12); }
        .theme-input { background: var(--panel-soft); border-color: var(--line); color: var(--text); }
        .theme-label { color: var(--text); }
    </style>
</head>
<body data-theme="light" class="min-h-screen py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="mb-6 flex items-center justify-between gap-3">
            <div>
                <div class="text-sm font-bold uppercase tracking-[0.2em] text-sky-600">Dashboard Admin</div>
                <h1 class="text-2xl font-extrabold text-slate-900">Edit Berita</h1>
            </div>
            <div class="flex gap-2 items-center">
                <button id="themeToggle" type="button" class="flex items-center justify-center w-9 h-9 rounded-xl border border-slate-200 bg-slate-100 text-slate-700 hover:bg-slate-200 transition" aria-label="Toggle dark mode">
                    <i class="fa-solid fa-moon"></i>
                </button>
                <a href="index.php" class="px-3 py-2 rounded-xl bg-white border border-slate-200 text-sm font-semibold text-slate-700 hover:bg-slate-100">Beranda</a>
                <a href="logout.php" class="px-3 py-2 rounded-xl bg-rose-50 border border-rose-200 text-sm font-semibold text-rose-600 hover:bg-rose-100">Logout</a>
            </div>
        </div>

        <div class="theme-card backdrop-blur border rounded-[2rem] p-6 sm:p-8">
            <form action="" method="POST" class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold theme-label mb-2">Judul</label>
                    <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']); ?>" required class="theme-input w-full rounded-xl border px-3 py-3 text-sm focus:border-sky-400 focus:outline-none focus:ring-4 focus:ring-sky-100">
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold theme-label mb-2">Kategori</label>
                        <select name="kategori" class="theme-input w-full rounded-xl border px-3 py-3 text-sm focus:border-sky-400 focus:outline-none focus:ring-4 focus:ring-sky-100">
                            <option value="Edukasi" <?= $data['kategori'] == 'Edukasi' ? 'selected' : ''; ?>>Edukasi</option>
                            <option value="Pencegahan" <?= $data['kategori'] == 'Pencegahan' ? 'selected' : ''; ?>>Pencegahan</option>
                            <option value="Hukum" <?= $data['kategori'] == 'Hukum' ? 'selected' : ''; ?>>Hukum & Kasus</option>
                            <option value="Pemulihan" <?= $data['kategori'] == 'Pemulihan' ? 'selected' : ''; ?>>Pemulihan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold theme-label mb-2">Penulis</label>
                        <input type="text" name="penulis" value="<?= htmlspecialchars($data['penulis']); ?>" required class="theme-input w-full rounded-xl border px-3 py-3 text-sm focus:border-sky-400 focus:outline-none focus:ring-4 focus:ring-sky-100">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold theme-label mb-2">Konten</label>
                    <textarea name="konten" rows="10" required class="theme-input w-full rounded-xl border px-3 py-3 text-sm focus:border-sky-400 focus:outline-none focus:ring-4 focus:ring-sky-100"><?= htmlspecialchars($data['konten']); ?></textarea>
                </div>

                <div class="flex flex-wrap gap-3">
                    <button type="submit" name="update" class="px-5 py-3 rounded-xl bg-gradient-to-r from-sky-600 to-cyan-500 text-white text-sm font-bold hover:shadow-lg hover:shadow-sky-200 transition">Update Berita</button>
                    <a href="index.php" class="px-5 py-3 rounded-xl border border-slate-200 bg-white text-slate-700 text-sm font-bold hover:bg-slate-100 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>

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
