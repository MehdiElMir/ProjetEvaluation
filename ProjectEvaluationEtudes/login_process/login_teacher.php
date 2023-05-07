<?php 
   
   // Connexion à la base de données
   include 'config.php';
 
   
   // Récupérer des informations d'authentification de l'utilisateur
   $professor_email = $_POST['email'];
   $professor_password = $_POST['password'];
   $professor_Lname= $_POST['professor_Lname'];

 
   
   // lancer la requête SQL dans la table admin 
   $sql =mysqli_query($connexion, "SELECT * FROM `professeur` WHERE `professor_email` = '$professor_email' AND `professor_password` = '$professor_password'");
   $row = mysqli_fetch_array($sql);
   
   /*$sql1=mysqli_query($connexion,
   "SELECT subject_name from subject , professeur 
   WHERE professeur.id_professeur = subject.professeur_id");
*/

   // Vérification du résultat

   if (is_array($row)) {
    // si valide, on crée une session
    session_start();
    $_SESSION["id_professeur"] = $row['id_professeur'];
    $_SESSION["professor_Lname"]=$row['professor_Lname'];
    // Redirection vers la page d'accueil 
    header('Location: ../prof_layout.php');
}
   else {
       // pas de résultat
       echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect.");</script>';
   }


