<?php

include'koneksi-server.php';
$Id=@$_POST['id'];
$jumlah_id=count($Id);
for ($i=0; $i < $jumlah_id; $i++) { 
$number="1212-";
$ID=@$_POST['id'][$i];
$tanggal=@$_POST['tanggal'][$i];
$penjual=@$_POST['penjual'][$i];
$week=@$_POST['week'][$i];
$year=@$_POST['year'][$i];
$date=@$_POST['date'][$i];
$month=@$_POST['month'][$i];
$mon=@$_POST['mon'][$i];
$tue=@$_POST['tue'][$i];
$thur=@$_POST['thur'][$i];




//file
$namafile=@$_FILES['file']['name'][$i];


$ekstensi=['png','jpg','jpeg'];
$ukuran=@$_FILES['file']['size'][$i];

// tempat penyimpanan sementara
$tmpname=@$_FILES["file"]["tmp_name"][$i];
//cek ekstensi gambar
// $ekstensifileupload=pathinfo($namafile,PATHINFO_EXTENSION);

$ekstensifileupload=explode('.',$namafile);//pisahkan string setelah tanda .
$ekstensifileupload=strtolower(end($ekstensifileupload));//ambil bagian paling akhir setelah dipisah

//angka random
$random=rand();

if(!in_array($ekstensifileupload,$ekstensi)) {
header("location:tambah-admin.php?pesan=ekstensi");
} else {
    $size=3000000;
    if ($ukuran > $size ) {
        header("location:tambah-admin.php?pesan=ukuran");
    } else {
        
        $direktori="gambar/";
        $namafilesimpan=$random.'-'.$namafile;
        move_uploaded_file($tmpname,$direktori.$namafilesimpan);
        //jalankan query
         $sql="INSERT INTO `silabus` (`ID`,`Tanggal`,`penjual`,`Year`, `month`, `date`, `week`, `mon`, `tue`, `wed`, `thur`) VALUES ( NULL, NOW(),'$penjual','$year', '$month', '$date', '$week', '$mon', '$tue', '$namafilesimpan', '$thur');";

        $conn->query($sql);
        header ("location:Kolom.php?pesan=input");
}

        
    }
 
}





    // $hak = $_GET['hak'];
    // if($hak == "admin"){
    //     header ("location:Kolom.php?pesan=input");
    // }else if($hak !== "admin"){
    //     header ("location:Kolom-user.php?pesan=input");
    // }

?>