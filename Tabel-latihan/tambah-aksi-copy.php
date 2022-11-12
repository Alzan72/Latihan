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
$jumlah_week=count($week);
$jumlah_year=count($year);
$jumlah_date=count($date);
$jumlah_month=count($month);
$jumlah_mon=count($mon);
$jumlah_tue=count($tue);
$jumlah_wed=count($wed);
$jumlah_thur=count($thur);

for ($i=0; $i < $jumlah_week; $i++) { 
    $sql="INSERT INTO `silabus` (`ID`, `Year`, `month`, `date`, `week`, `mon`, `tue`, `wed`, `thur`) VALUES ( NULL, '$year[$i]', '$month[$i]', '$date[$i]', '$week[$i]', '$mon[$i]', '$tue[$i]', '$wed[$i]', '$thur[$i]');";

    $conn->query($sql);
}


header("location:Kolom.php?pesan=input");

?>