<?php
include_once 'VarConn.php';
if(!$conn){
    die('erreur de connexion à la BD');
}
//récupérer les ids à supprimer
$Donnees=$_POST['zone'];
$ID=explode(",",$Donnees);//enlever les " , " de la chaine et les stocker dans un tableau
$taille=count($ID);
for ($i = 0; $i<$taille;$i++) {
    $ID[$i]=intval($ID[$i]);
  }
//choisir la table
$Supprimer=$_GET['type'];
if ($Supprimer=='user'){

    //supprimer les IDs utilisateur
    foreach ($ID as $valeurid) {
        $lignes=mysqli_query($conn,"Update users set  typ='banni',  mdp= NULL, NomUser='Utilisateur banni', specialite= NULL, bio= NULL, emplacement= NULL, nom= NULL, prenom= NULL, Somme_note= NULL, Nombre_com=NULL 
        where UserId =".$valeurid.";");
    }
    header("Location: ./supprimeruser.php");
}elseif ($Supprimer=="pub"){
    foreach ($ID as $valeurid) {
        $lignes=mysqli_query($conn,'DELETE FROM pub WHERE pubID='.$valeurid.';');
    } 
    header("Location: ./supprimerpub.php");
    //Supprimer les commentaire n'est pas aussi simple, on doit calculer la nouvelle note
}elseif($Supprimer== "com"){
    foreach ($ID as $valeurid) {
        $lignes=mysqli_query($conn,"select * from commentaire where comid=".$valeurid.";");
        while($row =mysqli_fetch_assoc($lignes) ){
        $idcommente=$row['user'];
        $valeurnote=$row['valeur'];
            
            //soustraire la note de Somme_note et décrémenter la nombre total de commentaire
            
            mysqli_query($conn,"update users set Somme_note=Somme_note-".$valeurnote.", Nombre_com=Nombre_com-1 where UserId=.".$idcommente.";");
        }
        echo "<script>alert(\"hiiiii~~~~~~ $valeurid\");</script>";
        mysqli_query($conn,'DELETE FROM commentaire WHERE comid='.$valeurid.';');  
        echo "<script>window.location=\"supprimercom.php\"</script>";    } 

}


?>