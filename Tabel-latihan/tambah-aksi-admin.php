<?php

include'koneksi-server.php';



$number="1212-";
$ID=@$_POST['id'];
$tanggal=@$_POST['tanggal'];
$penjual=@$_POST['penjual'];
$week=@$_POST['week'];
$year=@$_POST['year'];
$date=@$_POST['date'];
$month=@$_POST['month'];
$mon=@$_POST['mon'];
$tue=@$_POST['tue'];
$thur=@$_POST['thur'];



//file
$namafile=@$_FILES['file']['name'];

$ekstensi=['png','jpg','jpeg'];
$ukuran=@$_FILES['file']['size'];

// tempat penyimpanan sementara
$tmpname=@$_FILES["file"]["tmp_name"];
//cek ekstensi gambar
// $ekstensifileupload=pathinfo($namafile,PATHINFO_EXTENSION);
$ekstensifileupload=explode('.',$namafile);//pisahkan string setelah tanda .
$ekstensifileupload=strtolower(end($ekstensifileupload));//ambil bagian paling akhir setelah dipisah

//angka random
$random=rand();

//jika ekstensi tidak sesuai
if(!in_array($ekstensifileupload,$ekstensi)) {
header("location:tambah-admin.php?pesan=ekstensi");
} else {
    $size=3000000;
    if ($ukuran > 3000000 ) {
        header("location:tambah-admin.php?pesan=ukuran");
    } else {
        $direktori="gambar/";
        $namafilesimpan=$random.'-'.$namafile;
        move_uploaded_file($tmpname,$direktori.$namafilesimpan);
        //jalankan query
        $jumlah_id=count($ID);

        for ($i=0; $i < $jumlah_id; $i++) { 
        $sql="INSERT INTO `silabus` (`ID`,`Tanggal`,`penjual`,`Year`, `month`, `date`, `week`, `mon`, `tue`, `wed`, `thur`) VALUES ( NULL, NOW(),'$penjual[$i]','$year[$i]', '$month[$i]', '$date[$i]', '$week[$i]', '$mon[$i]', '$tue[$i]', '$namafilesimpan', '$thur[$i]');";

        $conn->query($sql);
}

        header ("location:Kolom.php?pesan=input");
    }
}




    // $hak = $_GET['hak'];
    // if($hak == "admin"){
    //     header ("location:Kolom.php?pesan=input");
    // }else if($hak !== "admin"){
    //     header ("location:Kolom-user.php?pesan=input");
    // }

?>