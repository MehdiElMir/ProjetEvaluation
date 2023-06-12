
<?php
// config.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_evaluation";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
?>