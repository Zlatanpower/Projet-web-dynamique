<?php
session_start();
include ('function.php');

$conn = connectMysql();
$email    = $conn->real_escape_string($_POST['login']);
$password   = $conn->real_escape_string($_POST['mdp']);

//$password = crypt($password,'st'); //On crypte le mot de passe dans la BDD

$sql = "SELECT * FROM utilisateur2 WHERE login = '$email' and mdp = '$password'";
$result = $conn->query($sql);
$row_cnt = $result->num_rows;
if($row_cnt == 1){
    while ($donnees = $result->fetch_assoc())
    {
        $_SESSION["nom"] = $donnees["nom"];
        $_SESSION["prenom"] = $donnees["prenom"];
        $_SESSION["login"] = $donnees["login"];
        $_SESSION["id_auteur"] = $donnees["id_auteur"];
        $_SESSION["type_utilisateur"] = $donnees["type_utilisateur"];

    }
    if($_SESSION["type_utilisateur"]=='Administrateur')
    {header("location: Accueil.php");}
    if($_SESSION["type_utilisateur"]=='Membre')
    {header("location: Accueil_membre.php");}

}
else
{
    header("location: connexion2.html");
}
?>
