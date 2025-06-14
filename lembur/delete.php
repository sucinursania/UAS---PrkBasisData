<?php
include '../db.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM lembur WHERE id_lembur = $id");
header("Location: indexLembur.php");
?>
