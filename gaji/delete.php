<?php
include '../db.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM gaji WHERE id_gaji = $id");
header("Location: indexGaji.php");
?>
