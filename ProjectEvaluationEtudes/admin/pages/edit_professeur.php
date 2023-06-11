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
    $sql = "SELECT professor_Fname, professor_Lname, professor_email FROM professeur WHERE id_professeur = ".$_GET["id"];

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    //echo"cnx etablie";
}

if (isset($_POST['submit'])){

    //echo "hello";
    $professor_Fname = $_POST['professor_Fname'];
    $professor_Lname = $_POST['professor_Lname'];
    $professor_email= $_POST['professsor_email'];
    
    $professor_Fname = $_POST['first_name'];
    $professor_Lname = $_POST['last_name'];
    $professor_email = $_POST['email'];

    $id_professeur = $_GET["id"];
    $id_professeur = $_POST['id_professeur'];

    $sql = "UPDATE `professeur` SET `professor_Fname` = '$professor_Fname', `professor_Lname` = '$professor_Lname', `professor_email` = '$professor_email' WHERE `id_professeur` = $id_professeur";

   
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: /ProjetEvaluation-2/ProjectEvaluationEtudes/admin/pages/professeurs.php");
    }
    else{
        echo "failed" . mysqli_error($conn);
    }

}
?>
        
                
<div class="main-content">


        <div class="text-center mb-4">
         <h3>Modifier un professeur</h3>
         <p class="text-muted">Complete the form below to modify a  professor</p>
         </div>


         <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3">
               <label class="form-label">first name</label>
               <input type="text" class="form-control" value="<?php echo $row['professor_Fname']; ?>" name="first_name">
               <input type="text" name="id_professeur" value=<?php echo $_GET["id"]; ?> hidden>
            </div>
            <div class="mb-3">
               <label class="form-label">last name</label>
               <input type="text" class="form-control" value="<?php echo $row['professor_Lname']; ?>" name="last_name">
               <input type="text" name="id_professeur" value=<?php echo $_GET["id"]; ?> hidden>
            </div>
            <div class="mb-3">
               <label class="form-label">email</label>
               <input type="email" class="form-control" value="<?php echo $row['professor_email']; ?>" name="email">
               <input type="text" name="id_professeur" value=<?php echo $_GET["id"]; ?> hidden>
            </div>
            <div>
               <button type="submit" class="btn btn-success" name="submit">Update</button>
               <a href="professeurs.php" class="btn btn-danger">Cancel</a>
            </div>
            </form>
        </div>

</div>





        

<?php include "../includes/footer.php" ?>