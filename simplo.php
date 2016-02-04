<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simplo</title>
    <style>

    body{
      background: #FF00FF;
    }

    #gigaContenant{
      display: block;
    }
    #mesBorder{
      height: 406px;
      width: 356px;
      background: #C3C6CB;
      border-bottom: 1px solid black;
      border-right: 1px solid black;
      margin-top: 125px;
    }

    #contenant{
      display: inline-block;
      height: 400px;
      width: 350px;
      /*border: 1px solid black;*/
      background: #C3C6CB;
      margin-left: 2px;
      margin-top: 2px;
      border-left: 1px solid white;
      border-top: 1px solid white;
      border-bottom: 1px solid #94989E;
      border-right: 1px solid #94989E;
    }

    .myForm{
      display: block;
    }

    #formId{
      display: inline-block;
    }

    #pseudo{
      margin-left: 90px;
    }

    #titreP{
      margin-top: 50px;
      margin-left: 155px;
    }

    #titreM{
      margin-left: 140px;
    }

    #mdp{
      margin-left: 90px;
    }
    #bouton{
      margin-left: 150px;
      margin-top: 20px;
    }

    #inscrit{
      margin-left: 140px;
    }
    .plam{
      display: inline-block;
    }
    #plamG{
      margin-left: 195px;
    }
    </style>
  </head>
  <body>
      <img id="plamG" class="plam" width="250px" src="plamTree.png"/>
      <div class="plam" id="mesBorder">
        <div id="contenant">
          <form id="formId" action="connection.php" method="post">
            <img src="simplo.png"/>
            <p class="myForm" id="titreP">Pseudo</p>
            <input class="myForm" id="pseudo" type="text" name="pseudo"></input>
            <p class="myForm" id="titreM">P@ssW0rd</p>
            <input class="myForm" id="mdp" type="password" name="mdp"></input>
            <button class="myForm" id="bouton" type="submit">SURF!</button>
          </form>

          <a id="inscrit"class="myForm" href="simploCrea.php">Inscription</a>
        </div>
      </div>
      <img class="plam" width="250px" src="plamTreeM.png"/>
  </body>
</html>
