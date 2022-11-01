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
    <form action="latihan-form1.php" method="POST">
        <label for="">Nama</label> <br>
        <input type="text" name="nama">

        <div>
            <label for="">Usia</label> <br>
            <input name="usia" type="number">
        </div>
        <button>Submit</button>
    </form>

    <?php
   $nama=@$_POST['nama'];
   $usia=@$_POST['usia'];

   if($nama) {
    echo "Selamat datang $nama <br>";
   }
   if($usia) {
    echo "usia anda $usia tahun";
   }
   
   
    ?>
    
</body>
</html>
