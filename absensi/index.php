<?php
include '../db.php';

$query = "SELECT a.id_absensi, k.nama, a.tanggal, a.jam_masuk, a.jam_keluar, a.status_kehadiran
          FROM absensi a
          LEFT JOIN karyawan k ON a.id_karyawan = k.id_karyawan
          ORDER BY a.tanggal DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Absensi</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f2f6ff;
      margin: 0;
      padding: 20px;
    }

    h2 {
      color: #4e4b8b;
      text-align: center;
    }

    a {
      text-decoration: none;
      color: white;
      background-color: #ff69b4;
      padding: 8px 12px;
      border-radius: 8px;
      margin-bottom: 10px;
      display: inline-block;
      transition: 0.3s;
    }

    a:hover {
      background-color: #d9509e;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: white;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid #f0f0f0;
    }

    th {
      background-color: #f7d8f0;
      color: #5c5c5c;
    }

    td {
      color: #333;
    }

    td a {
      margin: 0 5px;
      padding: 6px 10px;
      font-size: 14px;
      border-radius: 6px;
    }

    .btn-edit {
      background-color: #6a5acd;
    }

    .btn-hapus {
      background-color: #ff4d4d;
    }

    td a:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>

  <h2>Data Absensi</h2>
  <a href="create.php">➕ Tambah Absensi</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Nama Karyawan</th>
      <th>Tanggal</th>
      <th>Jam Masuk</th>
      <th>Jam Keluar</th>
      <th>Status Kehadiran</th>
      <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?= $row['id_absensi'] ?></td>
      <td><?= htmlspecialchars($row['nama']) ?></td>
      <td><?= $row['tanggal'] ?></td>
      <td><?= $row['jam_masuk'] ?></td>
      <td><?= $row['jam_keluar'] ?></td>
      <td><?= $row['status_kehadiran'] ?></td>
      <td>
        <a href="edit.php?id=<?= $row['id_absensi'] ?>" class="btn-edit">Edit</a>
        <a href="delete.php?id=<?= $row['id_absensi'] ?>" class="btn-hapus" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>

</body>
</html>
