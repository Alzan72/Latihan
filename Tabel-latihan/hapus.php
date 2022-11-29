<?php
include 'koneksi-server.php';

$list=@$_POST['list'];

if (isset($list)) {

$jumlah_list=count($list);
for ($i=0; $i <$jumlah_list ; $i++) {

        $sql="DELETE FROM `silabus` WHERE `ID` = $list[$i]";
    
        $conn->query($sql);
    }
    
    header("location:Kolom.php?pesan=hapus");
} else {
header("location:Kolom.php?pesan=pilih-data");
}
?>
;