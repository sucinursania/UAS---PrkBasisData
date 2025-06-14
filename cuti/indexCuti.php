<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Cuti</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #e0f0ff, #fce4ec);
      margin: 0;
      padding: 40px;
    }

    h2 {
      text-align: center;
      color: #444;
      font-size: 28px;
      margin-bottom: 30px;
    }

    .button {
      background-color: #ff80ab;
      color: white;
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      cursor: pointer;
      transition: background 0.3s ease;
      display: inline-block;
      text-decoration: none;
      margin-bottom: 20px;
    }

    .button:hover {
      background-color: #ec407a;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      background-color: #fff;
      box-shadow: 0 6px 25px rgba(0,0,0,0.06);
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 14px 18px;
      text-align: center;
    }

    th {
      background-color: #f8bbd0;
      color: #333;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    tr:nth-child(even) {
      background-color: #fce4ec;
    }

    tr:hover {
      background-color: #f3e5f5;
    }

    .action-btn {
      font-size: 12px;
      padding: 6px 12px;
      border: none;
      border-radius: 6px;
      color: white;
      margin: 2px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }

    .edit { background-color: #64b5f6; }
    .delete { background-color: #ef5350; }
    .approve { background-color: #81c784; }
    .reject { background-color: #ffb74d; }

    .status {
      padding: 6px 10px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 500;
      color: white;
      display: inline-block;
    }

    .Menunggu { background-color: #ffa726; }
    .Disetujui { background-color: #4caf50; }
    .Ditolak { background-color: #e57373; }
  </style>
</head>
<body>

<?php
include '../db.php';

$query = "SELECT c.id_cuti, k.nama, c.tanggal_mulai, c.tanggal_selesai, c.keterangan, c.status
          FROM cuti c
          LEFT JOIN karyawan k ON c.id_karyawan = k.id_karyawan
          ORDER BY c.tanggal_mulai DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<h2>Data Cuti</h2>
<a href="create.php" class="button">+ Tambah Cuti</a>

<table>
  <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Mulai</th>
    <th>Selesai</th>
    <th>Keterangan</th>
    <th>Status</th>
    <th>Aksi</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><?= $row['id_cuti'] ?></td>
    <td><?= htmlspecialchars($row['nama']) ?></td>
    <td><?= $row['tanggal_mulai'] ?></td>
    <td><?= $row['tanggal_selesai'] ?></td>
    <td><?= $row['keterangan'] ?></td>
    <td><span class="status <?= $row['status'] ?>"><?= $row['status'] ?></span></td>
    <td>
      <a href="edit.php?id=<?= $row['id_cuti'] ?>" class="action-btn edit">Edit</a>
      <a href="delete.php?id=<?= $row['id_cuti'] ?>" class="action-btn delete" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
      <?php if ($row['status'] == 'Menunggu'): ?>
        <br>
        <a href="approve.php?id=<?= $row['id_cuti'] ?>" class="action-btn approve">Setujui</a>
        <a href="reject.php?id=<?= $row['id_cuti'] ?>" class="action-btn reject" onclick="return confirm('Yakin tolak cuti ini?')">Tolak</a>
      <?php endif; ?>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

</body>
</html>
