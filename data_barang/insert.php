<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- BS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<?php
session_start();
if (@$_SESSION['status']!="sukses") {
  header('location:login.php?p=login');
}
$title='insert';
include 'navbar.php';
?>
 
<div class="container">
  <form action="" method="post" enctype="multipart/form-data">
<!-- nama -->
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Item">
</div>
<!-- harga -->
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Price</label>
  <input name="price" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Input Price">
</div>
<!-- total -->
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Total</label>
  <input name="total" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Input Total">
</div>
<!-- kategori -->
<select class="form-select" name="category" aria-label="Default select example">
<option selected>Category</option>
<?php include 'koneksi.php';
$sql='SELECT * FROM category';
$hasil=$conn->query($sql);
while($data=$hasil->fetch_assoc()){
?>
  <option value="<?= $data['ID']?>" > <?= $data['category']?> </option>
<?php }?>
</select>
<div class="mb-3">
  <label for="formFile" class="form-label">Input File</label>
  <input class="form-control" type="file" name="image" id="formFile">
</div>

<button name="submit" class="btn btn-primary" id="submit">Submit</button>
  </form>
  </div>
<?php

include 'function.php';

if (isset($_POST['submit'])) {
  insert(@$_POST['name'],@$_POST['price'],@$_POST['total'],@$_FILES['image']['name'],$_FILES['image']['tmp_name'],@$_POST['category']);
  header('location:admin.php?p=succes');
}

?>


  </body>
</html>