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
    $sql = "SELECT question_phrase FROM question WHERE id_question=".$_GET["id"];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    //echo"cnx etablie";
}

if (isset($_POST['submit'])){

    //echo "hello";
    $id_question = $_POST['id_question'];
    
    $question_phrase = $_POST['question'];

    $sql = "UPDATE `question` SET`question_phrase`='$question_phrase' WHERE id_question=$id_question";
   
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
         <h3>Modifier une question</h3>
         <p class="text-muted">Complete the form below to modify a  question</p>
         </div>


         <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3">
               <label class="form-label">Question</label>
               <input type="text" class="form-control" value="<?php echo $row['question_phrase']; ?>" name="question">
               <input type="text" name="id_question" value=<?php echo $_GET["id"]; ?> hidden>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Update</button>
               <a href="questionnaire.php" class="btn btn-danger">Cancel</a>
            </div>
            </form>
        </div>

</div>





        

<?php include "../includes/footer.php" ?>