<?php

$servername = 'localhost';
$username = 'root';
$database_name ='projet_evaluation';
$password = '';

$conn = mysqli_connect($servername,$username,$password,$database_name);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$selectedModule = $_GET["module"];
$sql3 = 'SELECT DISTINCT question_phrase, subject_name FROM surveyquestion srq JOIN survey sr JOIN question q JOIN subject s ON srq.subject_id=s.id_subject AND srq.question_id=q.id_question AND srq.survey_id=sr.id_survey WHERE survey_id="'.$surveyId.'" AND subject_name="'.$selectedModule.'"';
$result3 = mysqli_query($conn, $sql3);

$questions = array();
while($row3 = mysqli_fetch_assoc($result3)) {
    $questions[] = $row3;
}
echo json_encode($questions);
?>