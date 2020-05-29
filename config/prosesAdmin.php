<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$pw = $_POST['password'];
$date = date("Y-m-d");
$login = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username' AND password='$pw'");

$cek = mysqli_num_rows($login);
if ($cek > 0) {
    $data = mysqli_fetch_array($login);
    $_SESSION['data'] = $data;
    $_SESSION['status'] = 'admin';
    header("location:../admin/index.php");
} else {
    header("location:../index.php?err=f");
}
?>