<?php include "../includes/layout.php" ?>

<?php 

$servername = 'localhost';
$username = 'root';
$database_name ='projet_evaluation';
$password = '';

// Create connection
$conn = mysqli_connect($servername,$username,$password,$database_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else {

    //echo"cnx etablie";
}

if (isset($_POST['submit'])){

    //echo "hello";

    $question_phrase = $_POST['question'];

    $sql = "INSERT INTO `question`(`question_phrase`) VALUES ('$question_phrase')";
   
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: /ProjetEvaluation-2/ProjectEvaluationEtudes/admin/pages/questionnaire.php");
    }
    else{
        echo "failed" . mysqli_error($conn);

    }

}
?>


    <div class="main-content">
      <div class="text-center mb-4">
         <h3>Ajouter une question</h3>
         <p class="text-muted">Complete the form below to add a new question</p>
      </div>
      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3">
               <label class="form-label">Question</label>
               <input type="text" class="form-control" name="question" placeholder="Ajouter une question">
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="questionnaire.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>




       <!-- <div class="main-content">

            <h1 class="mb-5">Gerer Questions</h1>
            
            <form method="post" action="" class="ajouter-questionnaire d-flex flex-grow-1 gap-2">
                <input type="text" name="question" id="" placeholder="Inserer Votre Question SVP" class="rounded-4 p-3 flex-grow-1">
                <button type="submit" name="submit" class="btn btn-custom p-2 rounded-4">Ajouter une Question</button>
            </form>

           <?php 
           // $sql= "SELECT * FROM `question`";
            //$result = mysqli_query($conn,$sql);
           // while ($row = mysqli_fetch_assoc($result)){
                ?>

                 <div class="question-container d-flex flex-column gap-3 mt-5">
                <div class="question-title d-flex">
                    <h3 class="flex-grow-1">Questions</h3>
                    <h3 class="question-actions">Actions</h3>
                </div>
                <div class="question1 d-flex">
                    <p class="flex-grow-1"> <?php // echo $row['question_phrase'] ?> </p>
                    <div class="question-settings">
                        <a class="btn btn-warning" href= "edit.php?id_question=<?php //echo $row['id_question'] ?>" > modifier </a>
                        <a class="btn btn-danger"  href= "delete.php?id_question=<?php // echo $row['id_question'] ?>"  >supprimer</a>
                       <a class= "btn btn-danger"  href= "delfhnf
                    </div>
                
                </div>
                <?php
           // }

         ?>    
            
        </div> -->

<?php include "../includes/footer.php" ?>