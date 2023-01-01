<?php


include 'koneksi-server.php';

$sql="SELECT * FROM `silabus`";

$hasil=$conn->query($sql);
$array=array();

while ($a=$hasil->fetch_assoc()) $array[]=$a;   {
    # code...
}

echo json_encode($array);

?>