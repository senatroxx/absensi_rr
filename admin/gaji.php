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
                            <h1 class="page-header">Daftar Pembayaran Gaji</h1>
                            <a class="btn btn-primary" style="margin-bottom:20px" href="tambahGaji.php">Tambah Pembayaran Gaji</a>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Tanggal</th>
                                    <th>Gaji Pokok</th>
                                    <th>Gaji Harian</th>
                                    <th>Bonus</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </thead>
                                <?php
                                    $i = 1;
                                    $gaji = mysqli_query($koneksi, "SELECT * FROM tbl_gaji");
                                    foreach ($gaji as $ga) {
                                    $gajiPokok = "Rp. " . number_format($ga['gaji_pokok'],0,',','.');
                                    $gajiHarian = "Rp. " . number_format($ga['gaji_harian'],0,',','.');
                                    $bonus = "Rp. " . number_format($ga['bonus'],0,',','.');
                                    $total = "Rp. " . number_format($ga['total'],0,',','.');
                                ?>
                                <tbody>
                                    <td><?=$i++;?></td>
                                    <td><?=$ga['nip']?></td>
                                    <td><?=$ga['tanggal']?></td>
                                    <td><?=$gajiPokok?></td>
                                    <td><?=$gajiHarian?></td>
                                    <td><?=$bonus?></td>
                                    <td><?=$total?></td>
                                    <td><a class="btn btn-warning btn-sm" href="editGaji.php?id=<?=$ga['id']?>">Edit</a> <a class="btn btn-danger btn-sm" href="deleteGaji.php?id=<?=$ga['id']?>">Delete</a></td>
                                </tbody>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
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
