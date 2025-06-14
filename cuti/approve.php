<?php<?php
include '../db.php';
$id = $_GET['id'];
mysqli_query($conn, "UPDATE cuti SET status='Disetujui' WHERE id_cuti=$id");
header("Location: indexCuti.php");
?>
