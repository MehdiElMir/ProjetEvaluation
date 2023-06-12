<!DOCTYPE html>
<html lang="en">
<head>    
    <!-- Recuperation de session et connexion avec la base de donnees  -->
    <?php
            session_start();
            $id_professeur =  $_SESSION["id_professeur"] ;
            $professor_Lname=  $_SESSION["professor_Lname"] ;
            extract($_POST);
            include("../login_process/config.php");  
            $dateNow = date("Y-m-d h:i:sa", strtotime("now"));    
    ?>
    
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


    <!-- MAIN CONTENT -->
    <!--AFFICHAGE DES MATIERES DANS LE SIDE BAR  -->
    <main class="main">
        
        <div class="sidebar" style="text-align:left;">
            <div class="sidebar-top">
                <p style="color:white;font-size:30px;margin-top:20px;margin-left:5px;font-weight:bold;">Matières</p>

                <ul style="text-align: left;">

                    <?php                    
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
        

       
      
    <!-- FILTER -->

        <div class="main-content">

        

        <div class="search" style="height:100px;">
                <form action="aside.php" style="display: flex;flex-direction: row;align-items: center;">
                    <select class="form-select form-select-sm" id="faculty">
                        <option value="default" selected="selected">--- Facultés</option>
                    <?php  
                    $sttql = "SELECT faculty.id_faculty, faculty.faculty_name FROM faculty;";
                            $result = mysqli_query($connexion, $sttql);
                            while ($res = mysqli_fetch_array($result)) {
                                $faculty_name = $res['faculty_name'];
                                $id_faculty = $res['id_faculty'];
                                echo ' <option value= "'.$id_faculty.'">'. $faculty_name .' </option>';
                            }
                    ?>
                    </select>

                    <select class="form-select form-select-sm" id="filieres">
                            <option value="">Selectionnez une filière</option>
                        <?php  
                   /* $stql = "SELECT branch.id_branch, branch.branch_name FROM branch;";
                            $result = mysqli_query($connexion, $stql);
                            while ($res = mysqli_fetch_array($result)) {
                                $branch_name = $res['branch_name'];
                                $id_branch = $res['id_branch'];
                                echo ' <option value= "'.$id_branch.'">'. $branch_name .' </option>';
                            }*/
                    ?>
                    </select>

                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="default" selected="selected">--- Niveau</option>
                        <option value= "1">1</option>
                        <option value= "2">2</option>
                        <option value= "3">3</option>
                        
                    </select>

                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="default" selected="selected">--- Semestre</option>

                    <?php  
                    $stql = "SELECT semestre.id_semestre, semestre.semestre_name FROM `semestre`;";
                            $result = mysqli_query($connexion, $stql);
                            while ($res = mysqli_fetch_array($result)) {
                                $semestre_name = $res['semestre_name'];
                                $id_semestre = $res['id_semestre'];
                                echo ' <option value= "'.$id_semestre.'">'. $semestre_name .' </option>';
                            }
                    ?>

                    </select>       
            </form>
                    
            <?php 
            if(isset($_GET['id'])){
        ?>
        <?php 
                // recuperation de l'id du subject de L'url
                $id = $_GET['id'];
                $sql = "SELECT subject.subject_name FROM subject WHERE subject.id_subject = $id;";
                $resultat = mysqli_query($connexion, $sql);
                while ($res = mysqli_fetch_array($resultat)) {
                    $subject_name = $res['subject_name'];

                    echo '<h3 style="width:100%; margin-top:40px">Nom de matière :    ' . $subject_name . '</h3>'; 
                    
                }

        ?>    
        <!-- <h3 style="width:100%; margin-top:40px">Nom de matière :</h3> -->
        
        <div class="row" style="margin-top: 30px">

        <div class="col-10" >
            <table class="table shadow table-striped">
        <thead>
            <tr>
            <th scope="col-2" ></th>
            <th scope="col-6" >Questions </th>
            </tr>
        </thead>
        <tbody>
        <?php
                // recuperation de l'id du subject de L'url
                $id = $_GET['id'];
              
                
                // requete d'affichage de question

                $sql = "SELECT * FROM surveyquestion
                        JOIN question ON surveyquestion.question_id = question.id_question
                        WHERE surveyquestion.subject_id = $id";

                $sqll = "SELECT survey.id_survey, surveyquestion.subject_id,surveyquestion.question_id, surveyquestion.subject_id,AVG(response.response_note) As vote
                FROM response 
                JOIN surveyquestion ON surveyquestion.id_survey_question = response.survey_question_id
                JOIN survey ON surveyquestion.survey_id = survey.id_survey
                JOIN subject ON subject.id_subject = surveyquestion.subject_id
                WHERE survey.survey_statut LIKE 'Prête'
                and surveyquestion.subject_id=$id
                GROUP BY surveyquestion.id_survey_question; ";
               
                $result = mysqli_query($connexion, $sql);
                $result2 = mysqli_query($connexion, $sqll);

                $i = 1;

                while ($res = mysqli_fetch_array($result)) {
                    $question_phrase = $res['question_phrase'];
                    $id_question = $res['id_question'];
                    $id_survey_question = $res['id_survey_question'];
                
                    // $vote = $res['vote'];
                    echo '<tr>';
                    echo '<th scope="row">' . $i . '</th>';
                    echo '<td>' . $question_phrase . '</td>';
                    // echo '<td>' . $vote . '</td>';
                    echo '</tr>';

                    $i++;
                }
                ?>
                </tbody>
            </table>
            </div>

            <div class="col-2">
            <table class="table shadow">
                      <thead>
                      <tr>
                      <th scope="col-4" >Résultats</th>
                      </tr>
                  </thead>
                  <tbody>
                    
                  <?php
                while ($res = mysqli_fetch_array($result2)) {
                    // $question_phrase = $res['question_phrase'];
                    // $id_question = $res['id_question'];
                    // $id_survey_question = $res['id_survey_question'];    
                   
                    $moyenne = $res['vote'];
                    
                    echo '<tr>';
                    echo '<td>' . $moyenne .'</td>';
                    
                    
                    // echo '<td>' . $vote . '</td>';
                    echo '</tr>';
                    
                }
            ?>
            </tbody>
            </table>
            </div>

        </div>

        <div class="row align-items-start">
        <form action="liste_commentaires.php" method="post">
            <input type="text" name="id" value="<?php echo $_GET["id"] ?>" hidden>
            <button type="submit" style="margin-top:5px;" name="boutton-commentaire" class="btn btn-secondary shadow" 
            onclick="window.location.href='liste_commentaires.php'">Afficher les commentaires</button>
            
        </form>
        </div>

        <hr>

        
                
                
              

            
            
        
            <div class="row">
                <div class="col-12">
                <form method="post" form action="../prof/action.php"  class="login-form-control d-flex flex-column py-12">
                <label  for="exampleFormControlTextarea1" class="form-label">Saisir une action:</label>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Objet de l'action :</span>
                        <input type="text" class="form-control" name="action_name" id="action_name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <input type="text" name="id" value="<?php echo $_GET["id"] ?>" hidden id="">

                <!-- == action a saisir== -->
                    <div class="mb-3" >
                        
                        <textarea class="form-control form-control-lg" id="action_description" name="action_description" rows="3"></textarea>
                    </div>

            <div style="margin-top:5px;">
            <button type="submit" class="btn btn-success" style="float:right;">Ajouter une action</button>
            
            </div>

        </form>
                </div>
            </div>
            
            <?php }
            else {
                echo 'Choisissez une matière';
            }
            ?>
           
       
                <!-- objet action  = = action name -->
     
    

    </main>
    <script src="prof_layout.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>