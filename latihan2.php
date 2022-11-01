<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php

//@$_GET['input']
 # tanda @ agar tidak ada peringatan error ketika key-nya kosong
$input=@$_GET['input'];


for ($x=1;$x<=$input;$x++) { 
        echo str_repeat($x,$x);
        echo "<br>";    
}
    ?>

    
</body>
</html>