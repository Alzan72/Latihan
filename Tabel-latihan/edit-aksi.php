<?php

include'koneksi-server.php';

$ID=@$_POST['id'];
$week=@$_POST['week'];
$year=@$_POST['year'];
$date=@$_POST['date'];
$month=@$_POST['month'];
$mon=@$_POST['mon'];
$tue=@$_POST['tue'];
$wed=@$_POST['wed'];
$thur=@$_POST['thur'];

$sql="UPDATE `silabus` SET `Year` = '$year', `month` = '$month', `date` = '$date', `week` = '$week', `mon` = '$mon', `tue` = '$tue', `wed` = '$wed', `thur` = '$thur' WHERE `ID` = $ID;";

$conn->query($sql);

header("location:Kolom.php?pesan=update");
?>