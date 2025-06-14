<?php
include '../db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $query = "UPDATE cuti SET status = 'Ditolak' WHERE id_cuti = $id";
    $update = mysqli_query($conn, $query);

    if ($update) {
        header("Location: indexCuti.php"); // Balik ke halaman utama cuti
        exit;
    } else {
        echo "Gagal menolak cuti: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak valid.";
}
