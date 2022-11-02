<html>
    <head>
        <style>
            .target {
                color:red;
            }
        </style>
    </head>
<body>
<h1>percobaan</h1>
    <form action="" method="POST">
        <label>kalimat</label> <br>
        <textarea name="kalimat" id="" cols="30" rows="10"></textarea>

        <div>
            <label >cari</label> <br>
            <input name="target" type="text">
        </div>
        <div>
            <label >ganti</label> <br>
            <input name="ganti"  type="text">
        </div>
        
        <button>Submit</button> <a href="">reset</a>
    </form>

</body>



<?php
   $kalimat=@$_POST['kalimat'];
   $target=@$_POST['target'];
   $ganti=@$_POST['ganti'];
   $target2="/$target/i";

   if($kalimat) {
    echo "kalimat: $kalimat <br>";
   }
   if($target) {
    echo "cari kalimat: <span class='target'>$target</span> <br> ";
   }
   if($ganti) {
    echo " hasil teks setelah di ganti: <br>" . preg_replace($target2,"<span class='target'>$ganti</span>" , $kalimat); // Outputs "Visit;
   }
   
   
    ?>
    

</html>
