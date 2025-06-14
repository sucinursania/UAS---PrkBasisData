<?php
session_start();
session_destroy(); // hancurkan semua session
header("Location: login.php"); // balik ke login
exit;
?>
