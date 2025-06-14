<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_karyawan = $_POST['id_karyawan'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $lembur = $_POST['lembur'];
    $potongan = $_POST['potongan'];
    $total_gaji = $gaji_pokok + $lembur - $potongan;

    $query = "INSERT INTO gaji (id_karyawan, bulan, tahun, gaji_pokok, lembur, potongan, total_gaji)
              VALUES ('$id_karyawan', '$bulan', '$tahun', '$gaji_pokok', '$lembur', '$potongan', '$total_gaji')";
    mysqli_query($conn, $query);
    header("Location: indexGaji.php");
}
?>

<h2>Tambah Data Gaji</h2>
<form method="POST">
    ID Karyawan: <input type="number" name="id_karyawan"><br>
    Bulan: <input type="number" name="bulan"><br>
    Tahun: <input type="number" name="tahun"><br>
    Gaji Pokok: <input type="number" name="gaji_pokok"><br>
    Lembur: <input type="number" name="lembur"><br>
    Potongan: <input type="number" name="potongan"><br>
    <input type="submit" value="Simpan">
</form>
