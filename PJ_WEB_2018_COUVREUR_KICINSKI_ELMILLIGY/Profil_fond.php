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
  <title>Mon Profil</title>
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
        <li class="active"><a href="Profil.php"><img src="Icones/profil.ico" alt="Mon Profil"> Mon Profil </a></li>
        <li><a href="Reseau.php"><img src="Icones/reseau.ico" alt="Mon Réseau"> Mon Réseau </a></li>
        <li><a href="Notification.php"><img src="Icones/notification.ico" alt="Notifications"> Notifications </a></li>
        <li><a href="emploi.php"><img src="Icones/emploi.ico" alt="Emplois"> Emplois </a></li>
        <li><a href="Messages.php"><img src="Icones/message.ico" alt="Messages"> Messages </a></li>
        <li><a href="logout.php"><img src="Icones/deco.ico" alt="Se déconnecter"> Se déconnecter </a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="couverture">
    <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading" align="center">Photo de couverture</div>
            <div class="panel-body"><img id="couverture" class="col-sm-10" src="<?php echo $repertoire.$cover_pic; ?>" alt="Image_fond" width="auto" height="350"/></div>
            <a href="Profil_fond.php" class="boutonevent" ><button type="button" class="btn btn-primary">
              Changer d'image de fond
            </button></a>
            <form action="Profil_fond_changement.php" method="post" >
               <input type="file" name="photo_profil"/>
               <button type="submit" class="btn btn-primary">
                 Mettre à jour
               </button>
            </form>
          </div>
        </div>
    </div>
</div>
<div class="col-sm-12 well">
<div class="profil_description">
    <div class="row">
      <div class="col-sm-1">
      </div>
        <div class="col-sm-5">
          <div class="col-sm-5">
          <div class="panel panel-primary">
            <div class="panel-heading">Photo de profil</div>
            <div class="panel-body" align = "center">
              <img  class="img-responsive" src="<?php echo $repertoire.$profile_pic; ?>" alt="photo_auteur" width="200"/></div>
              <a href="Profil_profil.php" class="boutonevent" ><button type="button" class="btn btn-primary">
                Changer de photo de profil
              </button></a>
          </div>
        </div>
      </div>

        <div class="col-sm-5">
          <div class="panel panel-primary text-center">
            <div class="panel-heading">
              Inscription (droit Administrateur)
            </div>
            <div class="panel-body text-center">

                <form action="signin.php" method="post">
                  <form>
                <div class="form-group">
                  <label for="prenom">Prenom:</label>
                  <input type="text" class="form-control" name="prenom" placeholder="prenom" required>
                </div>
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" name="nom" placeholder="nom" required>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" name="login" placeholder="e-mail" required>
                </div>
                <div class="form-group">
                  <label for="mdp">Mot de passe:</label>
                  <input type="password" class="form-control" name="mdp" placeholder="mot de passe" required>
                </div>
              </br>
              <p class="accueil_boutons">
                <button type="submit" class="btn btn-default">Inscription</button> </p>
              </form>
              </form>
            </div>

        </div>
          </div>
<div class="col-sm-3">
</div>
          <div class="col-sm-6">
            <div class="panel panel-primary text-center">
              <div class="panel-heading">
                Actions Administrateur
              </div>
              <div class="panel-body">

              <?php

              $query = "SELECT * FROM utilisateur2";
              $result = mysqli_query($conn, $query    );

              echo "<form  method='post'>";
              echo "<table>";
              echo "<tr><th>Choix</th><th>Prénom</th><th>Nom</th><th>Email</th><th>Type</th></tr>";

              while($row = mysqli_fetch_array($result)){

              echo "<tr><td><input type='checkbox' name='check_list2[]'" . " value=".$row['id_auteur']."></td>";
              echo "<td>" . $row['id_auteur'] . "</td> <td>" . $row['prenom'] . "</td> </td>" . "</td> <td>" . $row['nom'] . "</td> <td>" . $row['login'] . "</td> <td>" . $row['type_utilisateur'] . "</td></tr>";
              }

              echo "</table>";
              ?>
            </div>
              <br>
              <input type="submit" name="Choisir_Administrateur" value="Donner droit administrateur">
              <input type="submit" name="Enlever_Administrateur" value="Enlever droit administrateur">
              <input type="submit" name="Supprimer" value="Supprimer un membre">


              <?php
              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  if (isset($_POST['Choisir_Administrateur']))
                  {
                      foreach($_POST['check_list2'] as $selected){
                      $query = "UPDATE utilisateur2
                              SET type_utilisateur = 'Administrateur'
                              WHERE id_auteur = " . $selected;

                      $result = mysqli_query($conn, $query);
                      }
                  }
              else if(isset($_POST['Enlever_Administrateur']))
              {
                  foreach($_POST['check_list2'] as $selected){
                  $query = "UPDATE utilisateur2
                      SET type_utilisateur = 'Membre'
                      WHERE id_auteur = " . $selected;

                  $result = mysqli_query($conn, $query);
                  }
              }
              else if(isset($_POST['Supprimer']))
              {
                  foreach($_POST['check_list2'] as $selected){
                  $query = "DELETE FROM utilisateur2
                          WHERE id_auteur = " . $selected;
                  $result = mysqli_query($conn, $query);
                  }

              }
              }
              ?>
            </div>
              <br>
              <br>

    </div>
