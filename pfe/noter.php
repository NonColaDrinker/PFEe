<?php
include_once 'VarConn.php';
if(!$conn){
    die('erreur de connexion à la BD');
}
session_start();
$note=$_POST['rating'];
$comment=$_POST['commentaire'];
$user=$_SESSION['userI'];
//$test c'est l'UID de l'utilisateur qui sera noté
$test=$_GET['test'];
unset($_SESSION["test"]);
$lignes=mysqli_query($conn,'select commentateur from commentaire where commentateur='.$user.' and user='.$test.';');
$Nlignes=mysqli_num_rows($lignes);
$Nlignes = intval( $Nlignes );
if ($Nlignes > 0){
    echo "<script>alert(\"Vous avez déjà noté cet utilisateur\");</script>";
   echo("<script>window.location = 'profil.php?test=$test';</script>");
    exit();
}

mysqli_query($conn,"insert into commentaire(commentateur,user,comment,valeur) values ($user,$test,'$comment',$note);");
mysqli_query($conn,"update users set Somme_note=Somme_note+$note, Nombre_com=Nombre_com+1 where UserId=$test;");
//update users set Somme_note=Somme_note+4, Nombre_com=Nombre_com+1 where UserId=8;
echo "<script>alert(\"$Votre commentaire a été reçu\"); </script>";
echo("<script>window.location = 'profil.php?test=$test';</script>");
?>