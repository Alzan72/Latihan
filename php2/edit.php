<?php

include 'koneksi.php';

$id=@$_POST['id'];
$nama=@$_POST['nama'];
$alamat=@$_POST['alamat'];
$jk=@$_POST['jk'];
$jurusan=@$_POST['jurusan'];
$filelama=$_POST['filelama'];

// file
$namafile=@$_FILES['file']['name'];
$ukuranfile=@$_FILES['file']['size'];
$temp=@$_FILES['file']['tmp_name'];
$tipefile=strtolower(pathinfo($namafile,PATHINFO_EXTENSION));
$ekstensi=['png','jpg','jpeg'];
$random=rand();
$namafilesimpan=$random.'-'.$namafile;

if (empty($namafile)) {
    $sql="UPDATE `profil` SET `nama` = '$nama', `jenis-kelamin` = '$jk', `alamat` = '$alamat', `foto` = '$filelama' WHERE `ID` = $id;";

    $conn->query($sql);
    header("location:tampil.php?pesan=ubah");
}
else {
    if (!in_array($tipefile,$ekstensi)) {
        header("location:tampil.php?pesan=ekstensi");
    } else {
        if ($ukuranfile > 2000000) {
            header("location:tampil.php?pesan=ukuran");
        }
        else {
            $direktori='img/';
            unlink($direktori.$filelama);
            move_uploaded_file($temp, $direktori.$namafilesimpan);
            
            $sql="UPDATE `profil` SET `nama` = '$nama', `jenis-kelamin` = '$jk', `alamat` = '$alamat', `foto` = '$namafilesimpan' WHERE `ID` = $id;";
            $conn->query($sql);
            header("location:tampil.php?pesan=ubah");
        }
    }    
}

?>