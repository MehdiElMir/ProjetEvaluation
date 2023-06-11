<?php

include "../includes/layout.php";

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


$id_professeur = $_GET["id"];

$sql = "DELETE FROM `professeur` WHERE id_professeur = $id_professeur";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: professeurs.php?msg=professeur supprimé");
} else {
  echo "Failed: " . mysqli_error($conn);
}




?>