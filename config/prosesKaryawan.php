<?php
session_start();
include 'koneksi.php';

$nip 	= $_POST['nip'];
$pw		= $_POST['password'];
$date 	= date("Y-m-d");
$login = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE nip='$nip' AND password='$pw'");

$cek = mysqli_num_rows($login);
if($cek > 0){
	$data = mysqli_fetch_array($login);
	$_SESSION['status'] = "karyawan";
	$_SESSION['data'] = $data;
	// $absen = mysqli_query($koneksi, "INSERT INTO tbl_absen (id, nip, tanggal) VALUES (NULL, '$nip', '$date')");
	header("location:../absen.php");
}else{
	header("location:../index.php?msg=f");
}
?>