<?php
include 'koneksi-server.php';

$ID=@$_GET['id'];

// DELETE FROM `silabus` WHERE `silabus`.`ID` = 6;

$sql="DELETE FROM `silabus` WHERE `silabus`.`ID` = $ID;";
$conn->query($sql);

header("location:Kolom.php?pesan=hapus");
?>
