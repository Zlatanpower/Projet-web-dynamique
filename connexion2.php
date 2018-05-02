<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['login']);
      $mypassword = mysqli_real_escape_string($db,$_POST['mdp']);

      $sql = "SELECT id_auteur FROM utilisateur WHERE login = '$myusername' and mdp = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login'] = $myusername;

         header("location: Accueil.php");
      }else {
        header("location: connexion2.php");
      }
   }
?>

<html lang="fr">
<head>
  <title>The workflow media</title>
  <meta charset="utf-8">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    section {
      border: 3px rgb(229, 159, 101) solid;
      border-radius: 5px;
      padding-left: 170px;
      padding-top: 10px;
      /*background-color: rgb(229, 159, 101);*/
    }
  </style>
</head>
<body>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <p class="accueil_titres">Membres</p>
          <div class="row">
          <div class="col-lg-6">
            <form action="" method="post">
            <form>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="e-mail" name="login">
              </div>
              <div class="form-group">
                <label for="mdp">Mot de passe:</label>
                <input type="password" class="form-control" id="mdp" placeholder="mot de passe" name="mdp">
              </div>
            </br>
            <p class="accueil_boutons">
              <button type="submit" class="btn btn-default">Connexion</button> </p>
            </form>
            </form>
            <div class="alert alert-danger">
  <strong>Erreur!</strong> Login et/ou mot de passe invalide.
</div>
          </div>
        </div>
      </div>



      <div class="col-lg-6">
        <p class="accueil_titres">Inscription</p>
        <div class="row">
          <div class="col-lg-6">
            <form>
              <div class="form-group">
                <label for="prenom">Prenom:</label>
                <input type="prenom" class="form-control" id="prenom" placeholder="prenom">
              </div>
              <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="nom" class="form-control" id="nom" placeholder="nom">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="e-mail">
              </div>
              <div class="form-group">
                <label for="mdp">Mot de passe:</label>
                <input type="password" class="form-control" id="mdp" placeholder="mot de passe">
              </div>
            </br>
            <p class="accueil_boutons">
              <button type="submit" class="btn btn-default">Inscription</button> </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
  </body>
</html>
