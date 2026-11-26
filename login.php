<?php
session_start();
include 'koneksi.php';

$error = '';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['admin'] = true;
        $_SESSION['username'] = $username;
        header("Location: tambah.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Edukasi Narkoba</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        (function () {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (prefersDark ? 'dark' : 'light');
            document.body.setAttribute('data-theme', theme);
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
            --shadow: rgba(15,23,42,0.12);
        }
        body[data-theme="dark"] {
            --bg: #020817;
            --panel: rgba(15, 23, 42, 0.94);
            --panel-soft: #111827;
            --text: #e2e8f0;
            --text-soft: #cbd5e1;
            --line: rgba(148,163,184,0.28);
            --primary: #38bdf8;
            --primary-strong: #0ea5e9;
            --shadow: rgba(2,8,23,0.78);
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: linear-gradient(135deg, rgba(14,165,233,0.16), rgba(16,185,129,0.12)); color: var(--text); }
        body[data-theme="dark"] { background: linear-gradient(135deg, rgba(2,8,23,1), rgba(15,23,42,1)); }
        .theme-card { background: var(--panel); border-color: var(--line); box-shadow: 0 30px 60px var(--shadow); }
        .theme-input { background: var(--panel-soft); border-color: var(--line); color: var(--text); }
        .theme-label { color: var(--text); }
        .theme-muted { color: var(--text-soft); }
        .theme-button { background: linear-gradient(135deg, var(--primary), var(--primary-strong)); }
    </style>
</head>
<body data-theme="light" class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="theme-card backdrop-blur border rounded-[2rem] p-6 sm:p-8">
            <div class="flex items-center justify-between gap-3 mb-6">
                <div class="flex items-center justify-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sky-500 to-cyan-400 flex items-center justify-center text-white text-xl shadow-lg shadow-sky-200">
                        <i class="fa-solid fa-heart-pulse"></i>
                    </div>
                    <div>
                        <div class="text-lg font-extrabold text-slate-900">GEN SEHAT</div>
                        <div class="text-[10px] font-bold uppercase tracking-[0.2em] text-sky-600">Admin Portal</div>
                    </div>
                </div>
                <button id="themeToggle" type="button" class="flex items-center justify-center w-9 h-9 rounded-xl border border-slate-200 bg-slate-100 text-slate-700 hover:bg-slate-200 transition" aria-label="Toggle dark mode">
                    <i class="fa-solid fa-moon"></i>
                </button>
            </div>

            <?php if (!empty($error)) : ?>
                <div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 p-3 text-sm text-rose-700 text-center font-medium"><?= $error; ?></div>
            <?php endif; ?>

            <form action="" method="POST" class="space-y-4">
                <div>
                    <label for="username" class="block text-sm font-semibold theme-label mb-2">Username</label>
                    <input id="username" type="text" name="username" required autocomplete="off" class="theme-input w-full rounded-xl border px-3 py-3 text-sm placeholder:text-slate-400 focus:border-sky-400 focus:outline-none focus:ring-4 focus:ring-sky-100">
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold theme-label mb-2">Password</label>
                    <input id="password" type="password" name="password" required class="theme-input w-full rounded-xl border px-3 py-3 text-sm placeholder:text-slate-400 focus:border-sky-400 focus:outline-none focus:ring-4 focus:ring-sky-100">
                </div>

                <button type="submit" name="login" class="theme-button w-full rounded-xl text-white text-sm font-bold py-3.5 hover:shadow-lg hover:shadow-sky-200 transition">
                    Masuk ke Dashboard
                </button>
            </form>

            <div class="mt-5 text-center">
                <a href="index.php" class="inline-flex items-center gap-2 text-sm font-semibold theme-muted hover:text-sky-600">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
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
