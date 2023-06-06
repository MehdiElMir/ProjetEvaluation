<?php 

   // Connexion à la base de données
   include 'config.php';
  
   // Récupérer des informations d'authentification de l'utilisateur
   $admin_email = $_POST['email'];
   $admin_password = $_POST['password'];
   
   // lancer la requête SQL dans la table admin 
   $sql=mysqli_query($connexion,"SELECT * FROM `admin` where `admin_email`='$admin_email' and `admin_password`='$admin_password'");
   $row  = mysqli_fetch_array($sql);
   
   
   // Vérification du résultat
   if (is_array($row)) {
       // si valide, on crée une session
       session_start();
       $_SESSION["id_admin"] = $row['id_admin'];
       $_SESSION["admin_Lname"]=$row['admin_Lname'];
       // Redirection vers la page d'accueil 
       header('Location: ../admin/pages/enquetes.php');
   } else {

       // pas de résultat
       echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect.");</script>';
   }
   
   ?>