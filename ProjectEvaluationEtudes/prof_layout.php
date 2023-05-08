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
            include("./login_process/config.php");
            
                
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
        
        <div class="sidebar">
            <div class="sidebar-top">
          
                 
                    <?php
                
                    $stql = "SELECT `subject_name`,`subject`.`id_subject`
                    FROM `subject`, `professeur`
                    WHERE `professeur`.`id_professeur` = $id_professeur and
                        `subject`.`professeur_id`=$id_professeur;";
                
                    $result = mysqli_query($connexion, $stql);
                    echo '<ul>';
                    while ($res = mysqli_fetch_array($result)) {
                        
                   
                        $id_subject = $res['id_subject'];
                        $subject_name = $res['subject_name'];
                        echo '<li><a href="/subject.php?id=' . $id_subject . '">' . $subject_name . '</a></li>';
                    }
                    echo '</ul>'
                    
                ?>
                   
            </div>
           
        </div>
        

       <!---------------------------------Session HELLO ---------------------------------------- -->
      
    

        <div class="main-content">
        <h3> Nom de matière:</h3>  
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
                <td>Mark</td>
                <td>Otto</td>
            
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                
                
                </tr>
                <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                </tr>
            </tbody>
            </table>

            <form method="post">

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Saisir une action:</label>
                <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div>
            <button type="submit" name="boutton-commentaire"class="btn btn-success">Afficher les commentaires</button>
            <button type="button" class="btn btn-success">Ajouter une action</button>
            </div>

</form>

    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
<?php




if(isset($_POST['boutton-commentaire'])) {
    header("Location: ./liste_commentaires.php");
    exit();
}






?>
</html>