<?php
function connectMysql(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web dynamique";


$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}


// Make $dbname the current database
$db_selected = mysqli_select_db($conn, $dbname);
mysqli_set_charset( $conn, 'utf8'); //Prise en compte de l'encodage UTF-8

    /*
if (!$db_selected) {
  // If we couldn't, then it either doesn't exist, or we can't see it.
  $sql = 'CREATE DATABASE '. $dbname;

  if (mysqli_query($conn, $sql)) {
      echo "Database my_db created successfully\n";
  }
    else {
      echo 'Error creating database: ' . mysqli_error() . "\n";
  }
}
$sql = "CREATE TABLE IF NOT EXISTS profile
(
    Email varchar(100) NOT NULL PRIMARY KEY,
    First_Name varchar(30) NOT NULL,
    Last_Name varchar(30) NOT NULL,
    Birthday varchar(30) NOT NULL,
    Gender varchar(30) NOT NULL,
    Password varchar(30) NOT NULL,
    Profile_Pic TEXT,
    Cover_Pic TEXT
)";
if (mysqli_query($conn, $sql)) {
    //echo "Tables created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
*/
return $conn;
}
?>
