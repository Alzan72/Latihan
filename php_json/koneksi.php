<?php
$host='localhost';
$user='root';
$pass='';
$dbname='php-jquery';

$conn= new mysqli($host,$user,$pass,$dbname);

if (!$conn) {
    die('koneksi gagal');
}

?>