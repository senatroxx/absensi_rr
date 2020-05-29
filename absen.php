<?php
    session_start();
    include 'config/koneksi.php';
    $nip = $_SESSION['data']['nip'];
    $date = date('Y-m-d');;
    if (isset($_POST['absen'])) {
        $absen = mysqli_query($koneksi, "INSERT INTO tbl_absen (id, nip, tanggal) VALUES (NULL, '$nip', '$date')");
        if ($absen) {
            $_SESSION['hasil'] = 1;
            header("location:absen.php");
        }
    }
    $cek = mysqli_query($koneksi, "SELECT * FROM tbl_absen WHERE nip='$nip' AND tanggal='$date'");
    $cek2 = mysqli_num_rows($cek);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <style>
    .rwd-table {
        margin: 1em 0;
        min-width: 300px;
    }
    .rwd-table tr {
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }
    .rwd-table th {
        display: none;
    }
    .rwd-table td {
        display: block;
    }
    .rwd-table td:first-child {
        padding-top: .5em;
    }
    .rwd-table td:last-child {
        padding-bottom: .5em;
    }
    .rwd-table td:before {
        content: attr(data-th) ": ";
        font-weight: bold;
        width: 6.5em;
        display: inline-block;
    }
    @media (min-width: 480px) {
        .rwd-table td:before {
            display: none;
        }
    }
    .rwd-table th, .rwd-table td {
        text-align: left;
    }
    @media (min-width: 480px) {
        .rwd-table th, .rwd-table td {
            display: table-cell;
            padding: .25em .5em;
        }
        .rwd-table th:first-child, .rwd-table td:first-child {
            padding-left: 0;
        }
        .rwd-table th:last-child, .rwd-table td:last-child {
            padding-right: 0;
        }
    }

    body {
        margin:0;
        font-family:arial;
        -webkit-font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
        color: #444;
        background: #eee;
    }

    h1 {
        font-weight: normal;
        letter-spacing: -1px;
        color: #34495E;
    }

    .container{
        padding: 0 2em;
    }

    .rwd-table {
        background: #34495E;
        color: #fff;
        border-radius: .4em;
        overflow: hidden;
    }
    .rwd-table tr {
        border-color: #46637f;
    }
    .rwd-table th, .rwd-table td {
        margin: .5em 1em;
    }
    @media (min-width: 480px) {
        .rwd-table th, .rwd-table td {
            padding: 1em !important;
        }
    }
    .rwd-table th, .rwd-table td:before {
        color: #dd5;
    }
    .nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #2f3640;
    }

    .nav li {
        float: left;
    }

    .nav li a, .nav li input {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .nav li input{
        background:#34495E;
        border:none;
        padding:none;
        font-size:15px;
        color:#dd5;
        font-weight:bold;
    }

    .nav li a:hover:not(.active) {
        background-color: #353b48;
    }

    .nav .active {
        background-color: #4CAF50;
    }

    .nav .logout{
        background-color: #c0392b;
    }

    .nav.logout:hover{
        background-color:#e74c3c;
    }

    .notice{
        background-color:#34495e;
        text-align:center;
        color:#fff;
        font-size:16px;
        padding:10px
    }

    input:disabled{
        cursor:not-allowed;
    }
    </style>
</head>
<body>
<?php 
    if (isset($_SESSION['hasil'])) {
        if ($_SESSION['hasil'] == 1) {
            echo "
            <div class='notice'>
                Terimakasih, anda sudah absen.
            </div>
            ";
        }
    }
?>
<div class="nav">
    <ul>
        <li><a href="index.php">Profile</a></li>
        <li>
        <form method="post">
            <input type="submit" value="Klik disini untuk absen." name="absen" <?php if ($cek2 > 0) { echo "disabled"; } ?>>
        </form>
        </li>
        <li style="float:right"><a class="logout" href="config/logout.php">Logout</a></li>
    </ul>
</div>
<div class="container">
    <div class="table">
    <table class="rwd-table">
        <tr>
            <th>NIP</th>
            <td><?= $_SESSION['data']['nip'] ?></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td><?= $_SESSION['data']['nama'] ?></td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td><?= $_SESSION['data']['tanggal_lahir'] ?></td>
        </tr>
        <tr>
            <th>No HP</th>
            <td><?= $_SESSION['data']['nohp'] ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?= $_SESSION['data']['alamat'] ?></td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>Rp. 3.500.000</td>
        </tr>
        <tr>
            <th>Total Gaji Terakhir</th>
            <?php   $lastInsertId = mysqli_query($koneksi, "SELECT * FROM tbl_gaji WHERE id=(SELECT MAX(ID) FROM tbl_gaji WHERE nip='$nip')");
                    $getLast = mysqli_fetch_array($lastInsertId); 
                    $hasil_rupiah = "Rp. " . number_format($getLast['total'],0,',','.'); ?>
            <td><?= $hasil_rupiah ?></td>
        </tr>
    </table>
    </div>
</div>
</body>
</html>