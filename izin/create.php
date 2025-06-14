<?php
include '../db.php';

// Ambil daftar karyawan
$karyawan = mysqli_query($conn, "SELECT * FROM karyawan");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $status = 'Menunggu'; // status default

    // Jangan masukkan id_izin (biar auto increment jalan)
    $query = "INSERT INTO izin (id_karyawan, tanggal, keterangan, status) 
              VALUES ('$id_karyawan', '$tanggal', '$keterangan', '$status')";

    $insert = mysqli_query($conn, $query);

    if ($insert) {
        header("Location: indexIzin.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<h2>Tambah Izin</h2>
<form method="post">
    Karyawan:
    <select name="id_karyawan" required>
        <option value="">-- Pilih Karyawan --</option>
        <?php while ($row = mysqli_fetch_assoc($karyawan)): ?>
            <option value="<?= $row['id_karyawan'] ?>"><?= $row['nama'] ?></option>
        <?php endwhile; ?>
    </select><br><br>

    Tanggal: <input type="date" name="tanggal" required><br><br>
    Keterangan: <textarea name="keterangan" required></textarea><br><br>

    <button type="submit">Simpan</button>
</form>
