<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css&js bs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>

<?php
session_start();
$menu='Daftar';
// include 'navbar.php';

if ($_SESSION['status']!="sukses") {
  header("location:login.php?pesan=belum");
}
if (isset($_GET['pesan'])) {
  # code...
if ($_GET['pesan']=='berhasil') {
    echo "<script>alert('Data berhasil masuk')</script>";
}elseif ($_GET['pesan']=='ukuran') {
  echo "<script>alert('Ukuran file maksimal 2MB')</script>";
} elseif ($_GET['pesan']=='ekstensi') {
  echo "<script>alert('Ekstensi harus .jpg  .png  .jpeg')</script>";
} 
}
?>
<!-- Form -->
<div class="row text-end">
    <div class="col"><a href="logout.php" class="btn btn-warning text-end"><-- Log out</a></div>
  </div>
<form action="tambah-aksi.php" method="post" id="form" class="needs-validation" novalidate  enctype="multipart/form-data">
<div class="container mt-5">
  <!-- nama -->
<div class="form-floating mb-3">
  <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Masukkan nama" required>
  <label for="floatingInput">Nama</label>
</div>
<div><h5>Jenis kelamin</h5></div>
<!-- JK -->
<div class="form-check">
  <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="laki-laki" required>
  <label class="form-check-label" for="">
    Laki-laki
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2" value="perempuan" required>
  <label class="form-check-label" for="">
    Perempuan
  </label>
</div>
<br>

<!-- Provinsi -->
<select name="provinsi" id="provinsi" class="form-select">
<option value="">Pilih provinsi</option>
  </select> <br>
<select name="kota" id="kota" class="form-select">
    <option value="">Pilih Kota</option>
  </select> <br>
<select name="kecamatan" id="kecamatan" class="form-select">
    <option value="">Pilih Kecamatan</option>
  </select> <br>

<!-- alamat -->
<div class="form-floating">
  <input type="text" name="alamat" class="form-control" id="floatingPassword" placeholder="Alamat" required>
  <label for="floatingPassword">Alamat</label>
</div><br>
<!-- Jurusan -->
<select name="jurusan" id="jurusan" class="form-select" required>
  <option >Jurusan</option>
  <option value="tkj">TKJ</option>
  <option value="programer">Programer</option>
  <option value="desainer">Desainer</option>
</select>
<br>
<label for="alasan" id="label-alasan" style="display:none;">Alasan memilih jurusan TKJ:</label><br>
  <input type="text" id="alasan" name="alasan" style="display:none;"><br>
<!-- foto -->
<div class="mb-3">
  <label for="formFile" class="form-label">Masukkan foto anda
  </label>
  <input class="form-control" type="file" name="file" id="formFile" required>
</div>
<button  class="btn btn-primary">Tambah</button>
</div>  
</form>  

<div id="tes"></div>
<script >
  // Fungsi untuk menampilkan input alasan jika opsi TKJ dipilih
  function showAlasan() {
    var jurusan = document.getElementById("jurusan").value;
    if (jurusan == "tkj") {
      document.getElementById("label-alasan").style.display = "block";
      document.getElementById("alasan").style.display = "block";
    } else {
      document.getElementById("label-alasan").style.display = "none";
      document.getElementById("alasan").style.display = "none";
    }
  }
  // Memanggil fungsi showAlasan saat opsi jurusan dipilih
  document.getElementById("jurusan").addEventListener("change", showAlasan);


  // provinsi

    // Mendapatkan data provinsi
    $.getJSON('http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', provinsi => {

// Menambahkan option ke dalam elemen select provinsi
provinsi.forEach(item => {
  $('#provinsi').append(`
    <option value="${item.name}" data-prov="${item.id}">${item.name}</option>
  `);
});

// Menangani event change pada elemen select provinsi
$('#provinsi').change(function() {
  // Mendapatkan nilai yang dipilih
  const id_prov = $(this).find(':selected').data('prov');
  // const op_prov=$(this).find(`option[value="${id_prov}"]`);
  // const provinsi=op_prov.attr('data-prov');
  console.log(id_prov);
  

  // Menampilkan elemen select kota sesuai dengan pilihan
  if (id_prov) {
    // Membuat request AJAX menggunakan jQuery
    $.get(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id_prov}.json`, function(data) {
      // Menghapus semua option yang ada di elemen select kota
      $('#kota').html('<option value="">Pilih Kota</option>');

      // Menambahkan option ke dalam elemen select kota
      data.forEach(item => {
        $('#kota').append(`
          <option value="${item.name}" data-kota="${item.id}">${item.name}</option>
        `);
      });

      //kecamatan
      $('#kota').change(function () {
        const id_kota = $(this).find(':selected').data('kota');
  //       const op_kota=$(this).find(`option[value="${id_kota}"]`);
  // const kota =op_kota.attr('data-kota');
  console.log(id_kota);
 

        if(id_kota){
          $.get(`https://alzan72.github.io/api-wilayah-indonesia/api/districts/${id_kota}.json`,function (city) {
            $('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
            city.forEach(isi => {
              $('#kecamatan').append(`
              <option value="${isi.name}" data-kecamatan="${isi.id}">${isi.name}</option>
              `)
            })
            $('#kecamatan').change(function (ev) {
              ev.preventDefault();
              const id_kec = $(this).find(':selected').data('kecamatan');
              // const op_kec=$(this).find(`option[value="${id_kec}"]`);
              // const kec=op_kec.attr('data-kecamatan');
              console.log(id_kec)
            
            })
          });
        }
        else {
          $('#kecamatan').html('');
        }

      })

    });
  } else {
    // Menyembunyikan elemen select kota
    $('#kota').html('');
  }
});
});
</script>

<script>
     // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</body>
</html>