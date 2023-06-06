<?php include_once "../includes/layout.php"; 

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


//echo "Connected successfully";
$sql = 'SELECT * FROM survey JOIN level ON level.id_level=survey.level_id 
JOIN branch ON branch.id_branch=level.branch_id 
JOIN semestre ON semestre.id_semestre=survey.semestre_id WHERE id_survey="'.$_GET["id"].'"';
$result = mysqli_query($conn, $sql);

$sql2 = 'SELECT DISTINCT  subject_name FROM surveyquestion srq 
JOIN survey sr JOIN subject s ON srq.subject_id=s.id_subject AND srq.survey_id=sr.id_survey WHERE
survey_id="'.$_GET["id"].'"';
$result2 = mysqli_query($conn, $sql2);

$sql3 = 'SELECT DISTINCT question_phrase, subject_name FROM surveyquestion srq JOIN survey sr JOIN question q JOIN subject s ON srq.subject_id=s.id_subject AND srq.question_id=q.id_question AND srq.survey_id=sr.id_survey WHERE survey_id="'.$_GET["id"].'" AND subject_name=""';
$result3 = mysqli_query($conn, $sql3);


?>
<div class="main-content">
    <?php $row = mysqli_fetch_assoc($result) ?>
    <h3 class="fw-bold text-capitalize"> <?php echo $row['branch_name'] ?></h3>
    <h3 class="fw-bold text-capitalize">Module :</h3>

    <div class="select-question d-flex align-items-center gap-2">
        <span>Selectionner un module :</span>
        <select name="question" id="module-select" class="bg-transparent p-2 border rounded-3">
            <?php while($row2 = mysqli_fetch_assoc($result2)) { ?>
                <option value="<?php echo $row2['subject_name']; ?>"><?php echo $row2['subject_name']; ?></option>
            <?php } ?>
        </select>
        <button id="show-questions-btn" class="btn btn-primary">Afficher les statistiques des questions</button>
    </div>

    <div id="questions-container"></div>

<div class="chart-statistique mb-5 mt-2 ml-4">
    <canvas id="myChart"></canvas>
    <p class="text-center mt-2">Nombres d'étudiants répondus: 19</p>
</div>

<h3 class="fw-semibold fs-5">Commentaires des étudiants: <span class="fw-light">15</span></h3>
<div class="commentaires border rounded-3 p-2">
    <p>Commentaires ici</p>
</div>


    <button style="margin-top:20px;" class="btn 
    <?php if($row["survey_statut"] == "Prête") echo "btn-success"; else if($row["survey_statut"] == "En cours") echo "btn-danger"; ?>">
        <?php
            if ($row["survey_statut"] == "Prête")
                echo "Lancer";
            else if($row["survey_statut"] == "En cours")
                echo "Finir";
        ?>
    </button>
</div>

   <script>

document.getElementById("show-questions-btn").addEventListener("click", function() {
    var selectedModule = document.getElementById("module-select").value;
    var surveyId = <?php echo $_GET["id"]; ?>;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var questions = JSON.parse(xhr.responseText);
                displayQuestions(questions);
            } else {
                console.error("Une erreur s'est produite lors de la récupération des questions.");
            }
        }
    };
    xhr.open("GET", "Gets/get_questions.php?module=" + encodeURIComponent(selectedModule)+ "&surveyId=" + encodeURIComponent(surveyId), true);
    xhr.send();
});

function displayQuestions(questions) {
    var questionsContainer = document.getElementById("questions-container");
    questionsContainer.innerHTML = "";
    questions.forEach(function(question) {
        var questionElement = document.createElement("h3");
        questionElement.textContent = question.question_phrase + "?";
        questionsContainer.appendChild(questionElement);

        // Ajoutez ici le code pour afficher le graphique et les commentaires de chaque question
    });
}


    </script>

<?php

    include_once "../includes/footer.php"

?>