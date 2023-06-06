<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>admin - dashboard</title>
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/questionnaire.css">
    <link rel="stylesheet" href="../css/enquete.css">
    <link rel="stylesheet" href="../css/archive.css">
    <link rel="stylesheet" href="../css/statistiques.css">
</head>
<body>
<?php //include '../doc/Layout/body.php'; ?>
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
                    <li><a href="/ProjectEvaluationEtudes/admin/pages/enquetes.php">Les Enquêtes</a></li>
                    <li><a href="/ProjectEvaluationEtudes/admin/pages/enseignants.php">Les Enseignants</a></li>
                    <li><a href="/ProjectEvaluationEtudes/admin/pages/filiers.php">Les Filères</a></li>
                    <li><a href="/ProjectEvaluationEtudes/admin/pages/questionnaire.php">Les Questions</a></li>
                    <li><a href="/ProjectEvaluationEtudes/admin/pages/archive.php">Archives</a></li>
                </ul>
            </div>
            <p class="edit">Edit</p>
        </div>
    