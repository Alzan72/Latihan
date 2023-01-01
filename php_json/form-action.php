<?php
  // connect to the database
  include 'koneksi.php';

  // get the form data
  @$name = $_POST['name'];
  @$alamat =$_POST['alamat'];
  @$jk = $_POST['jk'];
  @$ttl = $_POST['ttl'];

  // insert data into the database
  $insert = "INSERT INTO `data` (`ID`, `Nama`, `Alamat`, `jenis-kelamin`,`ttl`) VALUES (NULL, '$name', '$alamat', '$jk','$ttl');";
 $conn->query($insert);

 echo "<h1>Data telah ditambahkan</h1>";
?>
