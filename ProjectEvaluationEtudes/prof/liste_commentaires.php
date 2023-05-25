<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>professeur - dashboard</title>
    <link rel="stylesheet" href="./css/prof_layout.css">

</head>
<body>
    
    <header>
        
        <nav class="p-3 shadow-lg">
            <a href="/">
                <img src="./assets/logo.png" alt="logo mundiapolis" class="img-size">
            </a>
        </nav>
        
    </header>

    <!-- recuperation de session et date -->

    <?php
            session_start();
            $id_professeur =  $_SESSION["id_professeur"] ;
            $professor_Lname=  $_SESSION["professor_Lname"] ;
            extract($_POST);
            include("../login_process/config.php");  
            $dateNow = date("Y-m-d h:i:sa", strtotime("now"));    
    ?>


    <!-- MAIN CONTENT SIDE BAR -->
     <main class="main">
     <div class="sidebar" style="text-align:left;">
            <div class="sidebar-top">
                <p style="color:white;font-size:30px;margin-top:20px;margin-left:5px;font-weight:bold;">Matières</p>

                <ul style="text-align: left;">
                    <?php
                    // Requete pour afficher les matire dans de side bar par rapport a chaque professeur
                    
                    $stql = "SELECT `subject_name`,`subject`.`id_subject`
                    FROM `subject`, `professeur`
                    WHERE `professeur`.`id_professeur` = $id_professeur and
                        `subject`.`professeur_id`=$id_professeur;";
                
                    $result = mysqli_query($connexion, $stql);
                    while ($res = mysqli_fetch_array($result)) {
                        
                
                        $id_subject = $res['id_subject'];
                        $subject_name = $res['subject_name'];
                        echo '<li><a style="color: white; 
                                    text-decoration:none;
                                    text-align:left;" href="prof_layout.php?id=' . $id_subject . '">' . $subject_name . '</a></li>';
                    }
                    
                    ?>
                    
                </ul>
                    
                   
            </div>
           
        </div>
                
                <div class="main-content">

                
                <?php 
                // recuperation de subject id du lien
                $id = $_POST['id'];
                //requete de commentaire des eleves 
                
                $ress="SELECT response.comment FROM response, subject, surveyquestion
                        WHERE response.survey_question_id=surveyquestion.id_survey_question
                        and surveyquestion.subject_id=subject.id_subject
                        and id_subject=$id";
                
                $query = mysqli_query($connexion, $ress);
            

                while ($res = mysqli_fetch_array($query)) {
                    $comment = $res['comment'];
                    
                    echo '<ul class="list-group list-group-flush">
                            <li class="list-group-item">' . $comment . '</li>
                        </ul>';
                }
                
                ?>
        </div>
         
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>


</html>