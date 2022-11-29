<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
include 'koneksi-server.php';

if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
        echo "Login gagal! username dan password salah!";
    }else if($_GET['pesan'] == "logout"){
        echo "Anda telah berhasil logout";
    }else if($_GET['pesan'] == "belum_login"){
        echo "Anda harus login untuk mengakses halaman admin";
    }
}


?>

<form action="cek-login.php" method="post">
    <label for="">username</label> <br>
    <input type="text" name="username" placeholder="Masukkan username"><br>

    <label for="">Password</label> <br>
    <input type="password" name="password" placeholder="masukkan password">
    <button>login</button>
</form>
</body>
</html>