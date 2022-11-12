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

$sql="INSERT INTO `silabus` (`ID`, `Year`, `month`, `date`, `week`, `mon`, `tue`, `wed`, `thur`) VALUES ( NULL, '$year', '$month', '$date', '$week', '$mon', '$tue', '$wed', '$thur');";
$conn->query($sql);
header("location:Kolom.php?pesan=input");

?>