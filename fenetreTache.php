<?php

session_start();

$pseudo = $_SESSION["pseudo"];
$i = 0;
$tableauNombreTache = [];


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
    $stgTache = "tache$i, lieux$i, description$i";
    $i++;
    array_push($tableauNombreTache, $stgTache);
  }
  $varFin = implode(", ", $tableauNombreTache);

  if($connexionRetour = mysqli_connect('localhost', 'root', 'seanmalto', 'simplo')){
    $requeteRetour = "SELECT ".$varFin." FROM users WHERE user = '$pseudo'";
    $reponseRetour = mysqli_query($connexionRetour, $requeteRetour);
    while( $tteTache = mysqli_fetch_assoc($reponseRetour)){
      echo json_encode($tteTache);
    }
  }
  else{
    echo "erreur BDD";
  }

?>
