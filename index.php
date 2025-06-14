<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard HRD</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            transition: all 0.3s ease-in-out;
        }
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            background-color: #cde2f9;
        }

        .sidebar {
            width: 240px;
            background-color: #e3d5f5;
            color: #5a189a;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #5a189a;
            text-decoration: none;
            border-radius: 8px;
            margin: 6px 12px;
        }

        .sidebar a:hover {
            background-color: #d0bfff;
        }

        .content {
            margin-left: 240px;
            padding: 40px;
            width: 100%;
        }

        .content h2 {
            color: #ff5dbb;
            font-size: 26px;
            margin-bottom: 10px;
        }

        .content h1 {
            color: #e84393;
            font-size: 40px;
            font-weight: 700;
            margin-top: 0;
        }

        .content p {
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>HRD Panel</h2>
        <a href="/UAS/index.php">Beranda</a>
        <a href="/UAS/karyawan/indexKaryawan.php">Data Karyawan</a>
        <a href="/UAS/absensi/index.php">Data Absensi</a>
        <a href="/UAS/cuti/indexCuti.php">Data Cuti</a>
        <a href="/UAS/izin/indexIzin.php">Data Izin</a>
        <a href="/UAS/lembur/indexLembur.php">Data Lembur</a>
        <a href="/UAS/gaji/indexGaji.php">Data Gaji</a>
        <a href="logout.php" style="color:red;">Logout</a>
    </div>
    <div class="content">
        <h2>Selamat Datang di Dashboard HRD</h2>
        <h1>Bill & Co Company</h1>
        <p>Pilih menu di sidebar untuk mengelola data.</p>
    </div>
</body>
</html>
