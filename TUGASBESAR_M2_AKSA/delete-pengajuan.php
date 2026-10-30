<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $delete = mysqli_query($conn, "DELETE FROM pengajuan_pembimbing WHERE id = $id");
    
    if ($delete) {
        header("Location: riwayat-pengajuan.php");
        exit;
    } else {
        die("Gagal menghapus data dari database! Error: " . mysqli_error($conn));
    }
} else {
    header("Location: riwayat-pengajuan.php");
    exit;
}
?>
