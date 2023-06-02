<?php
include '../doc/Survey.php';
include '../doc/Surveyquestion.php';
$survey= new Survey();
$surveyquestion= new Surveyquestion();

// Vérifier si le formulaire a été soumis
$faculty = $_POST['faculty'];
$branch = $_POST['branch'];
$level = $_POST['level'];
$semestre = $_POST['semestre'];
$subjects = $_POST['subject'];
$questions = $_POST['questions'];

echo "Faculté : " . $faculty . "<br>";
echo "Branche : " . $branch . "<br>";
echo "Niveau : " . $level . "<br>";
echo "Semestre : " . $semestre . "<br>";


echo "Sujets sélectionnés : <br>";
foreach ($subjects as $subject) {
    echo "Sujet : " . $subject . "<br>";
}

echo "Questions sélectionnées : <br>";
foreach ($questions as $question) {
    echo "Question : " . $question . "<br>";
}

$survey_name='survey3';
$survey->survey_name = $survey_name;
$survey->level_id = $_POST['level'];
$survey->semestre_id = $_POST['semestre'];
$survey->survey_created_at = date('Y-m-d H:i:s');
$survey->survey_statut = "Prête";
$survey->Report ="Report";

 $survey->save();


 

 $surveyquestion->survey_id = $survey->id_survey;

// Insérer les sujets
if (isset($_POST['subject']) && is_array($_POST['subject'])) {
    foreach ($_POST['subject'] as $subject_id) {
        $surveyquestion->subject_id = $subject_id;
        foreach ($_POST['questions'] as $question_id) {
            $surveyquestion->question_id = $question_id;
            $surveyquestion->save();
        
        
    }
}




}







