<?php
session_start();

  $pseudo = $_POST['pseudo'];
  $mdp = $_POST['mdp'];
  $tableauDePseudo = [];
  $_SESSION['pseudo'] = $pseudo;


  if($c = mysqli_connect('localhost', 'root', 'seanmalto', 'simplo')){
    $requete = "SELECT `user`, `motDePasse` FROM users";
    $reponse = mysqli_query($c, $requete);
      while($utilisateur = mysqli_fetch_assoc($reponse)){
        $donneeUser = [
          "mesPseudos" => $utilisateur["user"],
          "mdp" => $utilisateur["motDePasse"]
        ];
        // echo $donneeUser["mesPseudos"];
        array_push($tableauDePseudo, $donneeUser);
      }
      mysqli_free_result($reponse);
      // echo json_encode($tableauDePseudo);

  }

  if(isset($pseudo) && isset($mdp)){
    foreach($tableauDePseudo as $element){
      if($pseudo == $element["mesPseudos"] && $mdp == $element["mdp"]){
        // echo $element["mesPseudos"];
        echo $pseudo;
        echo '<script language="javascript">
        <!--
        document.location.replace("simploPage.php");
        // -->
        </script>';
      }
       else{
          echo "erreur ";
       }
    }
  }
  else{
    echo "entrer un pseudo et un mot de passe";
  }

 ?>
