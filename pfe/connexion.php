<?php 
session_start();
$_SESSION['userI'];
include_once 'VarConn.php';
if (!$conn){
    die("Erreur de connexion à la BD ");
}

$mail=$_POST['email'];
$passer=$_POST['mdp'];
//récuperer le mail et le mdp
$lignes=mysqli_query($conn,"select * from users where email='$mail';");
$Nlignes=mysqli_num_rows($lignes);
$Nlignes = intval( $Nlignes );
if(empty($mail)){echo 'salut';}

if (isset($_POST['email'])){






if (($Nlignes > 0) ){
    while($row =mysqli_fetch_assoc($lignes) ){
        $mdp=$row['mdp'];
    }
    if ($passer==$mdp){
        $lignes2=mysqli_query($conn,"select * from users where email='$mail';");
        while($row2 =mysqli_fetch_assoc($lignes2) ){
            //echo $row2['UserId'];
            $_SESSION['userI']=$row2['UserId'];
            //echo "<h1>".$_SESSION['userI']."</h1>";
    //header("Location: index.html?error=mdpfaux?mail=".$mail);
    echo "<script> alert(\"Connecté!\"); </script>";
    if($_SESSION['userI']!=1){ //si l'utilisateur connecté n'est pas l'admin dont l'id est toujours 1:
        echo("<script>window.location = 'index.php';</script>");
    }else{//sinon vers la page administrateur
        echo("<script>window.location = 'admin.php';</script>");
    }
    exit();
    }
    }
    else{
        echo "<script> alert(\"Mot de Pass faux!\"); </script>";
        echo("<script>window.location = 'connexion.html';</script>");
        }

}else{
    echo "<script> alert(\"Compte n'existe pas!\"); </script>";
    echo("<script>window.location = 'connexion.html';</script>");
}

}
?>