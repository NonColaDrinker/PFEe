<?php 
session_start();
include_once 'VarConn.php';
//Trouver le nombre de publications dans la BD

if(!$conn){
  die("erreur de connexion à la BD");
}

//générer 6 publications aléatoires *différentes*

$lignes1=mysqli_query($conn,"select count(*) from pub");
while($row1 =mysqli_fetch_assoc($lignes1) ){
  $nombre_pub=$row1['count(*)'];
}
$pubs = range(1, $nombre_pub);
if ($nombre_pub>=6){

  shuffle($pubs);
  $pub1=$pubs[1];
  $pub2=$pubs[2];
  $pub3=$pubs[3];
  $pub4=$pubs[4];
  $pub5=$pubs[5];
  $pub6=$pubs[6];
}else{
  $push=6-$nombre_pub;
  for ($i=0;$i<$push;$i++){
    $pubs[]=rand(1,$nombre_pub);

  }
  shuffle($pubs);
  $pub1=$pubs[1];
  $pub2=$pubs[2];
  $pub3=$pubs[3];
  $pub4=$pubs[4];
  $pub5=$pubs[5];
  $pub6=$pubs[6];
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
</head>
  <body>
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
              <a class="nav-link active" aria-current="page" href="#">Accueil</a>
              <a class="nav-link" href="chercher.html">Rechercher</a>
              <?php
                if (isset($_SESSION['userI'])){
                  $test=$_SESSION['userI'];
                $lignes5=mysqli_query($conn,"select * from users where UserId=$test;");
                while($row5 =mysqli_fetch_assoc($lignes5) ){
                    $type=$row5['typ'];
  
                  }
                  if ($type=="simple"){
                    
                    echo "<a class=\"nav-link\" href=\"profil3.php\">Espace profil</a>";
                  }
                }
                  if (isset($_SESSION['userI'])){
                    if (($_SESSION['userI'])==1){
                      echo "<a href=\"admin.php\" class=\"btn btn-outline-secondary ms-3\" id=\"dec2\" style=\"margin-right:3vh;\">Vers la page administrateur</a>";
                    }
                    echo "<a href=\"deconnexion.php\" class=\"btn btn-outline-secondary ms-3\" id=\"dec2\" style=\"margin-right:3vh;\">Se déconnecter</a>";

                      }
                      
                      ?>
            </div>
            <?php
              if (isset($_SESSION['userI'])){
                $test=$_SESSION['userI'];
              $lignes5=mysqli_query($conn,"select * from users where UserId=$test;");
              while($row5 =mysqli_fetch_assoc($lignes5) ){
                 $type=$row5['typ'];

                } 
              if ($type=="artisan"){
                echo "<a href=\"profile2.php\" class=\"btn btn-outline-secondary shadow-sm d-sm d-block\">Profil </a>";
            }
          }
            ?>
          </div>
        </div>
      </nav>
    <!--Hero section-->
    <section class="hero">
        <div class="container">
            <div class="row">
                <!--Text-->
                <div class="col-md-6">
                    <div class="text">
                        Bricola
                    </div>
                    <div class="buttons">
                      <?php
                        if (!isset($_SESSION['userI'])){
                        echo "<a href=\"Connexion.html\" class=\"btn btn-primary\">Se connecter</a>
                        <a href=\"inscription.html\" class=\"btn btn-outline-secondary ms-3\">S'inscrire</a> ";
                      }
                        ?>
                    </div>
                </div>
                <!--image-->
                <div class="col-md-6">
                  <img src="assets/img/bricole-img.png" alt="hero-img" class="w-100">
                </div>
            </div>
        </div>
    </section>
    <!--Cards section-->
    <section class="cards">
        <div class="text-header text-center">
            <h3>Lancer-vous avec nos artisans</h3>
            <p>Quelques offres qui pourraient vous intéresser...</p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4" style="padding-left: 5px;">
            <div class="col" >
              <div class="card">
                <!--<img src="assets/img/R.jpg" class="card-img-top" alt="img-R1">-->
                <!--pub1-->
                <div class="card-body">
                  <h5 class="card-title" >
                    
                    <?php
                      $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub1");
                     // echo "<script>alert(\"$pub1\") </script>";
                      while($row1 =mysqli_fetch_assoc($lignes1) ){
                       $cont=$row1['cont'];
                      }
                      $lignes1=mysqli_query($conn,'select users.nom, users.prenom, users.specialite from users inner join pub on users.UserID=pub.persID where pub.pubID='.$pub1.';');
                      $UneFois=0;
                      while($row12 =mysqli_fetch_assoc($lignes1) and $UneFois==0){
                        if (!empty($row12['nom'])){
                          echo $row12['nom'].' '.$row12['prenom'].'.        Spécialité: '.$row12['specialite'];
                        }else{
                          echo "Utilisateur banni";
                        }
                      $UneFois++;
                    }
                  
                  ?>
                  
                </h5>
                  <?php
                  

                     $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub1");
                     while($row13 =mysqli_fetch_assoc($lignes1) ){
                      $cont=$row13['cont'];
                     }
                     



                  echo "<p class=\"card-text\" maxlength=\"10\">".$cont."</p>";
                  ?>
                  <div class="buttons-1 text-end">
                  <form method="post" action="profil.php?t=<?php echo $pub1;?>">
                    <?php echo "<input type=\"hidden\" name=\"pub\" value=\"$pub1\" />  "?>
                    <a class="btn btn-secondary" onclick="this.parentNode.submit();">Consulter</a>
                    </form>  
                </div>      
                </div>
              </div>
            </div>
            <!--pub2-->
            <div class="col">
              <div class="card">
               <!-- <img src="assets/img/R.jpg" class="card-img-top" alt="img-R2">-->
                <div class="card-body">
                  <h5 class="card-title"> 
                    <?php 
                      $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub2");
                      
                      while($row2 =mysqli_fetch_assoc($lignes1) ){
                        $cont=$row2['cont'];
                      }
                      $lignes1=mysqli_query($conn,'select users.nom, users.prenom, users.specialite from users inner join pub on users.UserID=pub.persID where pub.pubID='.$pub2.';');
                      $UneFois=0;
                      while($row22 =mysqli_fetch_assoc($lignes1) and $UneFois==0){
                        if(!empty($row22['nom']))
                        echo $row22['nom'].' '.$row22['prenom'] .'.      Spécialité: '.$row22['specialite'];
                        else{
                          echo "Utilisateur banni";
                        }
                        $UneFois++;
                    }
                    ?>


                  </h5>
                  <?php
                  $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub2");
                     while($row23 =mysqli_fetch_assoc($lignes1) ){
                      $cont=$row23['cont'];
                     }
                     



                  echo "<p class=\"card-text\">".$cont."</p>";
                  ?>

                  <div class="buttons-1 text-end">
                  <form method="post" action="profil.php?t=<?php echo $pub2;?>">
                    <?php echo "<input type=\"hidden\" name=\"pub\" value=\"$pub2\" />  "?>
                    <a class="btn btn-secondary" onclick="this.parentNode.submit();">Consulter</a>
                    </form>
                </div>      
                </div>
              </div>
            </div>
            <!--pub3-->
            <div class="col">
              <div class="card">
                <!--<img src="assets/img/R.jpg" class="card-img-top" alt="img-R3">-->
                <div class="card-body">
                  <h5 class="card-title">
                    
                    <?php
                      $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub3");
                      while($row3 =mysqli_fetch_assoc($lignes1) ){
                       $cont=$row3['cont'];
                      }
                      $lignes1=mysqli_query($conn,'select users.nom, users.prenom, users.specialite from users inner join pub on users.UserID=pub.persID where pub.pubID='.$pub3.';');
                      $UneFois=0;
                      
                      while($row32 =mysqli_fetch_assoc($lignes1) and $UneFois==0){
                        if(!empty($row32['nom'])){
                          echo $row32['nom'].' '.$row32['prenom'] .'.       Spécialité: '.$row32['specialite'];
                        }
                        
                      else{
                        echo "Utilisateur banni";
                      }
                      $UneFois++;
                    }
                  
                  ?>
                  
                </h5>
                  <?php
                  

                     $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub3");
                     while($row1 =mysqli_fetch_assoc($lignes1) ){
                      $cont=$row1['cont'];
                     }
                     



                  echo "<p class=\"card-text\">".$cont."</p>";
                  ?>
                  <div class="buttons-1 text-end">
                  <form method="post" action="profil.php?t=<?php echo $pub3;?>">
                    <?php echo "<input type=\"hidden\" name=\"pub\" value=\"$pub3\" />  "?>
                    <a class="btn btn-secondary" onclick="this.parentNode.submit();">Consulter</a>
                    </form>
                </div>
                </div>
              </div>
            </div>
            <!--pub4-->
            <div class="col">
                <div class="card">
                  <!--<img src="assets/img/R.jpg" class="card-img-top" alt="img-R3">-->
                  <div class="card-body">
                    <h5 class="card-title">
                      <?php
                      $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub4");
                      while($row3 =mysqli_fetch_assoc($lignes1) ){
                       $cont=$row3['cont'];
                      }
                      $lignes1=mysqli_query($conn,'select users.nom, users.prenom, users.specialite from users inner join pub on users.UserID=pub.persID where pub.pubID='.$pub4.';');
                      $UneFois=0;
                      
                      while($row32 =mysqli_fetch_assoc($lignes1) and $UneFois==0){
                        if (!empty($row32['nom'])){
                          
                          echo $row32['nom'].' '.$row32['prenom'].'.       Spécialité: '.$row32['specialite'];
                        }
                      else{
                        echo "Utilisateur banni";
                      }
                      $UneFois++;
                    }
                  
                  ?>
                  
                </h5>
                  <?php
                  

                     $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub4");
                     while($row1 =mysqli_fetch_assoc($lignes1) ){
                      $cont=$row1['cont'];
                     }
                     



                  echo "<p class=\"card-text\">".$cont."</p>";
                  ?>
                    <div class="buttons-1 text-end">
                    <form method="post" action="profil.php?t=<?php echo $pub4;?>">
                    <?php echo "<input type=\"hidden\" name=\"pub\" value=\"$pub4\" />  "?>
                    <a class="btn btn-secondary" onclick="this.parentNode.submit();">Consulter</a>
                    </form>
                    </div>  
                </div>
                </div>
              </div>
              <!--pub5-->
              <div class="col">
                <div class="card">
                  <!--<img src="assets/img/R.jpg" class="card-img-top" alt="img-R3">-->
                  <div class="card-body">
                    <h5 class="card-title">                      <?php
                      $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub5");
                      while($row3 =mysqli_fetch_assoc($lignes1) ){
                       $cont=$row3['cont'];
                      }
                      $lignes1=mysqli_query($conn,'select users.nom, users.prenom, users.specialite from users inner join pub on users.UserID=pub.persID where pub.pubID='.$pub5.';');
                      $UneFois=0;
                      
                      while($row32 =mysqli_fetch_assoc($lignes1) and $UneFois==0){
                        if (!empty($row32['nom'])){

                          echo $row32['nom'].' '.$row32['prenom'].'.       Spécialité: '.$row32['specialite'];
                        }
                      else{
                        echo "Utilisateur banni";
                      }
                      $UneFois++;
                    }
                  
                  ?>
                  
                </h5>
                  <?php
                  

                     $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub5");
                     while($row1 =mysqli_fetch_assoc($lignes1) ){
                      $cont=$row1['cont'];
                     }
                     



                  echo "<p class=\"card-text\">".$cont."</p>";
                  ?>
                    <div class="buttons-1 text-end">
                    <form method="post" action="profil.php?t=<?php echo $pub5;?>">
                    <?php echo "<input type=\"hidden\" name=\"pub\" value=\"$pub5\" />  "?>
                    <a class="btn btn-secondary" onclick="this.parentNode.submit();">Consulter</a>
                    </form>
                    </div> 
                </div>
                </div>
              </div>
              <!--pub6-->
              <div class="col">
                <div class="card">
                  <!--<img src="assets/img/R.jpg" class="card-img-top" alt="img-R3">-->
                  <div class="card-body">
                    <h5 class="card-title">                      <?php
                      $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub6");
                      while($row3 =mysqli_fetch_assoc($lignes1) ){
                       $cont=$row3['cont'];
                      }
                      $lignes1=mysqli_query($conn,'select users.nom, users.prenom, users.specialite from users inner join pub on users.UserID=pub.persID where pub.pubID='.$pub6.';');
                      $UneFois=0;
                      
                      while($row32 =mysqli_fetch_assoc($lignes1) and $UneFois==0){
                        if (!empty($row32['nom'])){

                          echo $row32['nom'].' '.$row32['prenom'].'.       Spécialité: '.$row32['specialite'];
                        }
                      else{
                        echo "Utilisateur banni";
                      }
                      $UneFois++;
                    }
                  
                  ?>
                  
                </h5>
                  <?php
                  

                     $lignes1=mysqli_query($conn,"select * from pub where pubID=$pub6");
                     while($row1 =mysqli_fetch_assoc($lignes1) ){
                      $cont=$row1['cont'];
                     }
                     



                  echo "<p class=\"card-text\">".$cont."</p>";
                  ?>
                    <div class="buttons-1 text-end">
                    <form method="post" action="profil.php?t=<?php echo $pub6;?>">
                    <?php echo "<input type=\"hidden\" name=\"pub\" value=\"$pub6\" />  "?>
                    <a class="btn btn-secondary" onclick="this.parentNode.submit();">Consulter</a>
                    </form>
                    </div>
                </div>
                </div>
              </div>
          </div>
        </section>
    <!--Setup secion-->
    <section class="setup">
    </section>
    <!--Information section-->
    <section class="information">
        <div class="container">
            <div class="row info-1">
                <!--Text-->
                <div class="col-md-6">
                    <div class="text-information">
                        <h5>Obtenez plus de clients </h5>
                        <p>Exposer vos services à ceux qui pourraient être intéressés et augmenter votre notoriété.</p>
                    </div>
                </div>
                <!--Image-->
                <div class="col-md-6">
                    <img src="assets/img/image-1.svg" alt="img-1" class="w-100">
                </div>
            </div>
            <div class="row info-2">
                <!--Image-->
                <div class="col-md-6">
                    <img src="assets/img/image-2.svg" alt="img-2" class="w-100">
                </div>
                <!--Text-->
                <div class="col-md-6">
                    <div class="text-information">
                        <h5>Gratuit et utile </h5>
                        <p>Inscrivez-vous en quelques clics, publiez vos offres et trouvez vos opportunités</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Footer section-->
    <footer class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row row-cols-1 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col-md-3">
                            <div>
                                <small>
                                    <a href="#" class="text-light">Accueil</a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <small>
                                    
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <small>
                                    
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="copy">
                &copy; 2023 <i>Bricola</i>
               </div> 
            </div>  
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>