<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>percobaan</h1>
    <form action="" method="GET">
        <label for="">Nama</label> <br>
        <input type="text" name="nama">

        <div>
            <label for="">Usia</label> <br>
            <input name="usia" type="number">
        </div>
        <button>Submit</button>
    </form>

    <?php
    include 'aes.php';
   $nama=@$_GET['nama'];
   $usia=@$_GET['usia'];
   $key="abcdefghijuklmno0123456789012345";
$aes=new Aes($key);
$pass=$aes->encrypt($nama);

   if($nama) {
    echo "Selamat datang $pass <br>";
   }
   if($usia) {
    echo "usia anda $usia tahun";
   }
   
   
    ?>
    
</body>
</html>
