<?php
include ('function.php');
include ('session.php');
$conn = connectMysql();
$commentairee = $conn->real_escape_string($_POST['coommentaire']);
$id_evenement = $conn->real_escape_string($_POST['id']);
$id_auteur = $_SESSION['id_auteur'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$sql = "INSERT INTO commentaire_evenement (id_evenement, id_auteur_commentaire, commentaire, nom, prenom)
VALUES ('$id_evenement', '$id_auteur', '$commentairee', '$nom', '$prenom')";

if ($conn->query($sql) === TRUE) {
    header("location: Accueil.php");
} else {

    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
