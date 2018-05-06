<?php

if (!isset($_SESSION))
 {
   session_start();
   echo "Test";
 }
  session_destroy();
  header("Location: Connexion.html");
?>
