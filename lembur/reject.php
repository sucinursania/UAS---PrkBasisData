<?php
include '../db.php';

if (!isset($_GET['id'])) {
    die("ID lembur tidak ditemukan.");
}

$id_lembur = (int) $_GET['id'];

$query = "UPDATE lembur SET status = 'Ditolak' WHERE id_lembur = $id_lembur";

if (mysqli_query($conn, $query)) {
    header('Location: indexLembur.php');
    exit;
} else {
    echo "Error update: " . mysqli_error($conn);
}
?>
