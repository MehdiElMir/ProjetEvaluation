<?php

// Connexion à la base de données
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

// Récupérer des informations d'authentification de l'utilisateur
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Échapper les valeurs pour éviter les attaques par injection SQL
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

// Lancer la requête SQL dans la table student
$requete = "SELECT * FROM student WHERE student_email = '$email' AND student_password = '$password'";
$resultat = $conn->query($requete);

// Vérification du résultat
if ($resultat === false) {
    // Erreur de requête SQL
    echo "Erreur de requête : " . $conn->error;
} elseif ($resultat->num_rows == 1) {
    // Si valide, on crée une session
    session_start();
    $row = $resultat->fetch_assoc();
    $_SESSION["id_student"] = $row['id_student'];
    $_SESSION["name"] = $row['name'];
    // Redirection vers la page d'accueil
    header('Location: reponse.php');
    exit();
} else {
    // Pas de résultat
    echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect.");</script>';
}

?>
