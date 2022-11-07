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
    <label for="angka">Masukkan angka</label>
    <input type="text" name="angka">
</form>


<?php

//@$_GET['input']
 # tanda @ agar tidak ada peringatan error ketika key-nya kosong
$input=@$_GET['angka'];
echo "input adalah : $input <br>";


for ($x=1;$x<=$input;$x++) { 
        echo str_repeat($x,$x);
        echo "<br>";    
}
    ?>

    
</body>
</html>