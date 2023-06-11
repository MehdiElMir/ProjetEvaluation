<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>admin - dashboard</title>
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/questionnaire.css">
    <link rel="stylesheet" href="../css/enquete.css">
    <link rel="stylesheet" href="../css/archive.css">
    <link rel="stylesheet" href="../css/statistiques.css">
</head>
<body>
<?php include '../doc/Layout/body.php'; ?>
    <header>
        <nav class="p-3 shadow-lg navbar">
            <a href="/">
                <img src="../assets/logo.png" alt="logo mundiapolis" class="img-size">
            </a>
        </nav>
    </header>


    <!-- MAIN CONTENT -->
    <main class="main">
        <div class="sidebar">
            <div class="sidebar-top">
                <ul class="sidebar-list">
                    <li><a href="/ProjetEvaluation-2/ProjectEvaluationEtudes/admin/pages/enquetes.php">Les Enquêtes</a></li>
                    <li><a href="/ProjetEvaluation-2/ProjectEvaluationEtudes/admin/pages/enseignants.php">Les Actions</a></li>
                    <li><a href="/ProjetEvaluation-2/ProjectEvaluationEtudes/admin/pages/questionnaire.php">Les Questions</a></li>
                    <li><a href="/ProjetEvaluation-2/ProjectEvaluationEtudes/admin/pages/student.php">Les Etudiants</a></li>
                    <li><a href="/ProjetEvaluation-2/ProjectEvaluationEtudes/admin/pages/classe.php">Les Classes</a></li>
                    <li><a href="/ProjetEvaluation-2/ProjectEvaluationEtudes/admin/pages/professeurs.php">Les professeurs</a></li>          
                    <li><a href="/ProjetEvaluation-2/ProjectEvaluationEtudes/admin/pages/archive.php">Archives</a></li>
                    <li><a href="/ProjetEvaluation-2/ProjectEvaluationEtudes/admin/" id="logout-link">Logout</a></li>

                </ul>
            </div>

        </div>
 <script>   
        // Récupérez l'élément "Logout" en utilisant son identifiant
var logoutLink = document.getElementById("logout-link");

// Ajoutez un écouteur d'événement de clic sur le lien
logoutLink.addEventListener("click", function(event) {
    event.preventDefault();
    window.location.href = "/ProjetEvaluation-2/ProjectEvaluationEtudes/admin/";
});
</script>