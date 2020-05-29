<?php
    include "koneksi.php";

    $nip = $_REQUEST['nip'];
    $month = date("m");

    $queryPegawai = mysqli_query($koneksi,"SELECT * FROM tbl_absen WHERE nip='$nip' AND month(tanggal) = '$month'");
    
    $d = mysqli_num_rows($queryPegawai);
    if ($d > 0) {
        $gajiHarian = $d * 10000;
    }

    $data = array($gajiHarian);
    echo json_encode($data);    
?>