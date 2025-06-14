<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard HRD</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }
        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            color: #ecf0f1;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
            width: 100%;
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
    </div>
    <div class="content">
        <h2>Selamat Datang di Dashboard HRD</h2>
        <h1>Bill & Co Company</h1>
        <p>Pilih menu di sidebar untuk mengelola data.</p>
    </div>
</body>
</html>
