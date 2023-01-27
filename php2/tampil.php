<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- css lokal -->
    <link rel="stylesheet" href="style.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  


    
</head>
<body>

<section>
<div>
          <div class="sidebar p-4 bg-primary" id="sidebar">
            <h4 class="mb-5 text-white">SuperVideo</h4>
            <li>
              <a class="text-white" href="#">
                <i class="bi bi-house mr-2"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a class="text-white" href="#">
                <i class="bi bi-fire mr-2"></i>
                Populer
              </a>
            </li>
            <li>
              <a class="text-white" href="#">
                <i class="bi bi-newspaper mr-2"></i>
                News
              </a>
            </li>
            <li>
              <a class="text-white" href="#">
                <i class="bi bi-bicycle mr-2"></i>
                Sports
              </a>
            </li>
            <li>
              <a class="text-white" href="#">
                <i class="bi bi-boombox mr-2"></i>
                Music
              </a>
            </li>
            <li>
              <a class="text-white" href="#">
                <i class="bi bi-film mr-2"></i>
                Film
              </a>
            </li>
            <li>
              <a class="text-white" href="#">
                <i class="bi bi-bookmark mr-2"></i>
                Bookmark
              </a>
            </li>
          </div>
        </div>
</section>

<div class="container" id="main-content">
<button class="btn btn-primary" id="button-toggle">
            <i class="bi bi-list"></i>
            Menu
          </button>
  <?php
  $menu='Data';
  // include 'navbar.php';
  ?>
 
    <div class="row">
        <div class="col">
        <form action="hapus.php" method="post">
        <table class="table data" id="">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Pilih</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis-kelamin</th>
      <th scope="col">Prov,kota,kec</th>
      <th scope="col">Alamat</th>
      <th scope="col">Kelompok</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <form action="hapus.php" method="post">
  <tbody>
  <?php

  session_start();

  // if (@$_SESSION['status']!="sukses") {
  //   header("location:login.php?pesan=belum");
  // }else {
  //   echo"";
  // }
    if (isset($_COOKIE['login'])) {
      if ($_COOKIE['login']=='berhasil') {
          $_SESSION['status']='sukses';
          $_SESSION['user']=$_COOKIE['user'];
      };
    };


  if(@$_SESSION['status']!="sukses" ){
    header("location:login.php?pesan=belum");
  } 

if (isset($_GET['pesan'])) {
  if ($_GET['pesan']=='hapus') {
    echo "<script>alert('Data berhasil dihapus')</script>";
}elseif ($_GET['pesan']=='gagal') {
  echo "<script>alert('Pilih data yang ingin dihapus')</script>";
} elseif ($_GET['pesan']=='ubah') {
  echo "<script>alert('Data berhasil diubah')</script>";
} 
elseif ($_GET['pesan']=='ukuran') {
  echo "<script>alert('Ukuran file maksimal 2MB')</script>";
} 
elseif ($_GET['pesan']=='ekstensi') {
  echo "<script>alert('File harus .jpg  .png  .jpeg')</script>";
} 
// elseif ($_GET['pesan']=='belum') {
//   echo "<script>alert('Login dahulu')</script>";
// } 
}

  include 'koneksi.php';
  $cari=@$_GET['cari'];
  $car=@$_GET['car'];
  if (isset($cari)) {
    $sql="SELECT `profil`.*,kelompok.Kelompok, penempatan.id FROM profil Left JOIN penempatan on penempatan.id_profil=profil.ID LEFT join kelompok on kelompok.ID=penempatan.id_kelompok WHERE Nama LIKE'%$cari%' OR Alamat LIKE'%$cari%' OR Kelompok LIKE'%$cari%' OR Jurusan LIKE'%$cari%'  ";
  } else {
    $sql=" SELECT `profil`.*,kelompok.Kelompok, penempatan.id FROM profil Left JOIN penempatan on penempatan.id_profil=profil.ID LEFT join kelompok on kelompok.ID=penempatan.id_kelompok;";
  }

  

  $hasil=$conn->query($sql);
  $no=1;

  echo '';
 while ($data=$hasil->fetch_assoc()) {

 ?>
  
    <tr>
      <th scope="row"><?php echo $no ?></th>
      <td><input type="checkbox" name="id[]"value="<?php echo $data['id'] ?>, <?php echo $data['ID'] ?>">
      <td><?php echo $data['nama'];?></td>
      <td><?php echo $data['jenis-kelamin'];?></td>
      <td>
        Provinsi: <?php echo $data['provinsi'];?><br>
        Kota: <?php echo $data['kota'];?><br>
        Kecamatan: <?php echo $data['kecamatan'];?>
    </td>
      <td><?php echo $data['alamat'];?></td>
      <td><?php echo $data['Kelompok'] ?></td>
      <td><?php echo $data['jurusan'];?></td>
      <td><?php echo "<img src='img/".$data['foto']."' width=60px height=60px alt=''>"?></td>
      <input type="hidden" name="file" value="<?php echo $data['foto'] ?>">
    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="<?php echo $data['ID']?>">Ubah</button>

  
</td>
    
      <?php
      $no++;  
      ?>
    </tr>
    
  
  <?php
  }
  ?>
  </tbody>
</table>
<button class="btn btn-danger text-end" onclick="confirm('Apakah anda yakin ingin menghapus')" >X Hapus </button>
    </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- FORM -->
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-aksi="ubah">Ubah</button> -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>



<script>
    $(document).ready( function () {
      $('.data').DataTable();
  } );
</script>
<script src="script.js"></script>
</body>





</html>

<?php
// List script

// SELECT `profil`.* ,penempatan.id,kelompok.Kelompok FROM profil JOIN penempatan on penempatan.id_profil=profil.ID JOIN kelompok on kelompok.ID=penempatan.id_kelompok;

//SELECT `profil`.*,kelompok.Kelompok FROM profil Left JOIN penempatan on penempatan.id_profil=profil.ID join kelompok on kelompok.ID=penempatan.id_kelompok;

?>


<!--  <div class="row text-end">
    <div class="col"><a href="logout.php" class="btn btn-warning text-end"><<-- Log out</a></div>
    <div class="col">
      <form action="" method="get">
       
      <input class="" type="text" name="cari" placeholder="Cari kata...">
      <button name="car">Search</button>
    </form></div>
