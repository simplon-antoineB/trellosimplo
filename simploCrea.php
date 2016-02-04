<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simplo</title>
    <style>
    body{
      background: #FF00FF;
    }
    #afficheReponse{
      height: 30px;
      width: 300px;
    }
    #contenant{
      display: inline-block;
    }
    #inline{
      display: inline-block;
    }
    </style>
  </head>
  <body>
    <img class="inline" src="Adam.png" height="350px" width="350px"/>
    <form>
          <!-- action="gestionCompte.php" method="post" -->
          <input type="text" name="pseudo" id="pseudo">Pseudo </input> </br>
          <input type="password" name="mdp" id="mdp">mot de passe </input> </br>
          <input type="password" name="confirmMdp" id="confirmMdp">confirmer le mot de passe </input> </br>
          <button type="button" value="Valider" onclick="informationUser()"> Join us!  </button> </br>
          <div id="afficheReponse"></div>
    </form>
  </body>

  <script>

    // function charge(){
    //   var leBouton = document.getElementById("monBouton");
    //   console.log(leBouton);
    //   leBouton.addEventListener("click", informationUser);
    // }

    function informationUser(){

      var pseudo = document.getElementById("pseudo");
      var mdp = document.getElementById("mdp");
      var confirmMdp = document.getElementById("confirmMdp");

      var requete = new XMLHttpRequest();
      requete.onload = traiteResultat;

      requete.open("post", "gestionCompte.php", true);
      requete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      requete.send("pseudo=" + pseudo.value + "&mdp=" + mdp.value + "&confirmMdp=" + confirmMdp.value);

    }

    function traiteResultat(event){
      var divReponse = document.getElementById("afficheReponse");
      var retourAcceuil = document.createElement("a");
      var valide = document.createElement("p");
      valide.innerHTML = "compte creer";
      retourAcceuil.innerHTML = "retour à l'acceuil";
      retourAcceuil.setAttribute("href","simplo.php");
      console.log(event.target);
      console.log(event.target.responseText);
      if(event.target.responseText == "ok"){
        console.log("marche");
        divReponse.appendChild(valide);
        divReponse.insertBefore(retourAcceuil, valide.nextSibling);
      }
      else{
        console.log("marche pas");
        divReponse.innerHTML = event.target.responseText;
      }
    }

  </script>
</html>
