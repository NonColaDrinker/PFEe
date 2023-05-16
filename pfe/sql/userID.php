<?php
include_once '../back/VarConn.php';
$mail='admin@admin.com';
$user=0;
$lignes=mysqli_query($conn,"select * from users where email='$mail';");
while($row =mysqli_fetch_assoc($lignes) ){
    $user= $row['UserId'];
   }
   print("$user")
?>