<?php 


require_once 'db.php';



class Question {
    public $id_question;
    public $question_phrase;
    

    public function __construct($id_question = null) {
        if($id_question){
            $this->id_question=$id_question;
            $this->loadquestionDataFromDB($id_question);
        }
    }
    private function loadquestionDataFromDB() {
        $db = new Database();
        $questionData = $db->select('question', ['id_question' => $this->id_question]);
        if(count($questionData) == 1){


            $questionData = $questionData[0];
        
        $this->question_phrase = $questionData['question_phrase'];
        
        
   
    }}

    public function save() {
        $db = new Database();
        if($this->id_question){
            $db->update('question', [
                'question_phrase' => $this->question_phrase,
                
                             
            ], ['id_question' => $this->id_question]);
        }else{
            
            $this->id_question = $db->insert('question', [
                'question_phrase' => $this->question_phrase,
                
                
                
            ]);
        }
    }
    public function update($data) {
        if($this->id_question){
            if(isset($data['question_phrase'])) $this->question_phrase = $data['question_phrase'];
           
           
            
            $this->save();
        }
    }

    public function delete() {
        if($this->id_question){
            $db = new Database();
            $questionData = $db->select('question', ['id_question' => $this->id_question]);
            if (!$questionData) {
                throw new Exception("Class not found.");
            }
            $db->delete('question', ['id_question' => $this->id_question]);
        }
    }
    public function getAll(){
        $db = new Database();
        $question_data = $db->select('question');
        return $question_data;
    }
  
}