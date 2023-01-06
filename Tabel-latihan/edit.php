<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    

</body>
</html>


<?php
include 'koneksi-server.php';


$ID=@$_GET['id'];
$sql = "SELECT * FROM silabus WHERE ID='$ID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  ?>
   <form action="edit-aksi.php" method="post">
 
  <?php
  $data = $result->fetch_assoc();

  $yearErr = $dateErr = $weekErr = "";
  $year= $date = $week = "";

    ?>


<label for="">ID</label> <?php echo "=". $data['ID'] ?>
        <input type="hidden" name="id" value="<?php echo $data['ID'] ?>">
         <br>

        <label for="">Year</label><br>
        <input type="text" name="year" value="<?php echo $data['Year'] ?>"required>
        <span class="error">* </span> <br>

        <label for="">Week</label><br>
        <input type="number" name="week" value="<?php echo $data['week'] ?>"required>
        <span class="error">* </span> <br>

        <label for="">month</label><br>
        <input type="text" name="month" value="<?php echo $data['month'] ?>"><br>

        <label for="">date</label><br>
        <input type="number" name="date" value="<?php echo $data['date'] ?>"required>
        <span class="error">* </span> <br>

        <label for="">mon</label><br>
        <input type="text" name="mon" value="<?php echo $data['mon'] ?>"> <br>

        <label for="">tue</label><br>
        <input type="text" name="tue" value="<?php echo $data['tue'] ?>"> <br>

        <label for="">wed</label><br>
        <img src="gambar/<?php echo $data['wed'] ?>" width=60px height=60px><br>
        
        <input type="file" name="wed" value="<?php echo $data['wed'] ?>"> <br>

        <label for="">Thur</label><br>
        <input type="radio" name="thur" value="female" <?php if($data['thur']=='female') echo 'checked'?>>Female
  <input type="radio" name="thur" value="male"<?php if($data['thur']=='male') echo 'checked'?>>Male
  
  <br><br>
       <br> <button>Simpan Perubahan</button>
    </form>


   <?php
} else {
  echo "0 results";
}
$conn->close();

?>

