
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css&js bs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
</head>
<body>

<?php

if ($_GET['pesan']='berhasil') {
    echo "<script>alert('Data berhasil masuk')</script>";
}
?>

<!-- Form -->
<form action="tambah-aksi.php" method="post"  enctype="multipart/form-data">
<div class="container mt-5">
<div class="form-floating mb-3">
  <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Masukkan nama">
  <label for="floatingInput">Nama</label>
</div>
<div class="form-floating">
  <input type="text" name="alamat" class="form-control" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Alamat</label>
</div><br>
<select name="jurusan" class="form-select">
  <option selected>Jurusan</option>
  <option value="tkj">TKJ</option>
  <option value="programer">Programer</option>
  <option value="desainer">Desainer</option>
</select>
<br>
<div class="mb-3">
  <label for="formFile" class="form-label">Masukkan foto anda
  </label>
  <input class="form-control" type="file" name="file" id="formFile">
</div>
<button  class="btn btn-primary">Tambah</button>
</div>  
</form>  


</body>
</html>