</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading" align="center">Vos photos</div>
        <div class="container">

            <section class="row">

<?php

$id = $_SESSION['id_auteur'];
$query= "SELECT * FROM photo WHERE id_auteur_photo = '$id'";
$result = mysqli_query($conn,$query);

echo "<form  method='post'>";
echo "<table>";

while($row = mysqli_fetch_array($result)){

echo "<td>";
echo "<input type='checkbox' name='check_list3[]'" . " value=".$row['id_photo'].">";
?>
<img src="<?php echo $row['photo'];?>" height="100" width="100" >
<?php
}

echo "</table>";  ?>
<br>
<input type="submit" name="Supprimer_photo" value="Supprimer une photo">


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


if(isset($_POST['Supprimer_photo']))
{
    foreach($_POST['check_list3'] as $selected){
    $query = "DELETE FROM photo
            WHERE id_photo = " . $selected;
    $result = mysqli_query($conn, $query);
    }

}
}
?>


            </section>

          </div>
      </div>

    </div>


  </div>
</div><br>

<div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-primary">
          <div class="panel-heading" align="center">Vos vidéos</div>
          <div class="container">

              <section class="row">

                <?php

                $id = $_SESSION['id_auteur'];
                $query= "SELECT * FROM video WHERE id_auteur_video = '$id'";
                $result = mysqli_query($conn,$query);

                echo "<form  method='post'>";
                echo "<table>";

                while($row = mysqli_fetch_array($result)){

                echo "<td>";
                echo "<input type='checkbox' name='check_list3[]'" . " value=".$row['id_video'].">";
                ?>
                <iframe class="embed-responsive-item" src="<?php echo $row['video'];?>" style="width:100px;height:100px;"> </iframe>
                <?php
                }

                echo "</table>";  ?>
                <br>
                <input type="submit" name="Supprimer_video" value="Supprimer une video">


                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {


                if(isset($_POST['Supprimer_video']))
                {
                    foreach($_POST['check_list3'] as $selected){
                    $query = "DELETE FROM video
                            WHERE id_video = " . $selected;
                    $result = mysqli_query($conn, $query);
                    }

                }
                }
                ?>

              </section>

            </div>
        </div>
      </div>
    </div>
  </div><br>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading" align="center">Vos Evenements</div>
        <div class="container">

                    <section class="row">

                      <?php

                      $id = $_SESSION['id_auteur'];

                      $query = "SELECT * FROM evenement WHERE '$id' = id_auteur_evenement ";
                      $result = mysqli_query($conn, $query    );

                      echo "<form  method='post'>";
                      echo "<table>";
                      echo "<tr><th>Choix</th><th>Nom</th><th>Date</th><th>Heure</th><th>Lieu</th></tr>";

                      while($row = mysqli_fetch_array($result)){

                      echo "<tr><td><input type='checkbox' name='check_list2[]'" . " value=".$row['id_evenement']."></td>";
                      echo "<td>" . $row['nom_evenement'] . "</td> <td>" . $row['date_evenement'] . "</td> </td>" . $row['heure_evenement'] . "</td> <td>" . $row['lieu_evenement'] . "</td></tr>";
                      }

                      echo "</table>";
                      ?>
                      <br>
                      <input type="submit" name="Supprimer" value="Supprimer un évènement">


                      <?php
                      if ($_SERVER['REQUEST_METHOD'] === 'POST') {


                      if(isset($_POST['Supprimer']))
                      {
                          foreach($_POST['check_list2'] as $selected){
                          $query = "DELETE FROM evenement
                                  WHERE id_evenement = " . $selected;
                          $result = mysqli_query($conn, $query);
                          }

                      }
                      }
                      ?>

                    </section>
                  </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-primary text-center">
        <div class="panel-heading">Vos publications</div>
        <div class="panel-body">
          <section class="row">

                      <?php

                      $id = $_SESSION['id_auteur'];

                      $query = "SELECT * FROM post WHERE '$id' = id_auteur_post ";
                      $result = mysqli_query($conn, $query    );

                      echo "<form  method='post'>";
                      echo "<table>";
                      echo "<tr><th>Choix</th><th>Texte</th></tr>";

                      while($row = mysqli_fetch_array($result)){

                      echo "<tr><td><input type='checkbox' name='check_list3[]'" . " value=".$row['id_post']."></td>";
                      echo "<td>" . $row['texte_post'] .  "</td></tr>";
                      }

                      echo "</table>";
                      ?>
                      <br>
                      <input type="submit" name="Supprimer3" value="Supprimer un post">


                      <?php
                      if ($_SERVER['REQUEST_METHOD'] === 'POST') {


                      if(isset($_POST['Supprimer3']))
                      {
                          foreach($_POST['check_list3'] as $selected){
                          $query = "DELETE FROM post
                                  WHERE id_post = " . $selected;
                          $result = mysqli_query($conn, $query);
                          }

                      }
                      }
                      ?>
                    </section>
        </div>
      </div>
    </div>
  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <p>The Workflow Media © | Tous droits reserves</p>
</footer>

</body>
</html>
