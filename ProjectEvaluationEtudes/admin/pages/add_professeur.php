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

}

if (isset($_POST['submit'])){

    $professor_Fname = $_POST['first_name'];
    $professor_Lname = $_POST['last_name'];
    $professor_email = $_POST['email'];

    $sql = "INSERT INTO `professeur`(`professor_Fname`, `professor_Lname`,`professor_email`) VALUES ('$professor_Fname','$professor_Lname','$professor_email')";
   
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: /ProjetEvaluation/ProjectEvaluationEtudes/admin/pages/professeurs.php");
    }
    else{
        echo "failed" . mysqli_error($conn);

    }

}
?>


    <div class="main-content">
      <div class="text-center mb-4">
         <h3>Ajouter un professeur</h3>
         <p class="text-muted">Complete the form below to add a new professor</p>
      </div>
      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3">
               <label class="form-label">FIRST NAME</label>
               <input type="text" class="form-control" name="first_name" placeholder="Ajouter un prenom" required>
            </div>
            <div class="mb-3">
               <label class="form-label">LAST NAME</label>
               <input type="text" class="form-control" name="last_name" placeholder="Ajouter un nom" required>
            </div>
            <div class="mb-3">
               <label class="form-label">EMAIL</label>
               <input type="email" class="form-control" name="email" placeholder="Ajouter un email" required>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="professeurs.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>




       
        </div> 

<?php include "../includes/footer.php" ?>