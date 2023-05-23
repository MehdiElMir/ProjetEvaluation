<!DOCTYPE html>
<html lang="en">
<head>
    <?php
            session_start();
            //date of today
            //$dateNow = date("Y-m-d h:i:sa", strtotime("now"));
            $id_professeur =  $_SESSION["id_professeur"] ;
            $professor_Lname=  $_SESSION["professor_Lname"] ;
            extract($_POST);
            include("../login_process/config.php");      
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
                                    text-align:left;" href="/subject.php?id=' . $id_subject . '">' . $subject_name . '</a></li>';
                    }
                    
                    ?>
                    
                </ul>
                    
                   
            </div>
           
        </div>
        

       <!---------------------------------Session HELLO ---------------------------------------- -->
      
    

        <div class="main-content">

        <div class="search">
                <form action="aside.php" style="display: flex;flex-direction: row;align-items: center;">
                    <select class="form-select form-select-sm" id="faculty">
                        <option value="default" selected="selected">--- Facultés</option>
                    <?php  
                    $stql = "SELECT faculty.id_faculty, faculty.faculty_name FROM faculty;";
                            $result = mysqli_query($connexion, $stql);
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

                    <button type="submit" class="btn btn-outline-success">Filtrer</button>
                        </form>
            </div>
            
        <h3 style="width:100%;">Nom de matière</h3>
        
        

        <table class="table">
        <thead>
            <tr>
            <th scope="col-2"> </th>
            <th scope="col-6">Questions </th>
            <th scope="col-4">Résultats</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Question 1 ---------------------------------</td>
                <td>4,5/5</td>
            
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Question 2 ---------------------------------</td>
                <td>3,5/5</td>
                
                
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Question 2 ---------------------------------</td>
                <td>4/5</td>
                </tr>
            </tbody>
            </table>



            <form method="post">
            <button type="submit" style="margin-top:5px;" name="boutton-commentaire"class="btn btn-secondary">Afficher les commentaires</button>

            <div class="mb-3" style="width:800px; margin-top :20px;">
                <label  for="exampleFormControlTextarea1" class="form-label">Saisir une action:</label>
                <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div style="margin-top:20px;">
            <button type="submit" class="btn btn-success">Ajouter une action</button>
            </div>

</form>

    </main>
    <script src="prof_layout.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
<?php




if(isset($_POST['boutton-commentaire'])) {
    header("Location: ./liste_commentaires.php");
    exit();
}






?>
</html>