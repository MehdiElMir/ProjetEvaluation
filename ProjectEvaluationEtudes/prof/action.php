<?php

session_start();
//date of today
//$dateNow = date("Y-m-d h:i:sa", strtotime("now"));
$id_professeur =  $_SESSION["id_professeur"] ;
$professor_Lname=  $_SESSION["professor_Lname"] ;
extract($_POST);
include("../login_process/config.php");  
$dateNow = date("Y-m-d h:i:sa", strtotime("now")); 
$id = $_POST['id'];

//echo $id;

$action_name = $_POST['action_name'];
$action_description= $_POST['action_description'];

$rsurvey = "SELECT id_survey
FROM subject,survey,action 
WHERE subject.id_subject=action.subject_id
and survey.id_survey=action.survey_id
and id_subject=$id;";

$query = mysqli_query($connexion, $rsurvey);

if ($query) {
$row = mysqli_fetch_assoc($query);
$survey_id = $row['id_survey'];

$sql1 = "INSERT INTO action (action_name, action_description, action_date, professeur_id, subject_id, survey_id)
VALUES ('$action_name', '$action_description', '$dateNow', '$id_professeur', '$id', '$survey_id')";

$query = mysqli_query($connexion, $sql1);

if ($query) {
// Action insertion successful
// Do any additional processing or redirection here

} else {
// Handle query execution error
echo "Error: " . mysqli_error($connexion);
}
} else {
// Handle query execution error
echo "Error: " . mysqli_error($connexion);
}
?> 