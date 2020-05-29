<?php
include '../config/koneksi.php';
$nip = $_POST['nip'];
$tanggal = $_POST['tanggal'];
$gajiPokok = $_POST['gajiPokok'];
$gajiHarian = $_POST['gajiHarian'];
$bonus = $_POST['bonus'];
$totalGaji = $_POST['totalGaji'];

$inputGaji = mysqli_query($koneksi, "INSERT INTO tbl_gaji (nip, tanggal, gaji_pokok, gaji_harian, bonus, total) VALUES ('$nip', '$tanggal', '$gajiPokok', '$gajiHarian', '$bonus', '$totalGaji')");
if ($inputGaji) {
    header('location:gaji.php');
}else{
    echo "gagal: ".mysqli_error($koneksi);
}

?>