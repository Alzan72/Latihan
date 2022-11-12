<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label for="input">Nama</label>
    <input type="text" name="input">
    <br>
    <label for="jumlah">Jumlah</label>
    <input type="number"name="jumlah"><br>
    <button>submit</button>
    <br>    
    </form>

    <?php
$input=@$_REQUEST['input'];
$jumlah=@$_REQUEST['jumlah'];

if ($input) {
     echo "selamat datang $input <br>";

}
if ($jumlah) {
    echo "anda membeli dengan jumlah $jumlah <br>"; 
}
?>



    <a href="">reset</a>

    <script>
        let notice="data tersimpan silahkan";
    </script>

<!-- $notif= "<script>confirm('apakah data ingin dihapus')";
      if ($notif) {
        include 'koneksi-server.php';
        $ID=@$_GET['id'];
        
        // DELETE FROM `silabus` WHERE `silabus`.`ID` = 6;
        
        $sql="DELETE FROM `silabus` WHERE `ID` = $ID";
        
        $conn->query($sql);
   -->
    
    
    

   

 

</body>
</html>