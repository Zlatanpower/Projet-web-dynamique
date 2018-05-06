<?php
   include('config.php');

   session_start();

   $user_check = $_SESSION['login'];
   $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
   $nom = isset($_POST["nom"])? $_POST["nom"] : "";

   $ses_sql = mysqli_query($db,"select login from utilisateur2 where login = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['login'];

   if(!isset($_SESSION['login'])){
      header("location:Connexion.html");
   }
?>
