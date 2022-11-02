<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <input type="text" name="input">
    <br>
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

  
    
    
    

   

 

</body>
</html>