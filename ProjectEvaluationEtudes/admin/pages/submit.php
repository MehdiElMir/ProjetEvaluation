<?php
include '../doc/Survey.php';
include '../doc/Surveyquestion.php';
$survey= new Survey();


// Vérifier si le formulaire a été soumis
$faculty = $_POST['faculty'];
$branch = $_POST['branch'];
$level = $_POST['level'];
$semestre = $_POST['semestre'];
$subjects = $_POST['subject'];
$questions = $_POST['questions'];

// echo "Faculté : " . $faculty . "<br>";
// echo "Branche : " . $branch . "<br>";
// echo "Niveau : " . $level . "<br>";
// echo "Semestre : " . $semestre . "<br>";


// echo "Sujets sélectionnés : <br>";
// foreach ($subjects as $subject) {
//     echo "Sujet : " . $subject . "<br>";
// }

// echo "Questions sélectionnées : <br>";
// foreach ($questions as $question) {
//     echo "Question : " . $question . "<br>";
// }

$survey->level_id = $_POST['level'];
$survey->semestre_id = $_POST['semestre'];
$survey->survey_created_at = date('Y-m-d H:i:s');
$survey->survey_statut = "Prête";
$survey->Report ="Report";

 $survey->save();


 

 if (isset($_POST['questions']) && is_array($_POST['questions'])) {
    foreach ($subjects as $subject) {
        foreach ($questions as $question) {

            $surveyquestion = new Surveyquestion();
            $surveyquestion->survey_id = $survey->id_survey;

            $surveyquestion->subject_id = $subject;
            $surveyquestion->question_id = $question;
            $surveyquestion->save();
        }
    }
}

header("Location: /ProjetEvaluation-2/ProjectEvaluationEtudes/admin/pages/enquetes.php");






