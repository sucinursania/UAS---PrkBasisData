<?php
include '../db.php';

// Ambil data karyawan untuk dropdown
$karyawan_result = mysqli_query($conn, "SELECT id_karyawan, nama FROM karyawan");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal = $_POST['tanggal'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_keluar = $_POST['jam_keluar'];
    $status_kehadiran = $_POST['status_kehadiran'];

    $query = "INSERT INTO absensi (id_karyawan, tanggal, jam_masuk, jam_keluar, status_kehadiran) 
              VALUES ('$id_karyawan', '$tanggal', '$jam_masuk', '$jam_keluar', '$status_kehadiran')";
    mysqli_query($conn, $query);
    header("Location: index.php");
    exit;
}
?>

<h2>Tambah Data Absensi</h2>
<form method="post">
    Karyawan:
    <select name="id_karyawan" required>
        <option value="">-- Pilih Karyawan --</option>
        <?php while($k = mysqli_fetch_assoc($karyawan_result)): ?>
            <option value="<?= $k['id_karyawan'] ?>"><?= htmlspecialchars($k['nama']) ?></option>
        <?php endwhile; ?>
    </select><br><br>

    Tanggal: <input type="date" name="tanggal" required><br><br>
    Jam Masuk: <input type="time" name="jam_masuk"><br><br>
    Jam Keluar: <input type="time" name="jam_keluar"><br><br>
    Status Kehadiran:
    <select name="status_kehadiran" required>
        <option value="Hadir">Hadir</option>
        <option value="Izin">Izin</option>
        <option value="Cuti">Cuti</option>
        <option value="Alpha">Alpha</option>
        <option value="Lembur">Lembur</option>
    </select><br><br>

    <input type="submit" value="Simpan">
</form>
<a href="index.php">Kembali</a>
