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

if (isset($_POST['submit'])) {
    
    $class_name = $_POST['class'];
    $level_id = $_POST['level'];
    
    $sql = "INSERT INTO class (class_name, level_id) VALUES ('$class_name', '$level_id')";
   
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: /ProjetEvaluation/ProjectEvaluationEtudes/admin/pages/classe.php");
        exit();
    } else {
        echo "Erreur lors de l'enregistrement de la classe : " . mysqli_error($conn);
    }
}


?>

    <div class="main-content">
      <div class="text-center mb-4">
         <h3>Ajouter une classe</h3>
         <p class="text-muted">Complete the form below to add a new class</p>
      </div>
      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3">
               <label class="form-label">Class</label>
               <input type="text" class="form-control" name="class" placeholder="Ajouter une classe">
               <label class="form-label">Level</label>
            <select class="form-control" name="level">
               <?php
               
               $query = "SELECT levels_nbr FROM branch";
               $result = mysqli_query($conn, $query);

               
               while ($row = mysqli_fetch_assoc($result)) {
                   echo "<option value='" . $row['levels_nbr'] . "'>" . $row['levels_nbr'] . "</option>";
               }

               
               ?>
            </select>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button> 
               <a href="classe.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>

<?php include "../includes/footer.php" ?>