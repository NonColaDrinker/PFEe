<?php
include_once "chercher.html";
echo"<script>
  var footer1 = document.getElementById(\"footer1\");

    footer1.style.display =\"none\";

</script>";
include_once "VarConn.php";
//if(!empty($_POST['email']) && !empty($_POST['NomUser']) && !empty($_POST['specialite']) && !empty($_POST['emplacement'])){}


    $zone=$_POST['zone'];
    $mots= explode(' ',$zone); //diviser le texte saisi par l'utilisateur en plusieurs mots pour ameliorer la recherche
    if(empty($zone)){
            //echo "<script>alert(\"Veuillez insérer l'information à chercher  \") ;</script>";
        // echo("<script>window.location = './chercher.html';</script>");
    
      if (!empty($_POST['cle1']) && isset($_POST['cle1'])) {
        
            $cle1=$_POST['cle1'];
         $lignes5=mysqli_query($conn,"select * from users where specialite='$cle1';");
        }
     if (!empty($_POST['cle2']) && isset($_POST['cle2'])) {
        
         $cle2=$_POST['cle2'];
         $lignes5=mysqli_query($conn,"select * from users where emplacement='$cle2';");
     }




    if (!empty($_POST['cle1']) && isset($_POST['cle1']) && !empty($_POST['cle2']) && isset($_POST['cle2'])) {
        
       $lignes5=mysqli_query($conn,"select * from users where emplacement='$cle2' AND specialite='$cle1';"); 
    }


    if ((empty($_POST['cle1']) || !isset($_POST['cle1'])) && (empty($_POST['cle2']) || !isset($_POST['cle2']))) {
        
        echo "<script>alert(\"Veuillez remplir au moins un champ pour chercher\") ;</script>";
    }
}else{
    
    //recherche par nom et/ou prenom, nom utilisateur, et numero
    if (is_numeric($zone)){ //verifier si le champ saisi est numerique
        $numero=intval($zone); //le convertir en int
        if (!empty($_POST['cle1']) && isset($_POST['cle1'])) {
        
            $cle1=$_POST['cle1'];
         $lignes5=mysqli_query($conn,"select * from users where specialite='$cle1' AND numero=$numero;");
        }
     if (!empty($_POST['cle2']) && isset($_POST['cle2'])) {
        
         $cle2=$_POST['cle2'];
         $lignes5=mysqli_query($conn,"select * from users where emplacement='$cle2' AND numero=$numero;");
     }




    if (!empty($_POST['cle1']) && isset($_POST['cle1']) && !empty($_POST['cle2']) && isset($_POST['cle2'])) {
        
       $lignes5=mysqli_query($conn,"select * from users where emplacement='$cle2' AND specialite='$cle1' AND numero=$numero;"); 
    }
    
    
    }else{ if (count($mots)==1){
        $mot= $mots[0];
        $lignes5=mysqli_query($conn,"select * from users where  (nom='$mot') OR (prenom='$mot') OR NomUser='$mot' ;");
        //echo "<script>alert(\"$mot\") ;</script>";
        if (!empty($_POST['cle1']) && isset($_POST['cle1'])) {
        
            $cle1=$_POST['cle1'];
            $lignes5=mysqli_query($conn,"select * from users where specialite='$cle1' AND (nom='$mot' OR prenom='$mot' OR NomUser='$mot');");
        }
        if (!empty($_POST['cle2']) && isset($_POST['cle2'])) {
        
             $cle2=$_POST['cle2'];
             $lignes5=mysqli_query($conn,"select * from users where emplacement='$cle2' AND (nom='$mot' OR prenom='$mot' OR NomUser='$mot');");
         }




         if (!empty($_POST['cle1']) && isset($_POST['cle1']) && !empty($_POST['cle2']) && isset($_POST['cle2'])) {
        
            $lignes5=mysqli_query($conn,"select * from users where emplacement='$cle2' AND specialite='$cle1' AND (nom='$mot' OR prenom='$mot' OR NomUser='$mot');"); 
            $Nlignes=mysqli_num_rows($lignes);
            $Nlignes = intval( $Nlignes );
         }
    }else{
        $mot1=$mots[0];
        $mot2=$mots[1];
        $lignes5=mysqli_query($conn,"select * from users where  (nom='$mot1' AND prenom='$mot2') OR (nom='$mot2' AND prenom='$mot1') OR NomUser='$mot1' OR NomUser='$mot2' ;");
        if (!empty($_POST['cle1']) && isset($_POST['cle1'])) {
        
            $cle1=$_POST['cle1'];
            $lignes5=mysqli_query($conn,"select * from users where specialite='$cle1' AND ((nom='$mot1' AND prenom='$mot2') OR (nom='$mot2' AND prenom='$mot1') OR NomUser='$mot1' OR NomUser='$mot2' );");
        }
        if (!empty($_POST['cle2']) && isset($_POST['cle2'])) {
        
             $cle2=$_POST['cle2'];
             $lignes5=mysqli_query($conn,"select * from users where emplacement='$cle2' AND ((nom='$mot1' AND prenom='$mot2') OR (nom='$mot2' AND prenom='$mot1') OR NomUser='$mot1' OR NomUser='$mot2' );");
         }




         if (!empty($_POST['cle1']) && isset($_POST['cle1']) && !empty($_POST['cle2']) && isset($_POST['cle2'])) {
        
            $lignes5=mysqli_query($conn,"select * from users where emplacement='$cle2' AND specialite='$cle1' AND ((nom='$mot1' AND prenom='$mot2') OR (nom='$mot2' AND prenom='$mot1') OR NomUser='$mot1' OR NomUser='$mot2' );"); 
           
            
         }
    }
    }
}

 $Nlignes=mysqli_num_rows($lignes5);
$Nlignes = intval( $Nlignes );
//$lignes5=mysqli_query($conn,"select * from users where "." ".$cle."='$zone';");
if($Nlignes==0){
    echo "<h1 align=\"center\"> Rien n'a été trouvé</h5>";
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
}else{
while($row5 =mysqli_fetch_assoc($lignes5) ){
    $user=$row5['UserId'];
    echo" <style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
      }
      
      footer {
        margin-top: auto;
      }
    </style>
    <section class=\"resultats\">
    <a href=\"./profil.php?test=$user\" style=\"cursor: pointer; text-decoration: none\">
    <div class=\"row\">
    <div class=\"col-sm-12\">
      <div class=\"card\">
        <div class=\"card-body\">
          <div class=\"row\">
            <div class=\"col-md-6\">
              <h5 class=\"card-title\">".$row5['nom']."  ".$row5['prenom']."</h5>
              <p class=\"card-text\">".$row5['NomUser']."</p>
            </div>
            <div class=\"col-md-6 text-md-end\">
              <h5 class=\"card-title\">".$row5['note']."</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> </section class=\"resultats\"> </a>";
}

echo "<footer class=\"bg-dark\"  id=\"footer2\">
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"row row-cols-1 row-cols-lg-5 g-2 g-lg-3\">
                <div class=\"col-md-3\">
                    <div>
                        <small>
                            <a href=\"index.php\" class=\"text-light\">Home</a>
                        </small>
       <div class=\"copy\">
        &copy; 2023 Bricola
       </div> 
    </div>  
</div>
</footer>";
}
?>