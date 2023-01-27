<?php
include 'koneksi.php';

$nama=@$_POST['nama'];
$alamat=@$_POST['alamat'];
$jk=@$_POST['jk'];
$jurusan=@$_POST['jurusan'];
$provinsi=@$_POST['provinsi'];
$kota=@$_POST['kota'];
$kecamatan=@$_POST['kecamatan'];

//file
$namafile=@$_FILES['file']['name'];
$ukuranfile=@$_FILES['file']['size'];
$temp=@$_FILES['file']['tmp_name'];
$tipefile=strtolower(pathinfo($namafile,PATHINFO_EXTENSION));
$ekstensi=['png','jpg','jpeg'];
$random=rand();
$namafilesimpan=$random.'-'.$namafile;
$direktori='img/';
// var_dump($nama);
// var_dump($namafile);die;

if ($ukuranfile > 2000000) {
    header("location:index.php?pesan=ukuran");
} else {
    if (!in_array($tipefile,$ekstensi)) {
        header("location:index.php?pesan=ekstensi");
    }else {
        move_uploaded_file($temp, $direktori.$namafilesimpan);
        $sql="INSERT INTO `profil` (`nama`, `jenis-kelamin`,`provinsi`,`kota`,`kecamatan`,`alamat`, `jurusan`, `foto`) VALUES ('$nama', '$jk','$provinsi','$kota','$kecamatan','$alamat', '$jurusan', '$namafilesimpan');";

$conn->query($sql);
header("location:index.php?pesan=berhasil");
    }
}



