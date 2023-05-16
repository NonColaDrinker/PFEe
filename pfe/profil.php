<?php
include_once 'VarConn.php';
session_start();

if(!$conn){
    die("erreur de connexion à la BD");
}
//$test id de le compte de cet page
  if(isset($_GET['test'])){
    $test=$_GET['test'];
    goto Userid;
  }else{
    $test=$_GET['t'];
  }


$lignes1=mysqli_query($conn,'select users.userID from users inner join pub on users.UserID=pub.persID where pub.pubID='.$test.';');
$UneFois=0;

while($row32 =mysqli_fetch_assoc($lignes1) and $UneFois==0){
$test=$row32['userID'];

$UneFois++;
}
Userid:
/*if(!isset($_SESSION['test'])) {
  $_SESSION['test'] = $test;

}*/

?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <link rel="shortcut" href="assets/img/brand/favicon.svg" type="image/x-icon" >
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <!--Bootstrap Icons link-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!--MY CSS-->
    <link rel="stylesheet" href="assets/css/style.css">  
    <link rel="stylesheet" href="assets/css/profilestyle.css" >
  </head>
  <body>
    <!--Navbar section-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#">
            <!--Brand here-->
            <a href="index.php" class="btn btn-outline-secondary shadow-sm d-sm d-block" id="accueil">Accueil</a>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a href="#" class="btn btn-outline-secondary shadow-sm d-sm d-block">Profil</a>
              

            </div>
            <?php
            //$hi=$_SESSION['userI'];
            if (isset($_SESSION['userI'])){
              echo"
            <a href=\"deconnexion.php\" class=\"btn btn-outline-secondary ms-3\" id=\"dec\">Se déconnecter</a>";
            }
            else{
              echo "<a href=\"Connexion.html\" class=\"btn btn-primary\" style=\"margin-left: 2vh\">Se connecter</a>";
            }
            ?>
          </div>
        </div>
      </nav>
    <section class="profil">
      <div class="profile-container">
        <div class="cover-photo"></div>
        <!--Photo à importer-->
              <div class="">
                <img class="profile-photo" src="https://th.bing.com/th/id/OIP.FZI1PgPHjh-wOAnP7H8FegHaJg?pid=ImgDet&rs=1" alt="">
                </div>
             </div>
                 
             <div class="header-profile">
              <div class=" gen-info text-center">
                <?php
                
                $user=$test;

                //echo "<script>alert(\"$test\") </script>";
                $lignes1=mysqli_query($conn,"select * from users where UserId=$user;");
                $Nlignes=mysqli_num_rows($lignes1);
                while($row1 =mysqli_fetch_assoc($lignes1) ){
                    echo "<h1>".$row1['nom'].' '.$row1['prenom']."</h2>";
                   }

                $lignes2=mysqli_query($conn,"select * from users where UserId=$user;");
                     while($row2 =mysqli_fetch_assoc($lignes2) ){
                            echo "<h4>".$row2['specialite']."</h4>";
                        }
               
                ?>

                <small>
                    <i class="bi bi-geo-alt-fill"></i>
                    <?php                
                     $lignes3=mysqli_query($conn,"select * from users where UserId=$user;");
                     while($row3 =mysqli_fetch_assoc($lignes3) ){
                            echo $row3['emplacement'];
                        } 
                         ?>
                         
                        </small>
              </div>
            </div>
                
                <div class="container sup-info">
             <div class="row">
                    <div class="d-flex align-content-stretch-flew-wrap col-md-4">
                <ul class="">
                    <li><i class="bi bi-envelope"></i>                     
                    <?php                
                     $lignes4=mysqli_query($conn,"select * from users where UserId=$user;");
                     while($row4 =mysqli_fetch_assoc($lignes4) ){
                            echo $row4['email'];
                        } 
                         ?>
                         </li>
                    <li><i class="bi bi-telephone"></i> +213                     
                    <?php                
                     $lignes5=mysqli_query($conn,"select * from users where UserId=$user;");
                     while($row5 =mysqli_fetch_assoc($lignes5) ){
                            echo $row5['numero'];
                        } 
                         ?>
                         </li>
                </ul>
                
                  
              </div>
                    <div class="col-md-8">
                <h3>Résumé professionnel</h3>
                <p>
                <div class="profile-divs">
                    <br><br>
                    <br><br>
                  </div>                     
                  <?php                
                     $lignes6=mysqli_query($conn,"select * from users where UserId=$user;");
                     while($row6 =mysqli_fetch_assoc($lignes6) ){
                            echo $row6['bio'];
                        } 
                         ?></p>
                  <h2>
                    <br>  
                    Note:
                    <?php  
                    $ex="select * from users where UserId=$user;" ;  
                     $lignes7=mysqli_query($conn,"select * from users where UserId=$user;");
                     while($row7 =mysqli_fetch_assoc($lignes7) ){
                       $note=$row7['note'];
                      } ?>
                      <?php
                        for ($i=0;$i<$note;$i++){
                          echo "<img src='assets/img/filled-star.svg'>";
                        }

  
                         ?>
                    </h2>
                    <?php
                    if (isset($_SESSION['userI'])){ //Un visiteur ne peut pas noter ssi il a un compte
                        echo"


                      
                        <p class=\"btn btn-outline-secondary shadow-sm d-sm d-block\" style=\" width:33%\" onclick=\"noter()\" >Noter cet utilisateur</p>
                      <form action=\"noter.php?test=$test\" method=\"post\" style=\"display:none\" id=\"note\">
                      <br> 
                      <div class=\"rating\">
                        <input type=\"radio\" id=\"star1\" name=\"rating\" value=\"1\">
                        <label for=\"star1\"></label>
                        <input type=\"radio\" id=\"star2\" name=\"rating\" value=\"2\">
                        <label for=\"star2\"></label>
                        <input type=\"radio\" id=\"star3\" name=\"rating\" value=\"3\">
                        <label for=\"star3\"></label>
                        <input type=\"radio\" id=\"star4\" name=\"rating\" value=\"4\">
                        <label for=\"star4\"></label>
                        <input type=\"radio\" id=\"star5\" name=\"rating\" value=\"5\">
                        <label for=\"star5\"></label>
                      </div>
                      <textarea maxlenghth=\"255\" class=\"btn-outline-secondary shadow-sm d-sm d-block\" id=\"sujet\" name=\"commentaire\" placeholder=\"Ecrire quelque chose..\" style=\"width: 100%; height:10vh; resize:none;\" ></textarea>
                      <br><br>
                      <button type=\"submit\" name=\"Envoyer\" class=\"btn btn-outline-secondary shadow-sm d-sm d-block\" style=\" width:25%\" onclick=\" alerter()\" >Envoyer</button> 
                      </form>
                      <br>
                    ";
                    }

                    ?>
              </div>
              <h3>Commentaires</h3>
              <?php
              $Ncomm=0;
        $lignes6=mysqli_query($conn,"select users.NomUser from users inner join commentaire on users.UserID=commentaire.commentateur where user=$user ;");
        while($row6 =mysqli_fetch_assoc($lignes6) ){
    echo"<div class=\"col\ \" style=\"margin-bottom: 2vh;\">
    <div class=\"card\">
    <div class=\"card-body\">
    <h5 class=\"card-title\" >";
    $lignes10=mysqli_query($conn,"select commentaire.comment from commentaire inner join users on users.UserID=commentaire.user where user=$user ORDER BY RAND() LIMIT 20 ;"); //afficher 20 commentaires au hasard
    while($row7=mysqli_fetch_assoc($lignes10)){

      echo $row6['NomUser']."</h5> <br> <p class=\"card-text\">".nl2br($row7['comment'],false)."</p> </div></div></div>";
    }

    
    }
    ?>
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
                                    <a href="#" class="text-light">Features</a>
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

                                </small>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="copy">
                &copy; <i>Bricola</i>
               </div> 
            </div>  
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script>
      function noter(){
        document.getElementById("note").style.display = "block";
      }


  const rating = document.querySelector('.rating');
