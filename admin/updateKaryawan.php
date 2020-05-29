<?php
include '../config/koneksi.php';
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$lahir = $_POST['lahir'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];

$updateKaryawan = mysqli_query($koneksi, "UPDATE tbl_karyawan SET password='$password', nama='$nama', tanggal_lahir='$lahir', nohp='$hp', alamat='$alamat' WHERE nip='$nip'");
if ($updateKaryawan) {
    header('location:index.php');
}else{
    echo "gagal: ".mysqli_error($koneksi);
}

?>