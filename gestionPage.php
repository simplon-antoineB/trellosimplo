<?php

  session_start();

  echo "salut, ".$_SESSION['pseudo'];


  $pseudo = $_SESSION['pseudo'];
  $tache = $_POST['tache'];
  $lieux = $_POST['Lieux'];
  $description = $_POST['Description'];

  if($tache != ""){
     if($connexion = mysqli_connect('localhost', 'root', 'seanmalto', 'simplo')){
       $rSelect = "SELECT `tache` FROM users WHERE `user`= '$pseudo'";
       $repSelect = mysqli_query($connexion, $rSelect);
       while($verifTache = mysqli_fetch_assoc($repSelect)){
          if($verifTache["tache"] == null){
                 $rUpdate = "UPDATE users SET `tache`='$tache', `lieux`='$lieux', `description`= '$description' WHERE `user`='$pseudo'";
                 $repUpdate = mysqli_query($connexion, $rUpdate);
                 echo "update faite";
          }
          else{
            echo "creation de la suite de ma BDD";
            $rCreaTache = "ALTER TABLE users ADD COLUMN tache2 varchar(70);";
            $repCreaTache = mysqli_query($connexion, $rCreaTache);
            $rCreaLieux = "ALTER TABLE users ADD COLUMN lieux2 varchar(70);";
            $repCreaLieux = mysqli_query($connexion, $rCreaLieux);
            $rCreaDescription = "ALTER TABLE users ADD COLUMN description2 varchar(350);";
            $repCreaDescription = mysqli_query($connexion, $rCreaDescription);
            $rUpdateCrea = "UPDATE users SET `tache2`='$tache', `lieux2`='$lieux', `description2`= '$description' WHERE `user`='$pseudo'";
            $repUpdateCrea = mysqli_query($connexion, $rUpdateCrea);
            echo " validé";
          }
       }
     }
  }
  else{
    echo "rentrer une tache";
  }


  // if($c = mysqli_connect('localhost', 'root', 'seanmalto', 'simplo')){
  //     $requete = "UPDATE users SET `tache`='$tache', `lieux`='$lieux', `description`= '$description' WHERE `user`='$pseudo'";
  //     $reponse = mysqli_query($c, $requete);
  //     echo "oki";
  //   }

 ?>
