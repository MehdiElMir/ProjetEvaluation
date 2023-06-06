<?php 


require_once 'db.php';



class Surveyquestion {
    public $id_survey_question;
    public $survey_id;
    public $question_id;
    public $subject_id;

    

    public function __construct($id_survey_question = null) {
        if($id_survey_question){
            $this->id_survey_question=$id_survey_question;
            $this->loadsurveyquestionDataFromDB($id_survey_question);
        }
    }
    private function loadsurveyquestionDataFromDB() {
        $db = new Database();
        $survey_questionData = $db->select('surveyquestion', ['id_survey_question' => $this->id_survey_question]);
        if(count($survey_questionData) == 1){


            $survey_questionData = $survey_questionData[0];
        
        $this->question_id = $survey_questionData['question_id'];
        
        $this->survey_id = $survey_questionData['survey_id'];
        $this->subject_id = $survey_questionData['subject_id'];
      
   
    }}

    public function save() {
        $db = new Database();
        if($this->id_survey_question){
            $db->update('surveyquestion', [
                'survey_id' => $this->survey_id,
                'question_id' => $this->question_id,
                
                'subject_id' => $this->subject_id,              
            ], ['id_survey_question' => $this->id_survey_question]);
        }else{
            
            $this->id_survey_question = $db->insert('surveyquestion', [
                'survey_id' => $this->survey_id,
                'question_id' => $this->question_id,
                
                'subject_id' => $this->subject_id,

                
            ]);
        }
    }
    public function update($data) {
        if($this->id_survey_question){
            if(isset($data['survey_id'])) $this->survey_id = $data['survey_id'];
            if(isset($data['question_id'])) $this->question_id = $data['question_id'];
            
            if(isset($data['subject_id'])) $this->subject_id = $data['subject_id'];

            
            $this->save();
        }
    }

    public function delete() {
        if($this->id_survey_question){
            $db = new Database();
            $survey_questionData = $db->select('surveyquestion', ['id_survey_question' => $this->id_survey_question]);
            if (!$survey_questionData) {
                throw new Exception("Surveyquestion not found.");
            }
            $db->delete('surveyquestion', ['id_survey_question' => $this->id_survey_question]);
        }
    }
  
}