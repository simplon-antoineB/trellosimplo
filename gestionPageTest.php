<?php

  session_start();

  echo "salut, ".$_SESSION['pseudo'];


  $pseudo = $_SESSION['pseudo'];
  $tache = $_POST['tache'];
  $lieux = $_POST['Lieux'];
  $description = $_POST['Description'];
  $i = 0;
  $tableauNombreTache = [];
  $cT = 0;

  if($connexionTest = mysqli_connect('localhost', 'root', 'seanmalto', 'simplo')){
    $requeteNombreTache = "SELECT * FROM users";
    $reponseNombreTache = mysqli_query($connexionTest, $requeteNombreTache);
    if($tacheTest = mysqli_fetch_assoc($reponseNombreTache)){
      $tailleTableau = count($tacheTest);
      $NombreDeTache = (($tailleTableau - 3)/3);
    }
  }
  else{
    echo "erreur BDD";
  }

  while($i < $NombreDeTache){
    $stgTache = "tache$i";
    $i++;
    array_push($tableauNombreTache, $stgTache);
  }
  $varFin = implode(", ", $tableauNombreTache);


  if($tache != ""){
      if($connexion = mysqli_connect('localhost', 'root', 'seanmalto', 'simplo')){
          $rSelect = "SELECT ".$varFin." FROM users WHERE user = '$pseudo'";
          $repSelect = mysqli_query($connexion, $rSelect);
          while($verifTache = mysqli_fetch_assoc($repSelect)){
            while($cT < $NombreDeTache){
               if($verifTache["tache$cT"] == NULL){
                 $rUpdate = "UPDATE users SET `tache$cT`='$tache', `lieux$cT`='$lieux', `description$cT`= '$description' WHERE `user`='$pseudo'";
                 $repUpdate = mysqli_query($connexion, $rUpdate);
                 echo "update faite";
                 exit();
               }
               else{
                 $cT++;
               }
               if($cT == $NombreDeTache){
                 $rCreaTache = "ALTER TABLE users ADD COLUMN tache$cT varchar(70);";
                 $repCreaTache = mysqli_query($connexion, $rCreaTache);
                 $rCreaLieux = "ALTER TABLE users ADD COLUMN lieux$cT varchar(70);";
                 $repCreaLieux = mysqli_query($connexion, $rCreaLieux);
                 $rCreaDescription = "ALTER TABLE users ADD COLUMN description$cT varchar(350);";
                 $repCreaDescription = mysqli_query($connexion, $rCreaDescription);
                 $rUpdateCrea = "UPDATE users SET `tache$cT`='$tache', `lieux$cT`='$lieux', `description$cT`= '$description' WHERE `user`='$pseudo'";
                 $repUpdateCrea = mysqli_query($connexion, $rUpdateCrea);
                 exit();
               }
            }
          }
      }
      else{
        echo "erreur BDD!";
      }
    }
  else{
    echo "rentrer une tache";
  }


//regarder ligne rUpdate cherche probleme faire en sorte que tache$cT devienne tache0

 ?>
