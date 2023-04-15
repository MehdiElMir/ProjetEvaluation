<?php 
   
   // Connexion à la base de données
   include 'config.php';
   
   // Récupérer des informations d'authentification de l'utilisateur
   $email = $_POST['email'];
   $password = $_POST['password'];
   
   // lancer la requête SQL dans la table admin 
   $requete = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
   $resultat = mysqli_query($connexion, $requete);
   
   // Vérification du résultat
   if (mysqli_num_rows($resultat) == 1) {
       // si valide, on crée une session
       session_start();
       $_SESSION["id_admin"] = $row['id_admin'];
       $_SESSION["name"]=$row['name'];
       // Redirection vers la page d'accueil 
       header('Location: layout.php');
   } else {
       // pas de résultat
       echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect.");</script>';
   }
   ?>

