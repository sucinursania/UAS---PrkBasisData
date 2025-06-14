<?php
include '../db.php';
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM izin WHERE id_izin=$id");
header("Location: indexKaryawan.php");
?>
