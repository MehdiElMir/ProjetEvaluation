<?php include "../includes/layout.php" ?>


<?php

$servername = 'localhost';
$username = 'root';
$database_name ='projet_evaluation';
$password = '';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connexion établie";
}


$id_class = $_GET["id"];

$sql = "DELETE FROM `class` WHERE id_class = $id_class";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: classe.php?msg=classe supprimer");
} else {
  echo "Failed: " . mysqli_error($conn);
}




?>