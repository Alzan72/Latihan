<?php
include 'koneksi.php';

$hapus=$_POST['hapus'];
// $foto=$_POST['file'];

// var_dump($hapus);die;
if (isset($hapus)) {
    // unlink('img/'.$hapus);
    $jumlah_data=count($hapus);
    for ($i=0; $i < $jumlah_data; $i++) { 
        $mysql="SELECT foto FROM profil WHERE ID=$hapus[$i]";
        $hasil=$conn->query($mysql);
        $data=$hasil->fetch_assoc();
        $file=@$data['foto'];
        unlink('img/'.$file);
        
        $sql="DELETE FROM `profil` WHERE `ID` = $hapus[$i]";

        $conn->query($sql);
    }
    header ("location:tampil.php?pesan=hapus");
}else {
    header ("location:tampil.php?pesan=gagal");
}

?>