

//--------------------------- Modal----------------------------//

$(document).ready(function() {
    // alert('Hallo');

    const modal = document.getElementById('exampleModal')
    modal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const id = button.getAttribute('data-bs-id');
        // const ubah = button.getAttribute('data-bs-aksi');
        $.post('getdata-copy.php', {id}, function () {

        }).done(function (x) {
            // alert:("done")
            $('.modal-body').html(x);
        })
        .fail(function(){
            alert:("error");
        })
        .always(function() {

        });
    });
});

//------------------------------ Sidebar ----------------------------------//

 // event will be executed when the toggle-button is clicked
 document.getElementById("button-toggle").addEventListener("click", () => {

    // when the button-toggle is clicked, it will add/remove the active-sidebar class
    document.getElementById("sidebar").classList.toggle("active-sidebar");
    
    // when the button-toggle is clicked, it will add/remove the active-main-content class
    document.getElementById("main-content").classList.toggle("active-main-content");
    });




//------------------------------- JS Index.php --------------------------------//

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
  // document.getElementById("jurusan").addEventListener("change", showAlasan);


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
      $('#kota').html('');

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
            $('#kecamatan').html('');
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

