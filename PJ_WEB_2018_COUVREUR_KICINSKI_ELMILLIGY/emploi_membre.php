<!DOCTYPE html>
<?php
include ('session.php');
include ('function.php');

$conn = connectMysql();

$req = mysqli_query($conn,"select * FROM utilisateur2 WHERE login = '".$_SESSION["login"]."'") or die(mysqli_error());
$data = mysqli_fetch_array($req);
$profile_pic = $data['photo_auteur'];
$cover_pic = $data['image_fond'];
$repertoire = "Icones/";
  ?>
<html lang="en">
<head>
  <title>Offres d'emplois</title>
  <link rel="icon" type="image/png" href="Icones/iconelogo.png" width="50" height="16" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    footer {
      background-color: #505050;
      color: white;
      padding: 15px;
    }

    couverture {
      padding-left: 20%;
      padding-right: 30px;
      color: aqua;

    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" ><img src="Icones/logo.png" width="125" height="50" align="middle" alt="Accueil"> </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <form class="navbar-form navbar-left" role="search"></br>
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Rechercher...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
      </form>
      <ul class="nav navbar-nav" >
        <li><a href="Accueil_membre.php"><img src="Icones/accueil.ico" alt="Accueil"> Accueil </a></li>
        <li><a href="Profil_membre.php"><img src="Icones/profil.ico" alt="Mon Profil"> Mon Profil </a></li>
        <li><a href="Reseau_membre.php"><img src="Icones/reseau.ico" alt="Mon Réseau"> Mon Réseau </a></li>
        <li><a href="Notification_membre.php"><img src="Icones/notification.ico" alt="Notifications"> Notifications </a></li>
        <li class="active"><a href="emploi_membre.php"><img src="Icones/emploi.ico" alt="Emplois"> Emplois </a></li>
        <li><a href="Messages_membres.php"><img src="Icones/message.ico" alt="Messages"> Messages </a></li>
        <li><a href="logout.php"><img src="Icones/deco.ico" alt="Se déconnecter"> Se déconnecter </a></li>
      </ul>
    </div>
  </div>
</nav>

    <br> <br>


<div class="container">
            <div class="row">
              <div class="col-sm-2"> </div>
              <div class="col-sm-9">
                <div class="panel panel-primary">
                  <div class="panel-heading" align="center">Offres</div>
                  <div class="container">
                    <br>
                      <p>
                        <?php
                        try
                        {
                            $bdd = new PDO('mysql:host=localhost; dbname=web dynamique;charset=utf8', 'root', '');
                        }
                        catch(Exception $e)
                        {
                                die('Erreur : '.$e->getMessage());
                        }

                            $reponse = $bdd->query('SELECT * FROM emplois');



                        while ($donnees = $reponse->fetch())
                        {
                            echo '<div><strong>' . htmlspecialchars($donnees['type_offre']) . " " . htmlspecialchars($donnees['nom_offre']) . '</strong> : ' . htmlspecialchars($donnees['descriptif_offre']) . '</div><br>';
                        }

                        $reponse->closeCursor();

                        ?>
                      </p>
                      <br>
                    </div>

                </div>
              </div>

                    </div>
                </div>



                <br> <br>



        <footer class="container-fluid text-center">
        <p>The Workflow Media © | Tous droits reserves</p>
      </footer>

      </body>
      </html>
