<?php include "../includes/layout.php"?>
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
}


$option = '';
$sql1 = 'SELECT * FROM branch';
$res = mysqli_query($conn, $sql1);
if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $option .= '<option value="' . $row['id_branch'] . '">' . $row['branch_name'] . '</option>';
    }
}
?>

<div class="main-content">
        
    <h1 class="mb-5">Archives des Enquêtes</h1>
    <form action="" method="POST">
        <div class="archive archive-filters d-flex gap-2 mb-5">
            <select name=" filieres" class="flex-grow-1 bg-transparent border border-black rounded-3 px-4" required>
                <option selected>Choose...</option>
                <?php echo $option; ?>
            </select>
            <select name="annee_universitaire" id="" class="flex-grow-1 bg-transparent border border-black rounded-3 px-4" required>
<option value="annee_universitaire">annee universitaire</option>
<?php
// Durée de l'année universitaire (par exemple, 4 ans)
$duration = 25;
            // Générer les options pour les années universitaires
            for ($i = 0; $i < $duration; $i++) {
                $startYear = 2011 + $i;
                $endYear = $startYear + 1;
                echo '<option value="' . $startYear . '-' . $endYear . '">' . $startYear . '-' . $endYear . '</option>';
            }
            ?>
        </select>
        <button name="filtrer" type="submit" class="btn btn-secondary" >Filtrer</button>
        
    </div>
</form>

<h1 class="mb-3">Enquêtes</h1>

<?php
if (isset($_POST["filtrer"])) {
    filtrerSurvey($conn);
} 

if (!isset($_POST["filtrer"])) {
    $sql = "SELECT *,branch.branch_name FROM survey 
    JOIN level ON level.id_level=survey.level_id 
    JOIN branch ON branch.id_branch=level.branch_id 
    JOIN semestre ON semestre.id_semestre=survey.semestre_id 
    WHERE survey_statut='Finit'";

    $result = mysqli_query($conn, $sql);

    echo "<div class='card-container d-flex gap-4 flex-wrap'>";
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['survey_statut'] == "Finit") {
                echo "<div class='cards'> ";
                echo "<p>" . $row['branch_name'];
                echo "semestre N:" . $row['semestre_id'] . "</p>";
                echo "<p>créer à :" . $row['survey_created_at'] . "</p>";
                echo "<div class='progress'>
                    <span>Finit</span>
                    <div class='progress-bar'>
                        <span></span>
                    </div>
                </div>
                </div>";
            }
        }
    } else {
        echo "<p>Aucune enquête trouvée.</p>";
    }
    echo "</div>";
}

    function filtrerSurvey($conn) {
        
        if (isset($_POST["filtrer"]) && strlen($_POST["annee_universitaire"]) != 19) {
            $arr = explode("-", $_POST["annee_universitaire"]);
            // echo strlen($_POST["annee_universitaire"]);
            $start_year = $arr[0] . "-09-01";
            $end_year = $arr[1] . "-07-30";
            $num_br = $_POST["filieres"] ?? '';
    
            $query = "SELECT *, branch.branch_name FROM survey
            JOIN level ON level.id_level = survey.level_id
            JOIN branch ON branch.id_branch = level.branch_id
            JOIN semestre ON semestre.id_semestre = survey.semestre_id
            WHERE branch.id_branch='$num_br'
            AND survey_statut='Finit'
            AND DATE(survey_created_at) BETWEEN '$start_year' AND '$end_year'";
    
            $result2 = mysqli_query($conn, $query);
    
            if ($result2) {
                echo "<div class='card-container d-flex gap-4 flex-wrap'>";
                if (mysqli_num_rows($result2) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result2)) {
                        if ($row['survey_statut'] == "Finit") {
                            echo "<div class='cards'> ";
                            echo "<p>" . $row['branch_name'];
                            echo "semestre N:" . $row['semestre_id'] . "</p>";
                            echo "<p>créer à :" . $row['survey_created_at'] . "</p>";
                            echo "<div class='progress'>
                                    <span>Finit</span>
                                    <div class='progress-bar'>
                                        <span></span>
                                    </div>
                                </div>
                                ";
                               
                        }
                    }
                } else {
                    echo "<p>Aucune enquête trouvée.</p>";
                }
            }
        } else {
            ?>
                <p>aucune enquete disponible</p>
            <?php
        }
    }
    

?>
</div>
<?php include "../includes/footer.php" ?>
