<?php
include 'koneksi-server.php';

$sql = "SELECT * FROM `silabus`";
$result = $conn->query($sql);


  // output data of each row
  while($row = $result->fetch_assoc()) {


header("location:Kolom.php?id=" .$row['ID']. "&pesan=hapus-notif");
  }
?>



<!-- <script>
window.location.href = 'kolom.php';
</script> -->
// include 'koneksi-server.php';


// $ID=@$_GET['id'];

// // DELETE FROM `silabus` WHERE `silabus`.`ID` = 6;

// $sql="DELETE FROM `silabus` WHERE `silabus`.`ID` = $ID;";
// $conn->query($sql);


// header("location:Kolom.php?pesan=hapus");






