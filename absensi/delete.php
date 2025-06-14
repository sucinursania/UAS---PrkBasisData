<?php
include '../db.php';

$id = $_GET['id'] ?? null;
if ($id) {
    mysqli_query($conn, "DELETE FROM absensi WHERE id_absensi = $id");
}

header("Location: index.php");
exit;
?>
