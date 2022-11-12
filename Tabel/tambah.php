<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div>
    <form action="tambah-aksi.php" method="post">
    <label for="">ID=(dari server)</label> 
        <input type="hidden" name="id"> <br>

        <label for="">Year</label><br>
        <input type="number" name="year"> <br>

        <label for="">Week</label><br>
        <input type="number" name="$week" > <br>

        <label for="">month</label><br>
        <input type="text" name="month" ><br>

        <label for="">date</label><br>
        <input type="number" name="date" > <br>

        <label for="">mon</label><br>
        <input type="text" name="mon" > <br>

        <label for="">tue</label><br>
        <input type="text" name="tue" > <br>

        <label for="">wed</label><br>
        <input type="text" name="wed" > <br>

        <label for="">Thur</label><br>
        <input type="text" name="thur">
       <br> <button>Kirim</button>
    </form>
</div>


</body>
</html>