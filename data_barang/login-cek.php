<?php
session_start();
include 'koneksi.php';

$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM `login` WHERE username='$username' and password='$password'";

$hasil=$conn->query($sql);
$cek=$hasil->num_rows;

if($cek > 0){
    @$_SESSION['user']=$username;
    @$_SESSION['status']="sukses";
    header("location:admin.php");
}else{
    header('location:login.php?p=fail');
}
