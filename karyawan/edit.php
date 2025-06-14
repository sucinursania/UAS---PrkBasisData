<?php
include '../db.php';

// Ambil id_karyawan dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die("ID karyawan tidak valid.");
}

// Query ambil data karyawan berdasarkan id_karyawan
$result = $conn->query("SELECT * FROM karyawan WHERE id_karyawan = $id");

if (!$result) {
    die("Error query: " . $conn->error);
}

$karyawan = $result->fetch_assoc();

if (!$karyawan) {
    die("Karyawan tidak ditemukan.");
}

// Proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $jabatan = $_POST['jabatan'] ?? '';
    $departemen = $_POST['departemen'] ?? '';
    $tanggal_masuk = $_POST['tanggal_masuk'] ?? '';

    if (!$nama || !$jabatan || !$departemen || !$tanggal_masuk) {
        echo "Semua field wajib diisi.";
    } else {
        $stmt = $conn->prepare("UPDATE karyawan SET nama=?, jabatan=?, departemen=?, tanggal_masuk=? WHERE id_karyawan=?");
        $stmt->bind_param("ssssi", $nama, $jabatan, $departemen, $tanggal_masuk, $id);
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: indexKaryawan.php");
            exit;
        } else {
            echo "Gagal update data: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Karyawan</title></head>
<body>
    <h2>Edit Karyawan</h2>
    <form method="post">
        Nama: <input type="text" name="nama" value="<?= htmlspecialchars($karyawan['nama']) ?>" required><br><br>
        Jabatan: <input type="text" name="jabatan" value="<?= htmlspecialchars($karyawan['jabatan']) ?>" required><br><br>
        Departemen: <input type="text" name="departemen" value="<?= htmlspecialchars($karyawan['departemen']) ?>" required><br><br>
        Tanggal Masuk: <input type="date" name="tanggal_masuk" value="<?= htmlspecialchars($karyawan['tanggal_masuk']) ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
