<?php

include ('function.php');
include ('session.php');


//ouverture base de données puis instanciation de variables
$conn = connectMysql();
$lieu = $conn->real_escape_string($_POST['lieu_photo']);
$date = $conn->real_escape_string($_POST['date_photo']);
$heure = $conn->real_escape_string($_POST['heure_photo']);
$ressenti =  $conn->real_escape_string($_POST['ressenti_photo']);
$activite =  $conn->real_escape_string($_POST['activite_photo']);
$id = $_SESSION['id_auteur'];
$nom = $_SESSION['nom'];
$photo1 = $conn->real_escape_string($_POST['image']);
$photo2 = 'Icones/'.$photo1;

//$time=time(); //variable du temps

  //  $password = crypt($password,'st'); //On crypte le mot de passe dans la BDD

    $sql = "INSERT INTO photo (id_auteur_photo, lieu_photo,date_photo,heure_photo, ressenti_photo,activite_photo,photo,photo_auteur)
    VALUES ('$id', '$lieu', '$date', '$heure', '$ressenti','$activite','$photo2','$nom')";

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
