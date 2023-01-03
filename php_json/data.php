<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <!-- jQuery library -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<table class="table table-bordered">
<thead>
    <tr>
        <td>NO</td>
        <td>ID</td>
        <td>Nama</td>
        <td>Tanggal lahir</td>
        <td>Jenis kelamin</td>
        <td>Alamat</td>
        <td>Aksi</td>
    </tr>
</thead>
<?php
include 'koneksi.php';
$sql="SELECT * FROM `data` ";
$hasil=$conn->query($sql);
$no=1;
while ($data =$hasil->fetch_assoc()) { 
?>

<tbody>
    <tr>
        <td><?php echo $no?></td>
        <td><?php echo $data['ID']?></td>
        <td><?php echo $data['Nama']?></td>
        <td><?php echo $data['ttl']?></td>  
        <td><?php echo $data['jenis-kelamin']?></td>
        <td><?php echo $data['Alamat']?></td>
        <td><button class='btn btn-danger delete' data-id="<?php echo $data['ID']?>">Delete</button></td>
    </tr>
    <?php
    $no++;
    ?>
</tbody>


<?php
};
?>

</table>

<script>


$(".delete").click(function() {
    // get the id of the row to be deleted
    var id = $(this).data("id");
    // send a DELETE request to the server
    $.ajax({
      type: "GET",
      url: "delete.php?id="+id,
      success: function(response) {
        // remove the row from the table
        // console.log(response);
        // $(this).closest("tr").remove();
      }
    });
    getData();
  });

//   function getData() {
//         $.get("data.php", function(hasil) {
//     // display the data from the database
//     $("#data-show").html(hasil);
//   });
//       };
//   var hapus = document.getElementsByClassName("delete");

// for (let i = 0; i < hapus.length; i++) {
//  hapus[i].addEventListener("click", getData) ;
}
  // display the data from the database
  



</script>


</body>
</html>