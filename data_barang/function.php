
<?php
include 'koneksi.php';


function insert ($nama,$price,$total,$imagename,$imagetmp,$category,)
{
GLOBAL $conn;

move_uploaded_file($imagetmp,'img/'.$imagename);
$sql="INSERT INTO `data` (`id`,`nama`,`harga`,`jumlah`,`image`) VALUES (NULL,'$nama','$price','$total','$imagename')";
$conn->query($sql);
// ambil id data baru
$id=$conn->insert_id;
$sql2="INSERT INTO `list_category` (`id`,id_barang,`id_category`) VALUES (NULL,$id,'$category')";
$conn->query($sql2);
}



// update

function updateDataJoin ($id,$name,$price,$total,$category,$image) {
    GLOBAL $conn;
    $sql2="UPDATE `data` d
    JOIN `list_category` list ON d.id = list.id_barang
    SET d.nama = '$name', list.id_category = '$category', d.jumlah='$total' , d.harga = '$price', d.image = '$image'
    WHERE list.id_barang = $id OR d.id = $id;";
    $conn->query($sql2); 
    header("location:admin.php?pesan=ubah");
}