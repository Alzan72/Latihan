<?php
include 'koneksi.php';


$hapus=$_POST['delete'];
if (isset($hapus)) {
foreach ($hapus as $key => $d) {
$data_split = explode(',', $d);
// echo $key . ': ' . $data_split[0] . ' - ' . $data_split[1] . '<br>';
$id_data=$data_split[0];
$id_cat=$data_split[1];
$image=$data_split[2];
unlink('img/'.$image);

$sql="DELETE FROM list_category WHERE `Id` = $id_cat";
$conn->query($sql);

$sql1="DELETE FROM `data` WHERE id = $id_data ";
$conn->query($sql1);
  };
  header("location:admin.php?pesan=hapus");
}
else {
    header("location:admin.php?pesan=gagal");
}
?>