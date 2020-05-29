<?php
    session_start();
    include '../config/koneksi.php';
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 'admin') {
            header('location:index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <form action="../config/prosesAdmin.php" method="post">
    <input type="text" name="username" id="" placeholder="username">
    <input type="password" name="password" id="" placeholder="password">
    <input type="submit" value="Login">
    </form>
</body>
</html>
