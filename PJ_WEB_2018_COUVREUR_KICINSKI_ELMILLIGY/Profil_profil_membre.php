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
        <li><a href="Accueil_membre.php"><img src="Icones/accueil.ico" alt="Accueil"> Accueil </a></li>
        <li class="active"><a href="Profil_membre.php"><img src="Icones/profil.ico" alt="Mon Profil"> Mon Profil </a></li>
        <li><a href="Reseau_membre.php"><img src="Icones/reseau.ico" alt="Mon Réseau"> Mon Réseau </a></li>
        <li><a href="Notification_membre.php"><img src="Icones/notification.ico" alt="Notifications"> Notifications </a></li>
        <li><a href="emploi_membre.php"><img src="Icones/emploi.ico" alt="Emplois"> Emplois </a></li>
        <li><a href="Messages_membre.php"><img src="Icones/message.ico" alt="Messages"> Messages </a></li>
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
            <a href="Profil_fond_membre.php" class="boutonevent" ><button type="button" class="btn btn-primary">
              Changer d'image de fond
            </button></a>
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
            <form action="Profil_changement.php" method="post" >
               <input type="file" name="photo_profil"/>
               <button type="submit" class="btn btn-primary">
                 Mettre à jour
               </button>
            </form>
        </div>
      </div>
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
