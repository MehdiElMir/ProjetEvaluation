<?php  
include '../doc/Faculty.php';
include '../doc/Semestre.php';
include '../doc/Question.php';
    $faculty= new Faculty();
    $faculty = $faculty->getAll();
    $semestre = new Semestre();
    $semestre = $semestre->getAll();
    $question = new Question();
    $question = $question->getAll();
    
    
   


    


?>
