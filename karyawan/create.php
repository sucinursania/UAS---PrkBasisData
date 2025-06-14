<?php
include '../db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $departemen = $_POST['departemen'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    mysqli_query($conn, "INSERT INTO karyawan (nama, jabatan, departemen, tanggal_masuk) VALUES ('$nama','$jabatan','$departemen','$tanggal_masuk')");
    header("Location: indexKaryawan.php");
}
?>
<h2>Tambah Karyawan</h2>
<form method="post">
    Nama: <input type="text" name="nama"><br>
    Jabatan: <input type="text" name="jabatan"><br>
    Departemen: <input type="text" name="departemen"><br>
    Tanggal Masuk: <input type="date" name="tanggal_masuk"><br>
    <input type="submit" value="Simpan">
</form>
