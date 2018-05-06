<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Messages</title>
  <link rel="icon" type="image/png" href="Icones/iconelogo.png" width="50" height="16" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
          <li ><a href="#"><img src="Icones/accueil.ico" alt="Accueil"> Accueil </a></li>
          <li><a href="Profil_membre.php"><img src="Icones/profil.ico" alt="Mon Profil"> Mon Profil </a></li>
          <li><a href="Reseau_membre.php"><img src="Icones/reseau.ico" alt="Mon Réseau"> Mon Réseau </a></li>
          <li><a href="Notification_membre.php"><img src="Icones/notification.ico" alt="Notifications"> Notifications </a></li>
          <li><a href="emploi_membre.php"><img src="Icones/emploi.ico" alt="Emplois"> Emplois </a></li>
          <li class="active"><a href="Messages_membres.php"><img src="Icones/message.ico" alt="Messages"> Messages </a></li>
          <li><a href="logout.php"><img src="Icones/deco.ico" alt="Se déconnecter"> Se déconnecter </a></li>
        </ul>
      </div>
    </div>
  </nav>

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


            <div class="profil_description">
        <div class="row">
            <div class="col-xs-3">
            </div>

            <div class="col-xs-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">Mes messages</div>
                  <div class="panel-body" align="center">

                    <div class="col-sm-12">
                      <div class="well">

                      <section style="margin-left:50px;">

<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost; dbname=web dynamique;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

    $reponse = $bdd->query('SELECT * FROM chat INNER JOIN utilisateur2 ON utilisateur2.id_auteur = chat.id_envoyeur');


while ($donnees = $reponse->fetch())
{

    echo '<div><strong>' . htmlspecialchars($donnees['prenom']) . " " . htmlspecialchars($donnees['nom']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</div><br>';
}

$reponse->closeCursor();

?>

    <style>
    form
    {
        text-align:center;
    }
    </style>

    <form action="Messages_post.php" method="post">
        <div>
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
    </div>
    </form>

</section>
                  </div>
              </div>
  </div>
  </div>


        </div>
    </div>



</body>
</html>
