<?php

include 'koneksi.php';

$id=@$_POST['id'];
$sql="SELECT * FROM profil WHERE ID ='$id' ";
$hasil=$conn->query($sql);

$data=$hasil->fetch_assoc();
?>

<form action="edit.php" method="post"  enctype="multipart/form-data">
<div class="container mt-5">

<!-- ID -->

<input type="hidden" name="id" value="<?php echo $data['ID'] ?>">
  
  <!--Nama  -->
<div class="form-floating mb-3">
  <input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control" id="floatingInput" placeholder="Masukkan nama">
  <label for="floatingInput">Nama</label>
</div>

<!-- JK -->
<div><h5>Jenis kelamin</h5></div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="laki-laki" <?php if ($data['jenis-kelamin']=="laki-laki") echo 'checked'  ?>>
  <label class="form-check-label" for="">
    Laki-laki
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2" value="perempuan" <?php if ($data['jenis-kelamin']=="perempuan") echo 'checked'  ?>>
  <label class="form-check-label" for="">
    Perempuan
  </label>
</div>
<br>
<!-- alamat -->
<div class="form-floating">
  <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" class="form-control" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Alamat</label>
</div><br>

<!-- jurusan -->
<select name="jurusan" class="form-select">
  <option >Jurusan</option>
  <option value="tkj" <?php if ($data['jurusan']=="tkj") echo 'selected' ?>>TKJ</option>
  <option value="programer" <?php if ($data['jurusan']=="programer") echo 'selected' ?>>Programer</option>
  <option value="desainer" <?php if ($data['jurusan']=="desainer") echo 'selected' ?>>Desainer</option>
</select>
<br>
<select name="kelompok" class="form-select">
  <option >Kelompok</option>
  <?php 
  $query="SELECT `profil`.*,kelompok.Kelompok FROM profil Left JOIN penempatan on penempatan.id_profil=profil.ID join kelompok on kelompok.ID=penempatan.id_kelompok;";
  $value=$conn->query($query);

  while($kelompok=$value->fetch_assoc()){
  ?>
  <option value="<?php echo $kelompok['kelompok.ID'] ?>" <?php if ($kelompok['kelompok.ID']==$kelompok['penempatan.id_kelompok']) echo 'selected' ?>><?php echo $kelompok['kelompok.Kelompok'] ?></option>
   
</select>
<?php
}
?>
<br>

<!-- foto -->
<div class="mb-3">
  <label for="formFile" class="form-label">Masukkan foto anda
  </label>
  <input class="form-control" type="file" value="<?php echo $data['foto'] ?>" name="file" id="formFile">
  <img src="img/<?php echo $data['foto'] ?>" width=100px height=100px alt="">
  <input type="hidden" value="<?php echo $data['foto'] ?>" name="filelama">
</div>
<button type="submit"  class="btn btn-primary text-end">Ubah</button>
</div>  
</form>  


