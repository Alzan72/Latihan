<?php

include 'koneksi.php';

$id= $_GET["id"];

$sql="DELETE FROM `data` WHERE `ID` =$id";

$conn->query($sql);
?>