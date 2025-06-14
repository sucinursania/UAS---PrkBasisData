<?php<?php
include '../db.php';
$id = $_GET['id'];
mysqli_query($conn, "UPDATE izin SET status='Disetujui' WHERE id_izin=$id");
header("Location: indexIzin.php");
?>
