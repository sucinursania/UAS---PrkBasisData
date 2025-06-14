<?php
include '../db.php';

// Ambil id lembur dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die("ID lembur tidak valid.");
}

// Ambil data lembur sesuai id
$result = mysqli_query($conn, "SELECT * FROM lembur WHERE id_lembur = $id");
$data = mysqli_fetch_assoc($result);
if (!$data) {
    die("Data lembur tidak ditemukan.");
}

// Ambil data karyawan buat dropdown
$karyawan = mysqli_query($conn, "SELECT * FROM karyawan");

// Proses update data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_lembur = $_POST['id_lembur'];
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal = $_POST['tanggal'];
    $jumlah_jam = $_POST['jumlah_jam'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];

    $query = "UPDATE lembur SET 
                id_karyawan = '$id_karyawan',
                tanggal = '$tanggal',
                jumlah_jam = '$jumlah_jam',
                keterangan = '$keterangan',
                status = '$status'
              WHERE id_lembur = '$id_lembur'";

    $update = mysqli_query($conn, $query);

    if ($update) {
        header("Location: indexLembur.php");
        exit;
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>

<h2>Edit Data Lembur</h2>
<form method="post">
    <input type="hidden" name="id_lembur" value="<?= $data['id_lembur'] ?>">

    <label>Nama Karyawan:</label>
    <select name="id_karyawan" required>
        <option value="">-- Pilih Karyawan --</option>
        <?php while ($row = mysqli_fetch_assoc($karyawan)): ?>
            <option value="<?= $row['id_karyawan'] ?>" <?= ($row['id_karyawan'] == $data['id_karyawan']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($row['nama']) ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <label>Tanggal:</label>
    <input type="date" name="tanggal" value="<?= htmlspecialchars($data['tanggal']) ?>" required><br><br>

    <label>Jumlah Jam:</label>
    <input type="number" name="jumlah_jam" value="<?= htmlspecialchars($data['jumlah_jam']) ?>" min="1" required><br><br>

    <label>Keterangan:</label>
    <input type="text" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>" required><br><br>

    <label>Status:</label>
    <select name="status" required>
        <option value="Menunggu" <?= ($data['status'] == 'Menunggu') ? 'selected' : '' ?>>Menunggu</option>
        <option value="Disetujui" <?= ($data['status'] == 'Disetujui') ? 'selected' : '' ?>>Disetujui</option>
        <option value="Ditolak" <?= ($data['status'] == 'Ditolak') ? 'selected' : '' ?>>Ditolak</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>
