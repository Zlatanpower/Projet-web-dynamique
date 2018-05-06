<?php
include ('session.php');
include ('function.php');
$conn = connectMysql();

//$req = mysqli_query($conn,"select * FROM utilisateur WHERE user_ID = ".$_SESSION["user_ID"]) or die(mysqli_error());
$req = mysqli_query($conn,"select * FROM utilisateur2 WHERE login = '".$_SESSION["login"]."'") or die(mysqli_error());
$data = mysqli_fetch_array($req);
$profile_pic = $data['photo_auteur'];
$cover_pic = $data['image_fond'];
$repertoire = "Icones/";
?>
<html lang="en">
<head>
  <title>The Workflow Media</title>
  <link rel="icon" type="image/png" href="Icones/iconelogo.png" width="50" height="16" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set black background color, white text and some padding */
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
        <li class="active"><a href="Accueil_membre.php"><img src="Icones/accueil.ico" alt="Accueil"> Accueil </a></li>
        <li><a href="Profil_membre.php"><img src="Icones/profil.ico" alt="Mon Profil"> Mon Profil </a></li>
        <li><a href="Reseau_membre.php"><img src="Icones/reseau.ico" alt="Mon Réseau"> Mon Réseau </a></li>
        <li><a href="Notification_membre.php"><img src="Icones/notification.ico" alt="Notifications"> Notifications </a></li>
        <li><a href="emploi_membre.php"><img src="Icones/emploi.ico" alt="Emplois"> Emplois </a></li>
        <li><a href="Messages_membres.php"><img src="Icones/message.ico" alt="Messages"> Messages </a></li>
        <li><a href="logout.php"><img src="Icones/deco.ico" alt="Se déconnecter"> Se déconnecter </a></li>
      </ul>
      </div>
      </div>
      </nav>

      <div class="container col-sm-1"></div>
      <div class="container col-lg-10 text-center">
      <div class="row">
      <div class="col-sm-3 well">
      <div class="panel panel-primary text-center">
        <div class="panel-heading"> <a href="Profil.php" style="color: white">
          <?php

          //$req = mysqli_query($db,$sql1);

          $sql1 = "SELECT prenom,nom  FROM utilisateur2 WHERE login = '$user_check'";
          $result1 = mysqli_query($db,$sql1);
      while ($data = mysqli_fetch_assoc($result1)) {
      echo "" . $data['prenom'];
      echo " " . $data['nom'] ;
      }
          ?>
         </a> </div>
          <div class="panel-body">
        <img  class="img" src="<?php echo $repertoire.$profile_pic; ?>" alt="photo_auteur" width="65" height="80"/>
      </div>
      </div>
      <div class="panel panel-primary text-center">
        <div class="panel-heading"> <a href="Profil.php" style="color: white"> Description </a> </div>
          <div class="panel-body">
            <?php
                $query = "SELECT description FROM utilisateur2 WHERE login = '$user_check'";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results

                      echo $row['description'];
                }
                ?>
      </div>
      </div>
      <div class="panel panel-primary text-center">
        <div class="panel-heading" > <a href="Reseau.php" style="color: white">Vos Relations</a> </div>
          <div class="panel-body text-left">
            <div class="row">
              <?php
              //$query = "SELECT * FROM utilisateur2";
              $query = "SELECT * FROM utilisateur2 INNER JOIN réseau ON utilisateur2.id_auteur = réseau.id_reseau";
              $result = mysqli_query($conn, $query);

              while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results

                  if($_SESSION['id_auteur']==$row['id_auteur_reseau'])
                  {
                      echo " <img class='img'  src=". $repertoire.$row['photo_auteur'] ." alt='photo_auteur' width='55' height='55'/>" . " " . $row['prenom'] . " " . $row['nom'] . "</br>";

                  }
              }
              ?>

      </div>
      </div>
      </div>



      </div>
      <div class="col-sm-7">

      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary text-center">
            <div class="panel-heading">Partagez un message, une photo, une vidéo, un lien</div>

              <div class="panel-body">
                <div class="row">
              <!--<button type="button" class="btn btn-primary">
                <img src="Icones/ecrire.ico" alt="Ecrire un message">
                Ecrire
              </button>
              <button type="button" class="btn btn-primary">
                <img src="Icones/image.ico" alt="Poster une photo">
                Photo
              </button>
              <button type="button" class="btn btn-primary">
                <img src="Icones/video.ico" alt="Poster une vidéo">
                Vidéo
              </button>
              <button type="button" class="btn btn-primary">
                <img src="Icones/link.ico" alt="Poster un lien">
                Lien
              </button>
              <button type="button" class="btn btn-primary">
                <img src="Icones/event.ico" alt="Créer un évènement">
                Évènement
              </button>//-->
              <a href="Accueil_post_membre.php" class="boutonevent" ><button type="button" class="btn btn-primary">
                <img src="Icones/ecrire.ico" alt="Ecrire un post">
                Ecrire un post
              </button></a>
              <a href="Accueil_videos_membre.php" class="boutonevent" ><button type="button" class="btn btn-primary">
                <img src="Icones/video.ico" alt="Poster une vidéo">
                Poster une vidéo
              </button></a>
              <a href="Accueil_evenements_membre.php" class="boutonevent" ><button type="button" class="btn btn-primary">
                <img src="Icones/event.ico" alt="Créer un évènement">
                Évènement
              </button></a>
              <a href="Accueil_photos_membre.php" class="boutonevent" ><button type="button" class="btn btn-primary">
                <img src="Icones/image.ico" alt="Poster une photo">
                Ajouter une photo
              </button></a>
              <form action="Post_creation.php" method="post">
              <div class="form-group">
                <label for="texte_post">Texte du post:</label>
                <input type="text" class="form-control" name="texte_post" placeholder="Texte" required>
              </div>
            </br>
            <p class="accueil_boutons">
              <button type="submit" class="btn btn-default">Poster</button> </p>
            </form>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="col-sm-12 well">
      <div class="row">
            <div class="panel panel-primary text-center">
              <div class="panel-heading">Évènements</div>
                <div class="panel-body">
                  <?php
                      $query = "SELECT * FROM evenement";
                      $result = mysqli_query($conn, $query);

                      echo "<table>";?>



                      <?php
                      while($row = mysqli_fetch_array($result)){
                      $id_evenement=$row['id_evenement'];
                      ?>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10 well">
                        <div class="panel panel-info text-center">
                          <div class="panel-heading">Évènement de <?php echo $row['Nom'];?></div>
                            <div class="panel-body">
                      <div class="panel panel-success text-center">
                        <div class="panel-heading">Nom de l'évènement</div>
                          <div class="panel-body">
                            <?php echo $row['nom_evenement'];?>
                          </div>
                          </div>
                          <div class="panel panel-success text-center">
                            <div class="panel-heading">Date et Heure</div>
                              <div class="panel-body">
                                <?php echo $row['date_evenement']. "&nbsp;" . $row['heure_evenement'];?>
                              </div>
                              </div>
                              <div class="panel panel-success text-center">
                                <div class="panel-heading">Lieu</div>
                                  <div class="panel-body">
                                    <?php echo $row['lieu_evenement'];?>
                                  </div>
                                  </div>
                                </div>
                        </div>
                      </div>


                    Commenter cet évènement :   <form action="Commentaire_event.php" method="post"> <input type="text" name="coommentaire" placeholder="Votre commentaire" required> <input type="hidden" name="id" value="<?php echo $id_evenement; ?>">
                    <input type="submit" name="Envoyer" value= "Envoyer"> </form> <br><br><?php
                  $query2 = "SELECT * FROM commentaire_evenement WHERE id_evenement = "."'$id_evenement'";
                  $result2 = mysqli_query($conn, $query2);
                  while($row2 = mysqli_fetch_array($result2)){
                    if($row2['id_evenement'] == $row['id_evenement']){?>
                    <div class="well text-center">
                      <div class="panel panel-info text-center">
                        <div class="panel-heading"><?php echo "</br> Commentaire de : ".$row2['Prenom'] . "&nbsp;" . $row2['Nom'];?></div>
                          <div class="panel-body">
                          <?php echo "</br>". $row2['commentaire'];?>
                      </div>
                    </div>
                  </div>
                      <?php
                    }  }
                    }
                      echo "</table>";
                      ?>


              </div>
            </div>

      </div>

      <div class="row">
        <div class="col-sm-12">

            <p><?php
            $query = "SELECT * FROM photo INNER JOIN réseau ON photo.id_auteur_photo = réseau.id_reseau";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results

                if($_SESSION['id_auteur']==$row['id_auteur_reseau'])
                {
                  //echo "<td>";
                  ?>
                  <div class="panel panel-primary text-center">
                    <div class="panel-heading">Photo publiée par <?php
                    $id=$row['id_photo'];
                    echo $row['photo_auteur']; ?> </div>
                      <div class="panel-body">
                  <img src="<?php echo $row['photo'];?>" width="300">
                  <br><br>
                  Lieu :
                 <?php  echo "<td>";
                  echo $row['lieu_photo'];
                  ?>
                  Date :
                  <?php
                  echo "<td>";
                  echo $row['date_photo'];
                  ?>
                  Heure :
                  <?php
                  echo "<td>";
                  echo $row['heure_photo'];
                  ?>
                  Ressenti :
                  <?php
                  echo "<td>";
                  echo $row['ressenti_photo'];
                  ?>
                  Activité :
                  <?php
                  echo "<td>";
                  echo $row['activite_photo'];
                  echo "<tr>";
                  ?></div>
                </div>

                Commenter cette photo :   <form action="Commentaire_photo.php" method="post"> <input type="text" name="coommentaire" placeholder="Votre commentaire" required> <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="Envoyer" value= "Envoyer"> </form> <br><br><?php
              $query2 = "SELECT * FROM commentaire_photo WHERE id_photo = "."'$id'";
              $result2 = mysqli_query($conn, $query2);
              while($row2 = mysqli_fetch_array($result2)){
                if($row2['id_photo'] == $row['id_photo']){?>
                <div class="well text-center">
                  <div class="panel panel-info text-center">
                    <div class="panel-heading"><?php echo "</br> Commentaire de : ".$row2['Prenom'] . "&nbsp;" . $row2['Nom'];?></div>
                      <div class="panel-body">
                      <?php echo "</br>". $row2['commentaire'];?>
                  </div>
                </div>
              </div>
                  <?php
                }  }
                }
            } ?></p>


      </div>
    </div>
      <div class="col-sm-12">
        <div class="well">
          <?php
              $query = "SELECT * FROM post INNER JOIN réseau ON post.id_auteur_post = réseau.id_reseau ";
              $result = mysqli_query($conn, $query);

              echo "<table>"; // start a table tag in the HTML


              while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results

                if($_SESSION['id_auteur']==$row['id_auteur_reseau'])
                {
                  $id=$row['id_post'];
                  ?><div class="panel panel-primary text-center">
                    <div class="panel-heading">Publication de <?php echo $row['Nom']; ?></div>
                    <div class="panel-body">  <?php echo $row ['texte_post']; ?>

                    </div>
                </div>

                Commenter cette publication :   <form action="Commentaire_publication.php" method="post"> <input type="text" name="coommentaire" placeholder="Votre commentaire" required> <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="Envoyer" value= "Envoyer"> </form> <br><br><?php
              $query2 = "SELECT * FROM commentaire_publication WHERE id_post = "."'$id'";
              $result2 = mysqli_query($conn, $query2);
              while($row2 = mysqli_fetch_array($result2)){
                if($row2['id_post'] == $row['id_post']){?>
                <div class="well text-center">
                  <div class="panel panel-info text-center">
                    <div class="panel-heading"><?php echo "</br> Commentaire de : ".$row2['Prenom'] . "&nbsp;" . $row2['Nom'];?></div>
                      <div class="panel-body">
                      <?php echo "</br>". $row2['commentaire'];?>
                  </div>
                </div>
              </div>
                  <?php
                }  }
              }
            }
              echo "</table>";
              ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">

            <p><?php
            $query = "SELECT * FROM video INNER JOIN réseau ON video.id_auteur_video = réseau.id_reseau";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)){

                if($_SESSION['id_auteur']==$row['id_auteur_reseau'])
                {

                  ?>
                  <div class="panel panel-primary text-center">
                    <div class="panel-heading">Vidéo publiée par <?php
                    $id=$row['id_video'];
                    echo $row['video_auteur']; ?> </div>
                      <div class="panel-body">
                <iframe class="embed-responsive-item" src="<?php echo $row['video'];?>" style="width:200px;height:200px;"> </iframe>
                  <br><br>
                  Lieu :
                 <?php  echo "<td>";
                  echo $row['lieu_video'];
                  ?>
                  Date :
                  <?php
                  echo "<td>";
                  echo $row['date_video'];
                  ?>
                  Heure :
                  <?php
                  echo "<td>";
                  echo $row['heure_video'];
                  ?>
                  Ressenti :
                  <?php
                  echo "<td>";
                  echo $row['ressenti_video'];
                  ?>
                  Activité :
                  <?php
                  echo "<td>";
                  echo $row['activite_video'];
                  echo "<tr>";
                  ?></div>
                </div>

        <?php

              while($row2 = mysqli_fetch_array($result2)){
                if($row2['id_photo'] == $row['id_photo']){?>

                  <?php
                }  }
                }
            } ?></p>


      </div>
    </div>
    </div>
    </div>
    <div class="col-sm-2 well">
      <div class="thumbnail">
        <p><strong>Paris</strong></p>
        <?php
        setlocale(LC_TIME, 'fr_FR.utf8','fra');
        echo strftime('%A %d %B %Y, %H:%M'); ?>

      </div>
      <div class="well">
        Faites des dons
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
</div>
<footer class="container-fluid text-center">
  <p>The Workflow Media © 2018 | Tous droits réservés</p>
</footer>

</body>
</html>
