<?php

include ('session.php');
include ('function.php');
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"web dynamique");

$message = $con->real_escape_string($_POST['message']);
$auteur = $_SESSION["id_auteur"];

$sql="INSERT INTO chat (id_envoyeur, message)
    VALUES ('$auteur','$message')";


if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

   if($_SESSION["type_utilisateur"]=='Membre')
  {header("location: Messages_membres.php");}
 else {header("location: Messages.php");}
$con->close();
?>
