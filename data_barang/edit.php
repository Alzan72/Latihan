
<?php
include 'koneksi.php';
$id=$_POST['id'];
$sql="SELECT data.*,category.ID FROM data JOIN list_category ON data.id=list_category.id_barang JOIN category ON category.id=list_category.id_category WHERE data.id= $id";
$value=$conn->query($sql);
$data=$value->fetch_assoc();
?>

<div class="container">
  <form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
<!-- nama -->
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?= $data['nama'] ?>">
</div>
<!-- harga -->
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Price</label>
  <input name="price" type="number" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?= $data['harga'] ?>">
</div>
<!-- total -->
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Total</label>
  <input name="total" type="number" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?= $data['jumlah'] ?>">
</div>
<!-- kategori -->
<select class="form-select" name="category" aria-label="Default select example">
<option >category</option>
<?php include 'koneksi.php';
$sql2='SELECT * FROM category';
$hasil=$conn->query($sql2);
while($category=$hasil->fetch_assoc()){
?>
  <option value="<?= $category['ID']?>" <?php  if ($category['ID']==$data['ID']) echo 'selected'; ?>><?= $category['category']?></option>
<?php }?>
</select>
<div class="mb-3">
    <label for="">Choose image</label>
    <input type="file" name="image" id=""><br>
    <img class="" src="img/<?= $data['image']?>" width="50px" height="50px" alt="">
    <input type="hidden" value="<?= $data['image']?>" name="old_img">
</div>
<button name="submit" class="btn btn-success">Submit</button>
  </form>
</div>



