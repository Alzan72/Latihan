// --------------------------JS index-ajax.php----------------------------//

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
    function showdata() {
      $.get('tampil.php',function(hasil){
        $('#kolom').html(hasil);
      }
      ) }
      $(document).ready(showdata()); 

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
              console.log(id_kec);

              $("#form").submit(function(ev){
    ev.preventDefault();

    // Membuat FormData
    var formData = new FormData();

    // Menambahkan file yang akan dikirim
    formData.append('file', $('#formFile')[0].files[0]);

    // Menambahkan data dari form yang di-serialize
    var data = $('#form').serializeArray();
    console.log(data);
    $.each(data, function (key, input) {
        formData.append(input.name, input.value);
    });

    // Mengirim data dengan AJAX
    $.ajax({
        url: 'tambah-aksi.php',
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(response) {
            alert('Data berhasil masuk');
            showdata();
        }
    });
});
 
            
            })
          });
        }
        else {
          $('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
        }

      })

    });
  } else {
    // Menyembunyikan elemen select kota
    $('#kota').html('<option value="">Pilih Kota</option>');
  }
});
});
