<?php
include '../db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM cuti WHERE id_cuti = $id");
header("Location: indexCuti.php");
?>
