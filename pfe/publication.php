<?php
include_once 'VarConn.php';
if (!$conn){
    die("Erreur de connexion à la BD ");
}
session_start();
$sujet=$_POST['sujet'];
if (isset($_SESSION['userI'])){
    $uid=$_SESSION['userI'];
    mysqli_query($conn,"insert into pub (cont,persID) values ('$sujet',$uid);");
    header('Location:./profile2.php');
}
?>