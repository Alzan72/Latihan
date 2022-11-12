<?php

include'koneksi-server.php';
$number="1212-";
$ID=@$_POST['id'];
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
    $sql="INSERT INTO `silabus` (`ID`, `Year`, `month`, `date`, `week`, `mon`, `tue`, `wed`, `thur`) VALUES ( NULL, '$year[$i]', '$month[$i]', '$date[$i]', '$week[$i]', '$mon[$i]', '$tue[$i]', '$wed[$i]', '$thur[$i]');";

    $conn->query($sql);
}


header("location:Kolom.php?pesan=input");

?>