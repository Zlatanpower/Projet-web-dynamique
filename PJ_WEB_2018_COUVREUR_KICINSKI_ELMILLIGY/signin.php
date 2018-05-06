<?php

include ('function.php');


//ouverture base de données puis instanciation de variables
$conn = connectMysql();
$prenom = $conn->real_escape_string($_POST['prenom']);
$nom = $conn->real_escape_string($_POST['nom']);
$email = $conn->real_escape_string($_POST['login']);
$mdp =  $conn->real_escape_string($_POST['mdp']);


//$time=time(); //variable du temps

  //  $password = crypt($password,'st'); //On crypte le mot de passe dans la BDD

    $sql = "INSERT INTO utilisateur2 (login, prenom,nom,mdp, image_fond, photo_auteur,type_utilisateur)
    VALUES ('$email', '$prenom', '$nom', '$mdp', 'default_cover_pic.jpg', 'profile.jpg', 'Membre')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("location: Accueil_membre.php");
    $conn->close();
?>
