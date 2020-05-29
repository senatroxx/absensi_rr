<?php
include '../config/koneksi.php';
$id = $_POST['id'];
$nip = $_POST['nip'];
$tanggal = $_POST['tanggal'];
$gajiPokok = $_POST['gajiPokok'];
$gajiHarian = $_POST['gajiHarian'];
$bonus = $_POST['bonus'];
$totalGaji = $_POST['totalGaji'];

$updateKaryawan = mysqli_query($koneksi, "UPDATE tbl_gaji SET nip='$nip', tanggal='$tanggal', gaji_pokok='$gajiPokok', gaji_harian='$gajiHarian', bonus='$bonus', total='$totalGaji' WHERE id='$id'");
if ($updateKaryawan) {
    header('location:gaji.php');
}else{
    echo "gagal: ".mysqli_error($koneksi);
}

?>