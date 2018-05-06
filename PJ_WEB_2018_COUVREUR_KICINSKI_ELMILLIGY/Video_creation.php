<?php

include ('function.php');
include ('session.php');


//ouverture base de données puis instanciation de variables
$conn = connectMysql();
$url = $conn->real_escape_string($_POST['url_video']);
$lieu = $conn->real_escape_string($_POST['lieu_video']);
$date = $conn->real_escape_string($_POST['date_video']);
$heure = $conn->real_escape_string($_POST['heure_video']);
$ressenti =  $conn->real_escape_string($_POST['ressenti_video']);
$activite =  $conn->real_escape_string($_POST['activite_video']);
$id = $_SESSION['id_auteur'];
$nom = $_SESSION['nom'];

//$time=time(); //variable du temps

  //  $password = crypt($password,'st'); //On crypte le mot de passe dans la BDD

    $sql = "INSERT INTO video (id_auteur_video, lieu_video,date_video,heure_video, ressenti_video,activite_video,video,video_auteur)
    VALUES ('$id', '$lieu', '$date', '$heure', '$ressenti','$activite','$url','$nom')";

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
