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
$wed=@$_POST['wed'];
$thur=@$_POST['thur'];

$jumlah_id=count($ID);

for ($i=0; $i < $jumlah_id; $i++) { 
    $sql="INSERT INTO `silabus` (`ID`,`Tanggal`,`penjual`,`Year`, `month`, `date`, `week`, `mon`, `tue`, `wed`, `thur`) VALUES ( NULL, NOW(),'$penjual[$i]','$year[$i]', '$month[$i]', '$date[$i]', '$week[$i]', '$mon[$i]', '$tue[$i]', '$wed[$i]', '$thur[$i]');";

    $conn->query($sql);
}

header ("location:Kolom.php?pesan=input");

    // $hak = $_GET['hak'];
    // if($hak == "admin"){
    //     header ("location:Kolom.php?pesan=input");
    // }else if($hak !== "admin"){
    //     header ("location:Kolom-user.php?pesan=input");
    // }

?>