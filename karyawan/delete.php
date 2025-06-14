<?php
include '../db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id']) || (int)$_GET['id'] <= 0) {
    die("ID karyawan tidak valid.");
}

$id = (int)$_GET['id'];

$stmt = $conn->prepare("DELETE FROM karyawan WHERE id_karyawan = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $stmt->close();
    header("Location: indexKaryawan.php");
    exit;
} else {
    echo "Gagal menghapus data: " . $stmt->error;
}
?>
