<?php

include ('function.php');
include ('session.php');


$conn = connectMysql();
$id = $_SESSION['id_auteur'];
$photo1 = $conn->real_escape_string($_POST['photo_profil']);
$photo2 = $photo1;


    $sql = "UPDATE utilisateur2 SET photo_auteur = '$photo2'
    WHERE $id = id_auteur";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if($_SESSION["type_utilisateur"]=='Membre')
   {header("location: Profil_membre.php");}
  else {header("location: Profil.php");}
    $conn->close();
?>
