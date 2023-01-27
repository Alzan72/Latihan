<?php
$user='root';
$host='localhost';
$db='data_barang';
$pass='';

$conn = new mysqli($host, $user, $pass, $db);
if (!$conn) {
    die('koneksi gagal');
}
