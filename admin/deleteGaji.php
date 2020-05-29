<?php
include '../config/koneksi.php';
$id = $_GET['id'];

$deleteGaji = mysqli_query($koneksi, "DELETE FROM tbl_gaji WHERE id='$id'");
if ($deleteGaji) {
    header('location:gaji.php');
}else{
    echo "gagal: ".mysqli_error($koneksi);
}
?>