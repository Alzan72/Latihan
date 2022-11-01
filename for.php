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
$input=@$_POST['input'];
$jumlah=@$_POST['jumlah'];
?>

    <form action="" method="POST">
    <input type="text" name="input">
    <br>
    <input type="number"name="jumlah"><br>
   

    <button ><a target="_blank" href="https://web.whatsapp.com/send/?phone=%25+6283153564301&text=Halo sca, saya ingin memesan <?php echo $input; ?> dengan jumlah <?php  echo $jumlah; ?> , apakah tersedia">pesan  </a></button>
    <br>    
    </form>
    

   

 

</body>
</html>