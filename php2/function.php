<?php
include 'koneksi.php';

//Total data
function totalData($kolom){
    GLOBAL $conn;
    GLOBAl $hasil;
    $sql=" SELECT `$kolom` , COUNT(`$kolom`)as jumlah FROM profil GROUP BY `$kolom` ORDER BY jumlah DESC";
    $hasil=$conn->query($sql);
};

//update data

function insertKelompok(){
    GLOBAL $id,$kelompok,$conn;
    $sql="INSERT INTO penempatan (`id`,`id_profil`,`id_kelompok`) values (NULL, '$id','$kelompok')   ";
    $conn->query($sql);
}

function updateDataJoin () {
    GLOBAL $id,$kelompok,$conn,$nama,$jurusan,$alamat,$filelama;
    
    $sql2="UPDATE profil p
    INNER JOIN penempatan pe ON p.ID = pe.id_profil
    INNER JOIN kelompok k ON pe.id_kelompok = k.ID
    SET p.nama = '$nama', pe.id_kelompok = '$kelompok', p.jurusan=   '$jurusan' , p.alamat = '$alamat', p.foto = '$filelama'
    WHERE pe.id_profil = $id OR p.ID = $id;";
    $conn->query($sql2); 
    header("location:tampil.php?pesan=ubah");
}

function updateDataProfil($file){
    GLOBAL $id,$conn,$nama,$jurusan,$alamat,$filelama,$jk;

    $sql="UPDATE profil SET nama='$nama', jurusan='$jurusan', alamat='$alamat',`jenis-kelamin`='$jk', foto='$file' WHERE ID=$id";
    $conn->query($sql);
    header("location:tampil.php?pesan=ubah");
}
