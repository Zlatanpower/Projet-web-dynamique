<?php

include ('function.php');
include ('session.php');


//ouverture base de données puis instanciation de variables
$conn = connectMysql();
$texte = $conn->real_escape_string($_POST['texte_post']);
$id = $_SESSION['id_auteur'];
$nom = $_SESSION['nom'];

//$time=time(); //variable du temps

  //  $password = crypt($password,'st'); //On crypte le mot de passe dans la BDD

    $sql = "INSERT INTO post (id_auteur_post, texte_post,Nom)
    VALUES ('$id','$texte', '$nom')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if($_SESSION["type_utilisateur"]=='Membre')
   {header("location: Accueil_membre.php");}
  else {header("location: Accueil.php");}
    $conn->close();
?>
