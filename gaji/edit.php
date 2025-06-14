<?php
include '../db.php';
$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM gaji WHERE id_gaji = $id");
$data = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_karyawan = $_POST['id_karyawan'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $lembur = $_POST['lembur'];
    $potongan = $_POST['potongan'];
    $total_gaji = $gaji_pokok + $lembur - $potongan;

    $update = "UPDATE gaji SET id_karyawan='$id_karyawan', bulan='$bulan', tahun='$tahun',
               gaji_pokok='$gaji_pokok', lembur='$lembur', potongan='$potongan', total_gaji='$total_gaji'
               WHERE id_gaji=$id";
    mysqli_query($conn, $update);
    header("Location: indexGaji.php");
}
?>

<h2>Edit Gaji</h2>
<form method="POST">
    ID Karyawan: <input type="number" name="id_karyawan" value="<?= $data['id_karyawan'] ?>"><br>
    Bulan: <input type="number" name="bulan" value="<?= $data['bulan'] ?>"><br>
    Tahun: <input type="number" name="tahun" value="<?= $data['tahun'] ?>"><br>
    Gaji Pokok: <input type="number" name="gaji_pokok" value="<?= $data['gaji_pokok'] ?>"><br>
    Lembur: <input type="number" name="lembur" value="<?= $data['lembur'] ?>"><br>
    Potongan: <input type="number" name="potongan" value="<?= $data['potongan'] ?>"><br>
    <input type="submit" value="Update">
</form>
