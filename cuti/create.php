<?php
include '../db.php';

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO cuti (id_karyawan, tanggal_mulai, tanggal_selesai, keterangan, status) 
              VALUES ('$id_karyawan', '$tanggal_mulai', '$tanggal_selesai', '$keterangan', 'Menunggu')";
    $insert = mysqli_query($conn, $query);

    if ($insert) {
        // echo "Insert berhasil, redirect ke indexCuti.php";
        header("Location: indexCuti.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
} // <--- ini tadi yang kurang, nutup blok if POST

// Ambil data karyawan buat dropdown
$karyawan = mysqli_query($conn, "SELECT * FROM karyawan");
?>

<h2>Tambah Cuti</h2>
<form method="post">
    <label>Nama Karyawan:</label>
    <select name="id_karyawan" required>
        <option value="">-- Pilih Karyawan --</option>
        <?php while ($row = mysqli_fetch_assoc($karyawan)): ?>
            <option value="<?= $row['id_karyawan'] ?>"><?= $row['nama'] ?></option>
        <?php endwhile; ?>
    </select><br><br>

    <label>Tanggal Mulai:</label>
    <input type="date" name="tanggal_mulai" required><br><br>

    <label>Tanggal Selesai:</label>
    <input type="date" name="tanggal_selesai" required><br><br>

    <label>Keterangan:</label>
    <input type="text" name="keterangan" required><br><br>

    <button type="submit">Simpan</button>
</form>
