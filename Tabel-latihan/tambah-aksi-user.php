<?php

include'koneksi-server.php';

$number="1212-";
$ID=@$_POST['id'];
$tanggal=@$_POST['tanggal'];
$penjual=@$_POST['penjual'];
$week=@$_POST['week'];
$year=@$_POST['year'];
$date=@$_POST['date'];
$month=@$_POST['month'];
$mon=@$_POST['mon'];
$tue=@$_POST['tue'];
$thur=@$_POST['thur'];


$jumlah_id=count($ID);

for ($i=0; $i < $jumlah_id; $i++) { 

    //file
    $namafile=@$_FILES['file']['name'][$i];
    $ukuranfile=@$_FILES['file']['size'][$i];
    $temp=@$_FILES['file']['tmp_name'][$i];
    $tipefile=strtolower(pathinfo($namafile,PATHINFO_EXTENSION));
    $ekstensi=['png','jpg','jpeg'];
    $random=rand();
    $namafilesimpan=$random.'-'.$namafile;
    
    
    if (!in_array($tipefile,$ekstensi)) {
        header("location:tambah-user.php?pesan=ekstensi");
    } else  {
        if ($ukuranfile > 2000000) {
            header("location:tambah-user.php?pesan=ukuran");
        }
        else {
            $folder='gambar/';
            move_uploaded_file($temp,$folder.$namafilesimpan);

            $sql="INSERT INTO `silabus` (`ID`,`Tanggal`,`penjual`,`Year`, `month`, `date`, `week`, `mon`, `tue`, `wed`, `thur`) VALUES ( NULL, NOW(),'$penjual[$i]','$year[$i]', '$month[$i]', '$date[$i]', '$week[$i]', '$mon[$i]', '$tue[$i]', '$namafilesimpan', '$thur[$i]');";

            $conn->query($sql);

            header ("location:Kolom-user.php?pesan=input");
        }
    }

   
}



    // $hak = $_GET['hak'];
    // if($hak == "admin"){
    //     header ("location:Kolom.php?pesan=input");
    // }else if($hak !== "admin"){
    //     header ("location:Kolom-user.php?pesan=input");
    // }

?>