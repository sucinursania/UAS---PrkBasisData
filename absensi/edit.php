<?php
include '../db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

// Ambil data absensi yang akan diedit
$result = mysqli_query($conn, "SELECT * FROM absensi WHERE id_absensi = $id");
$absensi = mysqli_fetch_assoc($result);

// Ambil data karyawan untuk dropdown
$karyawan_result = mysqli_query($conn, "SELECT id_karyawan, nama FROM karyawan");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal = $_POST['tanggal'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_keluar = $_POST['jam_keluar'];
    $status_kehadiran = $_POST['status_kehadiran'];

    $query = "UPDATE absensi SET 
              id_karyawan = '$id_karyawan', 
              tanggal = '$tanggal', 
              jam_masuk = '$jam_masuk', 
              jam_keluar = '$jam_keluar', 
              status_kehadiran = '$status_kehadiran' 
              WHERE id_absensi = $id";
    if (mysqli_query($conn, $query)) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal update: " . mysqli_error($conn);
}
    exit;
}
?>

<h2>Edit Data Absensi</h2>
<form method="post">
    Karyawan:
    <select name="id_karyawan" required>
        <option value="">-- Pilih Karyawan --</option>
        <?php while($k = mysqli_fetch_assoc($karyawan_result)): ?>
            <option value="<?= $k['id_karyawan'] ?>" <?= $k['id_karyawan'] == $absensi['id_karyawan'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($k['nama']) ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    Tanggal: <input type="date" name="tanggal" value="<?= $absensi['tanggal'] ?>" required><br><br>
    Jam Masuk: <input type="time" name="jam_masuk" value="<?= $absensi['jam_masuk'] ?>"><br><br>
    Jam Keluar: <input type="time" name="jam_keluar" value="<?= $absensi['jam_keluar'] ?>"><br><br>
    Status Kehadiran:
    <select name="status_kehadiran" required>
        <?php
        $statusList = ['Hadir', 'Izin', 'Cuti', 'Alpha', 'Lembur'];
        foreach ($statusList as $status) {
            $selected = ($absensi['status_kehadiran'] == $status) ? 'selected' : '';
            echo "<option value='$status' $selected>$status</option>";
        }
        ?>
    </select><br><br>

    <input type="submit" value="Update">
</form>
<a href="index.php">Kembali</a>
