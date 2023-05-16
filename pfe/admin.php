<?php 
session_start();
include_once 'VarConn.php';
if(!$conn){
    die('erreur de connexion à la BD');
}
if($_SESSION['userI']!=1 || !isset($_SESSION['userI'])){
    echo "<br> ";
    die("Vous n'avez pas les droits d'administrateur <br> <br> <br> <button><a href=\"./index.php\" style=\"text-decoration: none;\">Retour en arrière</a></button> <br>");
}
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Works</title>
    <!--<link rel="shortcut" href="assets/img/brand/favicon.svg" type="image/x-icon" >--> 
    <!--Boostrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--MY CSS-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/chercher.css">
</head>
  <body style="background-color: #f2f2f2;">
    <!--Navbar section-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#">
            <!--Brand here-->
            <img src="assets/img/brico1.png" alt="brand">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link active" aria-current="page" href="./index.php">Accueil</a>
              <a class="nav-link" href="chercher.html">Rechercher</a>
              <?php
                echo "<a href=\"deconnexion.php\" class=\"btn btn-outline-secondary ms-3\" id=\"dec2\" style=\"margin-right:3vh;\">Se déconnecter</a>";

                 ?>
            </div>
          </div>
        </div>
      </nav>
      <br>
      <h2 align="left" style="padding-left:5vh">Pour gérer les utilisateurs,cliquer <a style="color:#0707b3;" href="supprimeruser.php"> ici</a></h2>
      <br>
      <br>
      <h2 align="left" style="padding-left:5vh">Pour gérer les publications cliquer <a style="color:#0707b3;" href="supprimerpub.php"> ici</a></h2>
      <br>
      <br>
    <h2 align="left" style="padding-left:5vh">Pour gérer les commentaires cliquer <a style="color:#0707b3;" href="supprimercom.php"> ici</a></h2>
  <?php 
   echo "<footer class=\"bg-dark\" style=\"position:fixed; bottom:2vh; right:0vh; left:0vh; \"id=\"footer2\">
   <div class=\"container\">
       <div class=\"row\">
           <div class=\"col-md-6\">
               <div class=\"row row-cols-1 row-cols-lg-5 g-2 g-lg-3\">
                   <div class=\"col-md-3\">
                       <div>
                           <small>
                               <a href=\"#\" class=\"text-light\">Home</a>
                           </small>
                       </div>
                   </div>
                   <div class=\"col-md-3\">
                       <div>
                           <small>
                               <a href=\"#\" class=\"text-light\">Features</a>
                           </small>
                       </div>
                   </div>
                   <div class=\"col-md-3\">
                       <div>
                           <small>
                               <a href=\"#\" class=\"text-light\">pricing</a>
                           </small>
                       </div>
                   </div>
                   <div class=\"col-md-3\">
                       <div>
                           <small>
                               <a href=\"#\" class=\"text-light\">template</a>
                           </small>
                       </div>
                   </div>
               </div>
           </div>
          <div class=\"copy\">
           &copy; 2023 Bricola
          </div> 
       </div>  
   </div>
   </footer>";
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
  <script>
    function supprimer1(){
      window.location = 'supprimer.php';
    }
  </script>
</html>