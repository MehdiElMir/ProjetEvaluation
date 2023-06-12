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
    $sql = "SELECT class_name FROM class WHERE id_class=".$_GET["id"];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    //echo"cnx etablie";
}

if (isset($_POST['submit'])){

    //echo "hello";
    $id_class = $_POST['id_class'];
    
    $class_name = $_POST['class'];
    $level_id = $_POST['level'];

    $sql = "UPDATE `class` SET `class_name`='$class_name', `level_id`='$level_id' WHERE id_class=$id_class";
   
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: /ProjetEvaluation/ProjectEvaluationEtudes/admin/pages/classe.php");
        exit();
    }
    else{
        echo "Erreur lors de la modification de la classe : " . mysqli_error($conn);
    }

}
?>

<div class="main-content">
    <div class="text-center mb-4">
        <h3>Modifier une classe</h3>
        <p class="text-muted">Complete the form below to modify a class</p>
    </div>
    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3">
                <label class="form-label">Classe</label>
                <input type="text" class="form-control" value="<?php echo $row['class_name']; ?>" name="class">
                <input type="text" name="id_class" value="<?php echo $_GET["id"]; ?>" hidden>
            </div>
            <div class="mb-3">
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
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                <a href="classe.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include "../includes/footer.php" ?>
