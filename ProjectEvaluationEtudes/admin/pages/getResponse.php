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

$sql4 = 'SELECT COUNT(reponse_note) as count,sb.subject_name , rn.id_reponse_note, rn.reponse_note FROM
response r JOIN reponse_note rn JOIN surveyquestion srq JOIN survey s JOIN subject sb JOIN question q 
ON srq.survey_id=s.id_survey AND sb.id_subject=srq.subject_id AND r.survey_question_id=srq.id_survey_question 
AND r.response_note=rn.id_reponse_note AND srq.question_id=q.id_question 
WHERE s.id_survey="'.$surveyId.'" AND sb.subject_name="'.$selectedModule.'" AND q.id_question="'.$id_q.'"';

$result4 = mysqli_query($conn, $sql4);     

$count= array();
while($row4 = mysqli_fetch_assoc($result4)) {
    $count[] = $row4;
}

echo json_encode($count);
?>