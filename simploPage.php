<?php

session_start();
echo "bonjour ".$_SESSION['pseudo'].",";

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simplo</title>
    <style>



    #bouton{
      height: 75px;
      width: 75px;
      border: 1px solid black;
      border-radius: 4px;
      position: relative;
      margin-left: 15px;
    }
    #plusH{
      position: absolute;
      height: 11px;
      width:  69px;
      background: black;
      left: 3px;
      top: 32px;
      border-radius: 4px;
    }
    #plusV{
      position: absolute;
      height: 69px;
      width:  11px;
      background: black;
      left: 32px;
      top: 3px;
      border-radius: 4px;
    }

    .popUpTache{
      height: 250px;
      width: 175px;
      border: 1px solid black;
      border-radius: 4px;
      display: inline-block;
    }

    .divR{
      width: 250px;
      height: 300px;
      border: 1px solid black;
      display: inline-block;
      margin-left: 10px;
    }

    .divT{
      width: 250px;
      height: 75px;
      background: green;
    }

    .divL{
      width: 250px;
      height: 75px;
      background: yellow;
    }

    .divD{
      width: 250px;
      height: 75px;
      background: red;
    }


    </style>
  </head>
  <body onload="chargement()">


    <p>Ajouter une tache : </p>
    <div id="bouton">
      <div id="plusH"></div>
      <div id="plusV"></div>
    </div>
    <a href="seDeco.php">se deconnecter</button>
    </br>
    </br>

    <script>

    //après validation tache faire disparaitre fenetre pop up, et création auto d'une nouvelle div! (puis c'est finis).
    var compteur = 0;

    function chargement(){
      var monBouton = document.getElementById("bouton");
      monBouton.addEventListener("click", ajouterTache);

      var requeteAffichage = new XMLHttpRequest();
      requeteAffichage.onload = afficheFenetre;

      requeteAffichage.open("get", "fenetreTache.php", true);
      requeteAffichage.send();
    }

    function afficheFenetre(event){
      var data = JSON.parse(event.target.responseText);
      var maDivR;
      console.log(data);
      // console.log(data);

      //ligne a étudier, convertir objet to array :
      var Adata = Object.keys(data).map(function(key){return data[key]});
      // console.log(Adata[1]);

      // console.log(Adata);
      var longueur = (Object.keys(data).length)/3;
       for (var tache in data){
        console.log("ploup, " + data[tache]);
        for(v=0; v < longueur; v++){
          if(tache == "tache" + v && data[tache] != null){
            // console.log(tache);
            // console.log("bien vu");
            maDivR = document.createElement("div");
            maDivR.setAttribute("class", "divR");
            document.body.appendChild(maDivR);
            console.log(maDivR);

            maDivT = document.createElement("div");
            maDivT.setAttribute("class", "divT");
            maDivR.appendChild(maDivT);
            maDivT.innerHTML = "tache: " + data[tache];
          }
          if(tache == "lieux" + v && data[tache] != null){
            maDivL = document.createElement("div");
            maDivL.setAttribute("class", "divL");
            maDivR.appendChild(maDivL);
            maDivL.innerHTML = "Lieux: " + data[tache];
          }

          if(tache == "description" + v && data[tache] != null){
              maDivD = document.createElement("div");
              maDivD.setAttribute("class", "divD");
              maDivR.appendChild(maDivD);
              maDivD.innerHTML = "description: " + data[tache];
           }
        }
       }



      //return data? pour avoir une seule et unique fonction qui s'occupe de l'affichage des fenetre à tache??
    }

    function ajouterTache(){


      //trouver si insertform éxite
      if(compteur == 0){
          console.log("ok");
          var insertForm = document.createElement("form");
          insertForm.style.height = "390px";
          insertForm.style.width = "350px";
          insertForm.style.position = "absolute";
          insertForm.style.left = "450px";
          insertForm.style.border = "2px solid black";
          insertForm.style.marginTop = "-130px";
          insertForm.setAttribute("id", "formulaireCrea");
          document.body.appendChild(insertForm);

          var labelInsertTache = document.createElement("label");
          labelInsertTache.innerHTML = "Tache </br>";
          labelInsertTache.setAttribute("for", "insertTache");
          insertForm.appendChild(labelInsertTache);

          var insertTache = document.createElement("input");
          insertTache.setAttribute("id", "insertTache");
          insertTache.setAttribute("name", "tache");
          insertTache.setAttribute("type", "text");
          insertTache.setAttribute("size", "70");
          insertTache.style.width = "250px";
          insertForm.appendChild(insertTache);

          var sale = document.createElement("span");
          sale.innerHTML = "</br>";
          insertForm.insertBefore(sale, insertTache.nextSibling);

          var labelInsertLieux = document.createElement("label");
          labelInsertLieux.innerHTML = "Lieux </br>";
          labelInsertLieux.setAttribute("for", "insertLieux");
          insertForm.appendChild(labelInsertLieux);

          var insertLieux = document.createElement("input");
          insertLieux.setAttribute("id", "insertLieux");
          insertLieux.setAttribute("name", "Lieux");
          insertLieux.setAttribute("type", "text");
          insertLieux.setAttribute("size", "70");
          insertLieux.style.width = "250px";
          insertForm.appendChild(insertLieux);

          var sale2 = document.createElement("span");
          sale2.innerHTML = "</br>";
          insertForm.insertBefore(sale2, insertLieux.nextSibling);

          var labelInsertDescription = document.createElement("label");
          labelInsertDescription.innerHTML = "Description </br>";
          labelInsertDescription.setAttribute("for", "insertDescription");
          insertForm.appendChild(labelInsertDescription);

          var insertDescription = document.createElement("textArea");
          insertDescription.setAttribute("id", "insertDescription");
          insertDescription.setAttribute("name", "Description");
          insertDescription.setAttribute("type", "text");
          insertDescription.style.width = "250px";
          insertDescription.style.height = "250px";
          insertDescription.setAttribute("size", "350");
          insertForm.appendChild(insertDescription);

          var sale3 = document.createElement("span");
          sale3.innerHTML = "</br>";
          insertForm.insertBefore(sale3, insertDescription.nextSibling);

          var boutonValide = document.createElement("button");
          boutonValide.setAttribute("type", "button");
          boutonValide.addEventListener("click", envoieRequete);
          boutonValide.style.marginTop = "12px";
          insertForm.appendChild(boutonValide);
          boutonValide.innerHTML = "valider";
        }

      else{
        var insertFormRecup2 = document.getElementById("formulaireCrea");
        insertFormRecup2.style.display = "inline";
      }

    }

    function envoieRequete(){
      var requete = new XMLHttpRequest();
      requete.onload = afficheResultat;

      var insertFormRecup = document.getElementById("formulaireCrea");
      compteur++;
      insertFormRecup.style.display = "none";

      var requeteAffichage = new XMLHttpRequest();
      requeteAffichage.onload = afficheFenetre;

      requeteAffichage.open("get", "fenetreTache.php", true);
      requeteAffichage.send();


      console.log(insertTache.value);
      requete.open("post", "gestionPageTest.php", true);
      requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      requete.send("tache=" + insertTache.value + "&Lieux=" + insertLieux.value + "&Description=" + insertDescription.value);
    }

    function afficheResultat(event){
       console.log(event.target.responseText);
    }


    /* fonction pour créer une div (a voir si je garde)

    function creationDiv(maDiv){

      var dTT = document.createElement("div");
      dTT.style.width = "250px";
      dTT.style.height = "50px";
      dTT.style.background = "red";
      // dTT.innerHTML = "bonjour";

      var dTL = document.createElement("div");
      var dTD = document.createElement("div");
      maDiv.style.background = "green";
      maDiv.appendChild(dTT);

    }

    */

    // maDivR = document.createElement("div");
    // maDivR.setAttribute("class", "divR");
    // creationDiv(maDivR);
    // document.body.appendChild(maDivR);
    // console.log(maDivR);

    // function creationDiv(){
    //   var maDivR = document.createElement("div");
    //   maDivR.setAttribute("class", "divR");
    //   maDivR.appendChild(document.body);
    // }

    // var longueur = (Object.keys(data).length)/3;
    // var div;
    // for(u=0; u < longueur ; u++){
    //   div = document.createElement("div");
    //   div.setAttribute("id", "mesTache" + u);
    //   div.setAttribute("class", "popUpTache");
    //   document.body.appendChild(div);
    // }

    //  for(t=0; t < Object.keys(data); t++){
    //    objectif.push(data.tache0);
    //  }
    //  console.log(objectif);
    </script>
  </body>
</html>
