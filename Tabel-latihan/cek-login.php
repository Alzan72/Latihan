<?php

session_start();

include 'koneksi-server.php';
include 'aes.php';

$username=@$_POST['username'];
$password=md5(@$_POST['password']);
// $key="abcdefghijuklmno0123456789012345";
// $aes=new Aes($key);
// $pass=$aes->encrypt($password);


$sql = "SELECT * FROM `login` WHERE username='$username' and password='$password' ";

$result = $conn->query($sql);

// cek data
$jikaada =$result->num_rows;



if($jikaada > 0) {

    if (isset($_POST['cookie'])) {
        setcookie('status','sudahlogin', time() + 120);
        setcookie('user',$username,time() + 120);
    }

    $data=$result->fetch_assoc();

    if ($data['hak-akses']=='admin'){
    $_SESSION['username']=$username;
    $_SESSION['status']="login";
    header("location:Kolom.php");
    } else if ($data['hak-akses']=='user') {
    $_SESSION['username']=$username;
    $_SESSION['status']="login";
    header("location:Kolom-user.php");
    }

} else {
    header("location:login.php?pesan=gagal");
};

?>