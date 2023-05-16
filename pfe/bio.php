<?php
include_once 'Varconn.php';
session_start();
$bio=$_POST['bio'];
echo "<script> alert(\"$bio\");</script>";
$user=$_SESSION['userI'];
mysqli_query($conn,"update users set bio=TRIM('$bio') where UserId=$user;");
header("location:profile2.php");
?>