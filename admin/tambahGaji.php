<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'admin') {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script>
            function auto(){
                let nip = document.getElementById("selectauto").value;
                let xml = new XMLHttpRequest();
                xml.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        console.log("mashok");
                        console.log(this.responseText);
                        console.log(JSON.parse(this.responseText));
                        let output = JSON.parse(this.responseText);
                        document.getElementById("gajiHarian").value = output[0];
                        document.getElementById("totalGaji").value = 3500000 + output[0];
                    }
                }
                xml.open("GET","../config/proses-ajax.php?nip="+nip, true);
                xml.send();
            }
            function auto2() {
                let gajiHarian = parseInt(document.getElementById("gajiHarian").value),
                    bonus = parseInt(document.getElementById("bonus").value),
                    totalGaji = 3500000 + gajiHarian + bonus;
                document.getElementById("totalGaji").value = totalGaji;
            }
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Admin</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="index.php"><i class="fa fa-user fa-fw"></i> Karyawan</a></li>
                    <li><a href="gaji.php"><i class="fa fa-money fa-fw"></i> Gaji</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?= $_SESSION['data']['username'] ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="../config/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-user fa-fw"></i> Karyawan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="tambahKaryawan.php">Tambah Karyawan</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="gaji.php"><i class="fa fa-user fa-fw"></i> Gaji<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="tambahGaji.php">Tambah Pembayaran Gaji</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Tambah Pembayaran Gaji</h1>
                            <a class="btn btn-primary" style="margin-bottom:20px" href="gaji.php">Kembali</a>
                        </div>
                    </div>
                    <div class="row">
                    <form action="prosesGaji.php" method="post">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <select class="form-control" name="nip" id="selectauto" onchange="auto()">
                                    <option value="" hidden>PILIH</option>
                                    <?php $karyawan = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan");
                                    foreach($karyawan as $kar){
                                    ?>
                                    <option value="<?= $kar['nip'] ?>"><?= $kar['nip']." - ".$kar['nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input class="form-control" value="<?php echo date('Y-m-d'); ?>" type="date" name="tanggal" id="">
                            </div>
                            <div class="form-group">
                                <label for="gajiPokok">Gaji Pokok</label>
                                <input class="form-control" type="text" readonly value="3500000" name="gajiPokok" id="gajiPokok">
                            </div>
                            <div class="form-group">
                                <label for="gajiHarian">Gaji Harian</label>
                                <input class="form-control" type="number" readonly name="gajiHarian" id="gajiHarian">
                            </div>  
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="bonus">Bonus</label>
                                <input type="number" class="form-control" name="bonus" id="bonus" name="bonus" onkeyup="auto2()" value="0">
                            </div>
                            <div class="form-group">
                                <label for="totalGaji">Total Gaji</label>
                                <input class="form-control" type="number" name="totalGaji" id="totalGaji" name="totalGaji" readonly>
                            </div>
                            <input class="btn btn-default" type="submit" value="Tambah">
                        </div>
                    </form>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
