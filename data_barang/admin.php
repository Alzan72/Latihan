<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">

    </script>
    
  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    
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

if (isset($_GET['p'])) {
  if($_GET['p']=='succes'){
    echo'<script>alert("Succes add your data")</script>';
  }
}
$title='admin';
include_once 'navbar.php';
?>

<div class="container">
  <center><h3>Welcome,<?=@$_SESSION['user']?></h3></center>
    <div class="row">
        <div class="col">
        <form action="delete.php" method="post">
            <table class="table" id="table" >
                <thead>
                    <th>#</th>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>kategori</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>
                
<?php
include 'koneksi.php';
$sql='SELECT data.*,category.category, list_category.Id FROM data JOIN list_category ON data.id=list_category.id_barang JOIN category ON category.id=list_category.id_category;';
$value=$conn->query($sql);
$no=1;
while ($data=$value->fetch_assoc()) {
?>
<tr>
    <td><input type="checkbox" name="delete[]"  value="<?= $data['id'].','.$data['Id'].','. $data['image']?>" ></td>
    <td><?= $no?></td>
    <td><?= $data['nama']?></td>
    <td><?= $data['harga']?></td>
    <td><?= $data['jumlah']?></td>
    <td><?= $data['category']?></td>
    <td><img src="img/<?= $data['image']?>" width="50px" height="50px" alt=""></td>
    <td><button type="button" id="edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $data['id']?>"> Edit</button></td>
</tr>
<?php
$no++;
}
?>
<button class="btn btn-danger" onclick="confirm('Are you sure to delete this data?')"  id="delete">Delete</button>

</tbody>
</table>
</form>
        </div>
    </div>
</div>


<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>

let btn=document.getElementById('submit');
let chk=document.getElementsByClassName('chk');


    // const edit = document.getElementById('edit')
    $(document).ready(function(){
        const myModal = document.getElementById('exampleModal')
        myModal.addEventListener('shown.bs.modal', (ev) => {
        //     var id=ev.getAttribute('data-id')
        //    console.log(id);
        const button = ev.relatedTarget
        const id = button.getAttribute('data-id');
            $.post('edit.php',{id},function(val){
                $('.modal-body').html(val)
                console.log()
            })
})
$("input[name='delete']").click(function() {
    var checkboxes = $("input[name='delete']");
    var checkboxesChecked = checkboxes.filter(':checked');
    if (checkboxesChecked.length > 0) {
      $('#delete').show();
    } else {
      $('#delete').hide();
    }
  });

  $('#table').DataTable();

  })

   


</script>
</body>
</html>