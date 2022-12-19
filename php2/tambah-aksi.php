<?php
include 'koneksi.php';

$nama=@$_POST['nama'];
$alamat=@$_POST['alamat'];
$jurusan=@$_POST['jurusan'];

//file
$namafile=@$_FILES['file']['name'];
$ukuranfile=@$_FILES['file']['size'];
$temp=@$_FILES['file']['size'];

$sql="INSERT INTO `profil` (`nama`, `alamat`, `jurusan`, `foto`) VALUES ('$nama', '$alamat', '$jurusan', '$namafile');";

$conn->query($sql);
header("location:index.php?pesan=berhasil");

?>