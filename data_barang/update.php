<?php
include 'koneksi.php';
include 'function.php';
$tmp=$_FILES['image']['tmp_name'];
$file=$_FILES['image']['name'];
// var_dump($file);die;

    if (empty($file)) {
        updateDataJoin($_POST['id'],$_POST['name'],$_POST['price'],$_POST['total'],$_POST['category'], $_POST['old_img']);
        header('location:admin.php');
    }else {
        unlink('img/'.$_POST['old_img']);
        move_uploaded_file( $tmp, 'img/'.$file);
        updateDataJoin($_POST['id'],$_POST['name'],$_POST['price'],$_POST['total'],$_POST['category'], $file);
        header('location:admin.php');
    }

?>