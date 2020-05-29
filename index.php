<?php
    session_start();
    include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    * {
        box-sizing: inherit;
    }

    a{
        text-decoration:none;
    }

    html {
        box-sizing: border-box;
        height: 100%;
    }

    body {
        background: #eaeaea;
        color: #000;
        font-family: 'Varela Round', sans-serif;
        line-height: 1.5;
        margin: 0;
        min-height: 100%;
    }

    input {
        background-image: none;
        border: none;
        font: inherit;
        margin: 0;
        padding: 0;
        -webkit-transition: all .3s;
        transition: all .3s;
    }

    /* ---------- ALIGN ---------- */
    .align {
        -webkit-box-align: center;
        align-items: center;
        display: -webkit-box;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        flex-direction: column;
        -webkit-box-pack: center;
        justify-content: center;
    }

    /* ---------- GRID ---------- */
    .grid {
        margin-left: auto;
        margin-right: auto;
        max-width: 90%;
        width: 400px;
    }

    /* ---------- LOGIN ---------- */
    #login h2 {
        background: #f95252;
        border-radius: 20px 20px 0 0;
        color: #fff;
        margin: 0;
        font-size: 28px;
        padding: 20px 26px;
    }

    #login h2 span[class*="fontawesome-"] {
        margin-right: 14px;
    }

    #login fieldset {
        background: #fff;
        border-radius: 0 0 20px 20px;
        padding: 0px 26px 20px 26px;
        border: none;
    }

    #login fieldset p {
        color: #777;
        margin-bottom: 14px;
    }

    #login fieldset p:last-child {
        margin-bottom: 0;
    }

    #login fieldset input {
        border-radius: 3px;
    }

    #login fieldset input[type="number"], #login fieldset input[type="password"] {
        background: #eee;
        color: #777;
        padding: 4px 10px;
        width: 100%;
    }

    #login fieldset input[type="submit"] {
        background: #33cc77;
        color: #fff;
        display: block;
        margin: 0 auto;
        padding: 4px 0;
        width: 100px;
        cursor:pointer;
    }

    #login fieldset input[type="submit"]:hover {
        background: #28ad63;
    }

    </style>
</head>
<body>
    <body class="align">
        <div class="grid">
            <div id="login">
                <h2><span class="fontawesome-lock"></span>Sign In</h2>
                <form action="config/prosesKaryawan.php" method="POST">
                <fieldset>

                    <p><label for="number">NIP</label></p>
                    <input type="number" id="number" placeholder="234561343" name="nip">

                    <p><label for="password">Password</label></p>
                    <input type="password" id="password" placeholder="password" name="password">

                    <p>Anda admin? <a href="admin">Login disini.</a></p>

                    <p><input type="submit" value="Sign In"></p>

                </fieldset>
                </form>
            </div>
        </div>
    </body>
</body>
</html>