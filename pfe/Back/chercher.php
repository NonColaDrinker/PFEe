<?php 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sweet chique </title>
  <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Works</title>
    <link rel="shortcut" href="../assets/img/brand/favicon.svg" type="image/x-icon" >
    <!--Boostrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--MY CSS-->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php
include_once 'VarConn.php';
/*drop database if exists test;*/
//il faut exécuter le code sql en premier
//$Achercher=$_POST['phrase'];
if(!$conn){
    die("erreur de connexion à la BD");
}
$lignes=mysqli_query($conn," select users.NomUser, users.note, pub.cont from pub inner join users on pub.persID=users.userID;");
$Nlignes=mysqli_num_rows($lignes);
//echo("<script>alert(\"Votre message a bien été envoyé\")</script>");
//echo(" select pub.pubid, personne.persid, pub.cont from pub inner join personne on pub.persID=personne.persID;");
if($Nlignes !=0){
while($row =mysqli_fetch_assoc($lignes) ){
   echo "<br> <br> <br> <br> <br> <br> <br>";
   echo "<p>".$row['cont']."<br> </p>";
   echo "<p style=\"font-family: 'Brush Script MT', cursive; font-size:200%; text-align:center;\">prix=".$row['cont']."</p>";
  }
}
else{
  echo "<br> <br> ";
  echo "<p style=\"font-size:130%;\"><b style=\"Color:black;\"> Rien n'a été trouvé :( </b></p> ";
}
?>
<button onclick="retour()"> Revenir vers la page d'accueil</button>
<script>
function retour(){
  window.location = '../index.php';}</script>

</script>
<section class="hero">
        <div class="container">
            <div class="row">
                <!--Text-->
                <div class="col-md-6">
                    <div class="text">
                        Make website with UI builder maore faster
                    </div>
                    <div class="buttons">
                        <a href="#" class="btn btn-primary">Study</a>
                        <a href="#" class="btn btn-outline-secondary ms-3">Live preview</a>
                    </div>
                </div>
                <!--image-->
                <div class="col-md-6">
                  <img src="../assets/img/hero-img.svg" alt="hero-img" class="w-100">
                </div>
            </div>
        </div>
    </section>
    <!--Cards section-->
    <section class="cards">
        <div class="text-header text-center">
            <h3>Get started avec nos artisans</h3>
            <p>loren ipsum dolor sit amet, consecteur adilising.</p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card">
                <!--<img src="assets/img/R.jpg" class="card-img-top" alt="img-R1">-->
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="buttons-1 text-end">
                    <a href="#" class="btn btn-secondary">Consultez</a>  
                </div>      
                </div>
              </div>
            </div>
          </div>
        </section>
</body>
</html>