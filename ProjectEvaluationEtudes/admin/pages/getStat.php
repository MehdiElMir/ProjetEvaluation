<?php

$servername = 'localhost';
$username = 'root';
$database_name ='projet_evaluation';
$password = '';

$conn = mysqli_connect($servername,$username,$password,$database_name);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$surveyId = $_GET["surveyId"];
$selectedModule = $_GET["module"];
$id_q = $_GET["id_q"];

$sql5 = 'SELECT rn.id_reponse_note, COUNT(rn.id_reponse_note) AS count
FROM response r
JOIN reponse_note rn ON r.response_note = rn.id_reponse_note
JOIN surveyquestion srq ON r.survey_question_id = srq.id_survey_question
JOIN survey s ON srq.survey_id = s.id_survey
JOIN subject sb ON srq.subject_id = sb.id_subject
JOIN question q ON srq.question_id = q.id_question
WHERE s.id_survey = "'.$surveyId.'" AND sb.subject_name = "'.$selectedModule.'" AND q.id_question = "'.$id_q.'" AND r.response_note IN (1, 2, 3, 4, 5)
GROUP BY r.response_note;';

$result5 = mysqli_query($conn, $sql5);     

$stat= array();
while($row5 = mysqli_fetch_assoc($result5)) {
    $stat[] = $row5;
}

echo json_encode($stat);
?>