<?php
include '../db.php'; // koneksi database

if (!isset($_GET['id'])) {
    die("ID lembur tidak ditemukan.");
}

$id_lembur = (int) $_GET['id'];

// Update status lembur jadi 'approved'
$query = "UPDATE lembur SET status = 'Disetujui' WHERE id_lembur = $id_lembur";

if (mysqli_query($conn, $query)) {
    header('Location: indexLembur.php'); // redirect ke halaman list
    exit;
} else {
    echo "Error update: " . mysqli_error($conn);
}
?>
