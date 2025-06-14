<?php
include '../db.php';

$query = "SELECT g.id_gaji, k.nama, g.bulan, g.tahun, g.gaji_pokok, g.lembur, g.potongan, g.total_gaji
          FROM gaji g
          LEFT JOIN karyawan k ON g.id_karyawan = k.id_karyawan
          ORDER BY g.id_gaji ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<title>Data Gaji</title>
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
    a.button {
        display: inline-block;
        margin-bottom: 20px;
        background-color: #ff80ab;
        color: white;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        transition: background 0.3s ease;
    }
    a.button:hover {
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
        font-size: 14px;
    }
    thead tr {
        background-color: #f8bbd0;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    th, td {
        padding: 14px 18px;
        text-align: center;
        border-right: 1px solid #fce4ec;
    }
    th:last-child, td:last-child {
        border-right: none;
    }
    tbody tr:nth-child(even) {
        background-color: #fce4ec;
    }
    tbody tr:hover {
        background-color: #f3e5f5;
    }
    .action-link {
        font-size: 12px;
        padding: 6px 12px;
        border-radius: 6px;
        color: white;
        margin: 2px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }
    .edit {
        background-color: #64b5f6;
    }
    .edit:hover {
        background-color: #42a5f5;
    }
    .delete {
        background-color: #ef5350;
    }
    .delete:hover {
        background-color: #e53935;
    }
</style>
</head>
<body>

<h2>Data Gaji</h2>
<a href="create.php" class="button">Tambah Gaji</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Karyawan</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Gaji Pokok</th>
            <th>Lembur</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id_gaji'] ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['bulan']) ?></td>
            <td><?= htmlspecialchars($row['tahun']) ?></td>
            <td>Rp <?= number_format($row['gaji_pokok'], 0, ',', '.') ?></td>
            <td>Rp <?= number_format($row['lembur'], 0, ',', '.') ?></td>
            <td>Rp <?= number_format($row['potongan'], 0, ',', '.') ?></td>
            <td>Rp <?= number_format($row['total_gaji'], 0, ',', '.') ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id_gaji'] ?>" class="action-link edit">Edit</a>
                <a href="delete.php?id=<?= $row['id_gaji'] ?>" onclick="return confirm('Yakin ingin menghapus data gaji ini?')" class="action-link delete">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
