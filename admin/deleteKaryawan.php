<?php
include '../config/koneksi.php';
$nip = $_GET['nip'];

$deleteKaryawan = mysqli_query($koneksi, "DELETE FROM tbl_karyawan WHERE nip='$nip'");
if ($deleteKaryawan) {
    header('location:index.php');
}else{
    echo "gagal: ".mysqli_error($koneksi);
}
?>