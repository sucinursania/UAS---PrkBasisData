<?php
include '../db.php';

$result = mysqli_query($conn, "SELECT * FROM karyawan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Karyawan</title>
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
    }

    td a:hover {
      opacity: 0.8;
    }

    .btn-edit {
      background-color: #6a5acd;
    }

    .btn-hapus {
      background-color: #ff4d4d;
    }
  </style>
</head>
<body>

  <h2>Data Karyawan</h2>
  <a href="create.php">➕ Tambah Karyawan</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>Departemen</th>
      <th>Tanggal Masuk</th>
      <th>Aksi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?= $row['id_karyawan'] ?></td>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['jabatan'] ?></td>
      <td><?= $row['departemen'] ?></td>
      <td><?= $row['tanggal_masuk'] ?></td>
      <td>
        <a href="edit.php?id=<?= $row['id_karyawan'] ?>" class="btn-edit">Edit</a>
        <a href="hapus.php?id=<?= $row['id_karyawan'] ?>" class="btn-hapus" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>

</body>
</html>
