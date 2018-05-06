<?php

include ('function.php');
include ('session.php');


//ouverture base de données puis instanciation de variables
$conn = connectMysql();
$nom_ev = $conn->real_escape_string($_POST['nom_evenement']);
$lieu = $conn->real_escape_string($_POST['lieu_evenement']);
$date = $conn->real_escape_string($_POST['date_evenement']);
$heure =  $conn->real_escape_string($_POST['heure_evenement']);
$id = $_SESSION['id_auteur'];
$nom = $_SESSION['nom'];

//$time=time(); //variable du temps

  //  $password = crypt($password,'st'); //On crypte le mot de passe dans la BDD

    $sql = "INSERT INTO evenement (id_auteur_evenement, nom_evenement,lieu_evenement,date_evenement, heure_evenement,Nom)
    VALUES ('$id','$nom_ev', '$lieu', '$date', '$heure', '$nom')";

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
