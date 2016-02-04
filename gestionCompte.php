<?php

    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

     if( (($pseudo != "") && ($mdp != "") && ($_POST['confirmMdp'] != "")) && ( $mdp == $_POST['confirmMdp'] )){

        if($c = mysqli_connect('localhost', 'root', 'seanmalto', 'simplo')){
          $requete = "INSERT INTO users (`id`, `user`, `motDePasse`) VALUES (NULL, '$pseudo', '$mdp')";
          $reponse = mysqli_query($c, $requete);
          echo "ok";
        }
        else{
          echo "erreur BDD!";
        }
     }
     else if(( ($pseudo != "") && ($mdp != "") && ($_POST['confirmMdp'] != "")) && ( $mdp != $_POST['confirmMdp'] )){
        echo "Difference de mot de passe";
      }
     else {
       echo "remplir tous les champs du formulaire";
     }

?>
