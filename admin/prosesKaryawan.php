<?php
include '../config/koneksi.php';
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$lahir = $_POST['lahir'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];

$inputKaryawan = mysqli_query($koneksi, "INSERT INTO tbl_karyawan (nip, password, nama, tanggal_lahir, nohp, alamat) VALUES ('$nip', '$password', '$nama', '$lahir', '$hp', '$alamat')");
if ($inputKaryawan) {
    header('location:index.php');
}else{
    echo "gagal: ".mysqli_error($koneksi);
}

?>