<!DOCTYPE html>
<?php
        include ('function.php');
        include ('session.php');

       $conn = connectMysql();

        $req = mysqli_query($conn,"select * FROM utilisateur2 WHERE login = '".$_SESSION["login"]."'") or die(mysqli_error());
        $data = mysqli_fetch_array($req);
        $profile_pic = $data['photo_auteur'];
        $cover_pic = $data['image_fond'];
        $repertoire = "Icones/";

        ?>
<html lang="en">
<head>
  <title>Mes notifications</title>
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
        <li><a href="Accueil.php"><img src="Icones/accueil.ico" alt="Accueil"> Accueil </a></li>
        <li><a href="Profil.php"><img src="Icones/profil.ico" alt="Mon Profil"> Mon Profil </a></li>
        <li><a href="Reseau.php"><img src="Icones/reseau.ico" alt="Mon Réseau"> Mon Réseau </a></li>
        <li class="active"><a href="Notification.php"><img src="Icones/notification.ico" alt="Notifications"> Notifications </a></li>
        <li><a href="emploi.php"><img src="Icones/emploi.ico" alt="Emplois"> Emplois </a></li>
        <li><a href="Messages.php"><img src="Icones/message.ico" alt="Messages"> Messages </a></li>
        <li><a href="logout.php"><img src="Icones/deco.ico" alt="Se déconnecter"> Se déconnecter </a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
    <div class="row content">
      <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading" align="center">Profil</div>
            <div class="panel-body" align = "center">
              <img  class="img" src="<?php echo $repertoire.$profile_pic; ?>" alt="photo_auteur" width="150" /></div>
            <div class="panel-footer" align="center">
              <?php
                echo $_SESSION['prenom'] . " " . $_SESSION['nom'];
                ?>
            </div>
          </div>
        </div>


    </div>
</div>

<div class="container-fluid">
    <div class="row content">

    <div class="panel panel-primary">
            <div class="panel-heading" align="center">Evènements à venir de votre réseau</div>

        <div class="col-sm-4"> </div>
          <div class="col-sm-4">
        <div class="well">

          <?php
          $query = "SELECT * FROM evenement INNER JOIN réseau ON evenement.id_auteur_evenement = réseau.id_reseau";
          $result = mysqli_query($conn, $query);

          echo "<table>"; // start a table tag in the HTML
          echo "<tr><th> Nom </th><th> Date </th><th> Heure </th><th> Lieu </th>";

          while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results

            if ($_SESSION['id_auteur']==$row['id_auteur_reseau']) {

      echo "<tr><td>" . $row['nom_evenement'] . "</td> <td>" . $row['date_evenement'] . "</td> </td>" . "</td> <td>" . $row['heure_evenement'] . "</td> <td>" . $row['lieu_evenement'] . "</td></tr>";
              }
          }
          echo "</table>";
          ?>

        </div>
        </div>

        </div>

        </div>

      </div>
    </div>

  <footer class="container-fluid text-center">
        <p>The Workflow Media © | Tous droits reserves</p>
      </footer>

      </body>
      </html>
