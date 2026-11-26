<?php
session_start();

// Cek apakah yang mengakses adalah admin
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

// Cek apakah ada parameter ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data berita berdasarkan ID
    $query = "DELETE FROM berita WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Berita berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus berita!'); window.location='index.php';</script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>