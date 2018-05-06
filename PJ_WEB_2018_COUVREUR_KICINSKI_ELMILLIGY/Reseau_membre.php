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
  <title>Reseau</title>
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
      <a class="navbar-brand" href="#" ><img src="Icones/logo2.png" width="125" height="50" align="middle" alt="Accueil"> </a>
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
        <li class="active"><a href="Reseau_membre.php"><img src="Icones/reseau.ico" alt="Mon Réseau"> Mon Réseau </a></li>
        <li><a href="Notification_membre.php"><img src="Icones/notification.ico" alt="Notifications"> Notifications </a></li>
        <li><a href="emploi_membre.php"><img src="Icones/emploi.ico" alt="Emplois"> Emplois </a></li>
        <li><a href="Messages_membres.php"><img src="Icones/message.ico" alt="Messages"> Messages </a></li>
        <li><a href="logout.php"><img src="Icones/deco.ico" alt="Se déconnecter"> Se déconnecter </a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container text-center">
  <div class="row">
    <div class="col-sm-3 well">
      <div class="panel panel-primary text-center">
        <div class="panel-heading"> Mes invitations </div>
          <div class="panel-body" style="max-height: 10;">

 Afficher invitations ici

      </div>
      </div>
    </div>

    <div class="col-sm-7 well">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary text-center">
            <div class="panel-heading">Mon réseau</div>

            <div class="panel-body">
              <div class="row">
                <?php
                $query = "SELECT * FROM utilisateur2 INNER JOIN réseau ON utilisateur2.id_auteur = réseau.id_reseau";
                $result = mysqli_query($conn, $query);


                while($row = mysqli_fetch_array($result)){

                    if($_SESSION['id_auteur']==$row['id_auteur_reseau'])
                    {
                        echo " <img class='img'  src=". $repertoire.$row['photo_auteur'] ." alt='photo_auteur' width='55' height='55'/>" . " " . $row['prenom'] . " " . $row['nom'] . "</br> Description :  </br>" . $row['Description']. "</br></br>";

                    }
                }
                ?>

          </div>
          </div>
          </div>
        </div>
      </div>


    </div>
    <div class="col-sm-2 well">
      <p><strong>Paris</strong></p>
      <?php
      setlocale(LC_TIME, 'fr_FR.utf8','fra');
      echo strftime('%A %d %B %Y, %H:%M'); ?>

    </div>
  </div>
</div>


<footer class="container-fluid text-center">
  <p>The Workflow Media © 2018 | Tous droits réservés</p>
</footer>

</body>
</html>