const ratingInputs = rating.querySelectorAll('input');
const ratingLabels = rating.querySelectorAll('label');

rating.addEventListener('mousemove', function(e) {
  const target = e.target;

  if (target.tagName === 'LABEL') {
    const targetValue = target.getAttribute('for').slice(-1);

    ratingLabels.forEach((label, index) => {
      if (index < targetValue) {
        label.style.backgroundImage = 'url("assets/img/filled-star.svg")';
      } else {
        label.style.backgroundImage = 'url("assets/img/Empty_star.svg")';
      }
    });
  }
});

rating.addEventListener('mouseleave', function() {
  ratingInputs.forEach(input => {
    if (input.checked) {
      const checkedValue = input.value;
      ratingLabels.forEach((label, index) => {
        if (index < checkedValue) {
          label.style.backgroundImage = 'url("assets/img/filled-star.svg")';
        } else {
          label.style.backgroundImage = 'url("assets/img/Empty_star.svg")';
        }
      });
    } else {
      label.style.backgroundImage = 'url("assets/img/Empty_star.svg")';
    }
  });
});

rating.addEventListener('click', function(e) {
  const target = e.target;

  if (target.tagName === 'LABEL') {
    const targetValue = target.getAttribute('for').slice(-1);

    ratingInputs.forEach(input => {
      if (input.value <= targetValue) {
        input.checked = true;
      } else {
        input.checked = false;
      }
    });

    ratingLabels.forEach((label, index) => {
      if (index < targetValue) {
        label.style.backgroundImage = 'url("assets/img/filled-star.svg")';
      } else {
        label.style.backgroundImage = 'url("assets/img/Empty_star.svg")';
      }
    });
  }
});



/*function alerter(){
  alert("Votre commentaire a été reçu!");
}*/

    </script>
  </body>
</html>