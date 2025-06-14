<?php
include '../db.php'; // pastikan path sesuai

if (isset($_POST['submit'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal = $_POST['tanggal'];
    $jumlah_jam = $_POST['jumlah_jam'];
    $keterangan = $_POST['keterangan'];
    $status = 'Menunggu'; // langsung diset otomatis

    $query = "INSERT INTO lembur (id_karyawan, tanggal, jumlah_jam, keterangan, status)
              VALUES ($id_karyawan, '$tanggal', $jumlah_jam, '$keterangan', '$status')";

    if (mysqli_query($conn, $query)) {
        header("Location: indexLembur.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<h2>Tambah Data Lembur</h2>

<form method="POST" action="">
    <label>ID Karyawan:</label><br>
    <input type="number" name="id_karyawan" required><br><br>

    <label>Tanggal:</label><br>
    <input type="date" name="tanggal" required><br><br>

    <label>Jumlah Jam:</label><br>
    <input type="number" name="jumlah_jam" required><br><br>

    <label>Keterangan:</label><br>
    <textarea name="keterangan" required></textarea><br><br>

    <input type="submit" name="submit" value="Simpan">
</form>
