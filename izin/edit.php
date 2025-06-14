<?php
include '../db.php';

// Ambil ID izin dari query string
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die("ID izin tidak valid.");
}

// Ambil data izin berdasarkan ID
$result = mysqli_query($conn, "SELECT * FROM izin WHERE id_izin = $id");
$data = mysqli_fetch_assoc($result);
if (!$data) {
    die("Data izin tidak ditemukan.");
}

// Ambil data karyawan untuk dropdown
$karyawan = mysqli_query($conn, "SELECT * FROM karyawan");

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_izin = $_POST['id_izin'];
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];

    // Update data izin
    $query = "UPDATE izin SET 
                id_karyawan = '$id_karyawan', 
                tanggal = '$tanggal', 
                keterangan = '$keterangan', 
                status = '$status' 
              WHERE id_izin = '$id_izin'";

    $update = mysqli_query($conn, $query);
    if ($update) {
        header("Location: indexIzin.php");
        exit;
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Izin</title>
</head>
<body>

<h2>Edit Data Izin</h2>
<form method="post">
    <input type="hidden" name="id_izin" value="<?= htmlspecialchars($data['id_izin']) ?>">

    <label>Nama Karyawan:</label>
    <select name="id_karyawan" required>
        <option value="">-- Pilih Karyawan --</option>
        <?php
        // Reset pointer to start of karyawan result for loop
        mysqli_data_seek($karyawan, 0);
        while ($row = mysqli_fetch_assoc($karyawan)): ?>
            <option value="<?= $row['id_karyawan'] ?>" <?= ($row['id_karyawan'] == $data['id_karyawan']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($row['nama']) ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <label>Tanggal:</label>
    <input type="date" name="tanggal" value="<?= htmlspecialchars($data['tanggal']) ?>" required><br><br>

    <label>Keterangan:</label>
    <input type="text" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>" required><br><br>

    <label>Status:</label>
    <select name="status" required>
        <option value="Menunggu" <?= $data['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
        <option value="Disetujui" <?= $data['status'] == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
        <option value="Ditolak" <?= $data['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
