
<?php


//COMPTE ARTISAN



include_once 'VarConn.php';
if (!$conn){
    die("Erreur de connexion à la BD ");
}

$Type_compte=$_POST['typ'];

if ($Type_compte=="artisan"){



$mail=$_POST['email'];
$passer=$_POST['mdp'];
$passer2=$_POST['mdp2'];
$nom=$_POST['NomUser'];
$special=$_POST['specialite'];
$numero=$_POST['numero'];
$wilaya=$_POST['wilaya'];

//vérifier si aucun champ est vide

if(empty($mail) || empty($passer) || empty($nom) || empty($special) || empty($numero) || empty($wilaya)){ 
    //header("Location: ../index.php?error=emptyfields&email=".$mail."&nomuser=".$nom."&specialite=".$special."&numero=".$numero);
    echo "<script> alert(\"Un ou plusieurs champs sont vide!\"); </script>";
    echo("<script>window.location = '../inscription.html';</script>");
    exit();

}


//vérifier si l'email est valide
if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    echo("");
  } else {
    echo("$mail n'est pas un email valide");
    header("Location: ../inscription.html.php?error=EmailUtilise&nomuser=".$nom."&specialite=".$special."&numero=".$numero);
    exit();
  }

//vérifier si l'email est déjà utilisé

$lignes=mysqli_query($conn,"select * from users where email='$mail';");
$Nlignes=mysqli_num_rows($lignes);
$Nlignes = intval( $Nlignes );
if ($Nlignes > 0){
    header("Location: ../index.php?error=EmailUtilise&nomuser=".$nom."&specialite=".$special."&numero=".$numero);
    exit();
}


//Confirmer le mot de passe

if ($passer!==$passer2){
    header("Location: ../index.php?error=Confirmation&email=".$mail."&nomuser=".$nom."&specialite=".$special."&numero=".$numero);
    exit();
}
if ($special=="autre"){
    $special=$_POST['pro_autre_metier'];
}



    mysqli_query($conn,"insert into users (email, mdp,NomUser,specialite,numero,typ,emplacement) values ('$mail','$passer','$nom','$special','$numero','artisan','$wilaya');");
    echo "<script> alert(\"Compte crée!\"); </script>";
    echo("<script>window.location = '../index.php';</script>");

//Signup.inc


}



//COMPTE SIMPLE

if ($Type_compte=="simple"){



    
    $mail=$_POST['email2'];
    $passer=$_POST['password'];
    $passer2=$_POST['confirm-password'];
    $nom=$_POST['pseudo'];


    if(empty($mail) || empty($passer) || empty($nom) || empty($passer2)){ 
        //header("Location: ../index.php?error=emptyfields&email=".$mail."&nomuser=".$nom."&specialite=".$special."&numero=".$numero);
        echo "<script> alert(\"$mail!\"); </script>";
        echo "<script> alert(\"$passer!\"); </script>";
        echo "<script> alert(\"$passer2!\"); </script>";
        echo "<script> alert(\"$nom\"); </script>";
        echo("<script>window.location = '../connexion.html';</script>");
        exit();
    
    }
    
    
    //vérifier si l'email est valide
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {

        echo("$mail n'est pas une adresse valide");
        echo("<script>window.location = '../connexion.html';</script>");
        exit();
      }
    
    //vérifier si l'email est déjà utilisé
    
    $lignes=mysqli_query($conn,"select * from users where email='$mail';");
    $Nlignes=mysqli_num_rows($lignes);
    $Nlignes = intval( $Nlignes );
    if ($Nlignes > 0){
        header("Location: ../index.php?error=EmailUtilise&nomuser=".$nom."&specialite=".$special."&numero=".$numero);
        exit();
    }
    
    
    //Confirmer le mot de passe
    
    if ($passer!==$passer2){
        header("Location: ../index.php?error=Confirmation&email=".$mail."&nomuser=".$nom."&specialite=".$special."&numero=".$numero);
        exit();
    }
    

    
        mysqli_query($conn,"insert into users (email, mdp,NomUser,typ) values ('$mail','$passer','$nom','simple');");
        echo "<script> alert(\"Compte crée!\"); </script>";
        echo("<script>window.location = '../connexion.html';</script>");
    
    //Signup.inc
    
}

?>