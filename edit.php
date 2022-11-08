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
$ID=@$_GET['id'];
$week=@$_POST['week'];
$year=@$_POST['year'];
$date=@$_POST['date'];
$month=@$_POST['month'];
$mon=@$_POST[' mon'];
$tue=@$_POST['tue'];
$wed=@$_POST['wed'];
$thur=@$_POST['thur'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `silabus` WHERE ID='$ID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  ?>
   <form action="edit .php" method="get">
 
  <?php
  $data = $result->fetch_assoc();
    ?>
<label for="">ID</label><br>
        <input type="text" name="id" value="<?php echo $data['ID'] ?>"> <br>

        <label for="">Year</label><br>
        <input type="text" name="year" value="<?php echo $data['Year'] ?>"> <br>

        <label for="">Week</label><br>
        <input type="text" name="$week" value="<?php echo $data['week'] ?>"> <br>

        <label for="">month</label><br>
        <input type="text" name="month" value="<?php echo $data['month'] ?>"><br>

        <label for="">date</label><br>
        <input type="text" name="date" value="<?php echo $data['date'] ?>"> <br>

        <label for="">mon</label><br>
        <input type="text" name="mon" value="<?php echo $data['mon'] ?>"> <br>

        <label for="">tue</label><br>
        <input type="text" name="tue" value="<?php echo $data['tue'] ?>"> <br>

        <label for="">wed</label><br>
        <input type="text" name="wed" value="<?php echo $data['wed'] ?>"> <br>

        <label for="">Thur</label><br>
        <input type="text" name="thur" value="<?php echo $data['thur'] ?>">
       <br> <button>Kirim</button>
    </form>


   <?php
} else {
  echo "0 results";
}
$conn->close();

?>