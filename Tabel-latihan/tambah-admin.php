<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
$(document).ready(function(){
  $("#btn2").click(function(){
    $("#form").append("<br> <label for=''>ID=(dari server)</label> "+
    "<input type='hidden' name='id[]'> <br>"+
    "<input type='hidden' name='penjual[]' value='<?php echo $_GET['user']?>'> <br>"+

    "<label for=''>Year</label><br>"+
    "<input type='number' name='year[]' required> "+
    "<span class='error'>* </span><br>"+

    "<label for=''>Week</label><br>"+
    "<input type='number' name='week[]' required> "+
    "<span class='error'>* </span><br>"+

    "<label for=''>month</label><br>"+
    "<input type='text' name='month[]' required> "+
    "<span class='error'>* </span><br>"+

    "<label for=''>date</label><br>"+
    "<input type='number' name='date[]' required> "+
    "<span class='error'>* </span><br>"+

    "<label for=''>mon</label><br>"+
    "<input type='text' name='mon[]' required> "+
    "<span class='error'>* </span><br>"+

    "<label for=''>tue</label><br>"+
    "<input type='text' name='tue[]' required> "+
    "<span class='error'>* </span><br>"+

    "<label for=''>wed</label><br>"+
    "<input type='file' name='file[]' required> "+
    "<span class='error'>* </span><br>"+

    "<label for=''>thur</label><br>"+
    "<input type='radio' name='thur[]' value='female' >Female"+
    "<input type='radio' name='thur[]' value='male' >Male"+
    "<span class='error'>* </span><br>"
    );
  });
});
</script>

</head>
<body>

<button id="btn2">tambah data</button>

<div>

<?php
session_start();
$pesan=@$_GET['pesan'];
if (isset($pesan)) {
  if ($pesan=='ekstensi') {
    echo "<script>alert('file harus .png , .jpg , .jpeg')</script>";
  } elseif ($pesan=='ukuran') {
    echo "<script>alert('Ukuran file maksimal 3MB')</script>";
  }
}
?>

<form action="tambah-aksi-admin.php" method="post" enctype="multipart/form-data">
    
        
        <label for="">ID=(dari server)</label> 
        <input type="hidden" name="id[]"> <br>
        <input type="hidden" name="penjual[]" value="<?php echo @$_POST['tambah']?>"> <br>

        
        <label for="">Year</label><br>
        <input type="number" name="year[]" required> 
        <span class="error">* </span><br>

        <label for="">Week</label><br>
        <input type="number" name="week[]" required>
        <span class="error">* </span> <br>

        <label for="">month</label><br>
        <input type="text" name="month[]" required>
        <span class="error">* </span><br>

        <label for="">date</label><br>
        <input type="number" name="date[]"required > 
        <span class="error">* </span><br>

        <label for="">mon</label><br>
        <input type="text" name="mon[]" > <br>

        <label for="">tue</label><br>
        <input type="text" name="tue[]" > <br>

        <label for="">wed</label><br>
        <input type="file" name="file" > <br>

        <label for="">Thur</label><br>
        <input type="radio" name="thur[]" value="female" >Female
  <input type="radio" name="thur[]" value="male">Male

  <br>
    <div id="form"></div>

       <br> <button>Kirim</button>

    </form>
</div>

 <!-- <label for="">ID=(dari server)</label> 
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
       <br> <button>Kirim</button> -->
</body>
</html>