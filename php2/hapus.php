<?php
include 'koneksi.php';


$hapus=$_POST['id'];
$d=explode(',', $hapus[0]);
$id_pen=$d[0];
$id_prof=$d[1];

// $foto=$_POST['file'];
// var_dump($hapus);die;
if (isset($hapus)) {
    // unlink('img/'.$hapus);
    $jumlah_data=count($hapus);
    for ($i=0; $i < $jumlah_data; $i++) { 
        var_dump($id_pen[$i]);
echo "<br> ";
var_dump( $id_prof[$i]);die;
        $mysql="SELECT foto FROM profil WHERE ID=$hapus[$i]";
        $hasil=$conn->query($mysql);
        $data=$hasil->fetch_assoc();
        $file=@$data['foto'];
        unlink('img/'.$file);

        $sql="DELETE FROM `profil` WHERE `ID` = $hapus[$i]";
        $sql="DELETE FROM profil JOIN penempatan on penempatan.id_profil=profil.ID JOIN kelompok on kelompok.ID=penempatan.id WHERE `ID` = $hapus[$i]";

        $conn->query($sql);
    }
    header ("location:tampil.php?pesan=hapus");
}else {
    header ("location:tampil.php?pesan=gagal");
}
?>