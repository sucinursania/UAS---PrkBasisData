<?php
include '../db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die("ID cuti tidak valid.");
}

// Ambil data cuti berdasarkan ID
$result = mysqli_query($conn, "SELECT * FROM cuti WHERE id_cuti = $id");
$data = mysqli_fetch_assoc($result);
if (!$data) {
    die("Data cuti tidak ditemukan.");
}

// Ambil semua data karyawan
$karyawan = mysqli_query($conn, "SELECT * FROM karyawan");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cuti = $_POST['id_cuti'];
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $keterangan = $_POST['keterangan'];

    $query = "UPDATE cuti SET 
                id_karyawan = '$id_karyawan', 
                tanggal_mulai = '$tanggal_mulai', 
                tanggal_selesai = '$tanggal_selesai', 
                keterangan = '$keterangan' 
              WHERE id_cuti = '$id_cuti'";

    $update = mysqli_query($conn, $query);
    if ($update) {
        header("Location: indexCuti.php");
        exit;
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>

<h2>Edit Data Cuti</h2>
<form method="post">
    <input type="hidden" name="id_cuti" value="<?= $data['id_cuti'] ?>">

    <label>Nama Karyawan:</label>
    <select name="id_karyawan">
        <?php while ($row = mysqli_fetch_assoc($karyawan)): ?>
            <option value="<?= $row['id_karyawan'] ?>" <?= ($row['id_karyawan'] == $data['id_karyawan']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($row['nama']) ?>
            </option>
        <?php endwhile; ?>
    </select><br>

    <label>Tanggal Mulai:</label>
    <input type="date" name="tanggal_mulai" value="<?= htmlspecialchars($data['tanggal_mulai']) ?>"><br>

    <label>Tanggal Selesai:</label>
    <input type="date" name="tanggal_selesai" value="<?= htmlspecialchars($data['tanggal_selesai']) ?>"><br>

    <label>Alasan:</label>
    <input type="text" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>"><br>

    <button type="submit">Update</button>
</form>
