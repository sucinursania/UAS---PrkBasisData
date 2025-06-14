<?php
include '../db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $query = "UPDATE izin SET status = 'Ditolak' WHERE id_izin = $id";
    $update = mysqli_query($conn, $query);

    if ($update) {
        header("Location: indexIzin.php");
        exit;
    } else {
        echo "Gagal menolak izin: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak valid.";
}
?>
