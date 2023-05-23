 <body>
 
  

<?php  
include 'Faculty.php';
include 'Semestre.php';
include 'Question.php';
    $faculty= new Faculty();
    $faculty = $faculty->getAll();
    $semestre = new Semestre();
    $semestre = $semestre->getAll();
    $question = new Question();
    $question = $question->getAll();
    
    
   


    


?>
