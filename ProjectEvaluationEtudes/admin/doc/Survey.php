<?php 


require_once 'db.php';



class Survey {
    public $id_survey;
    
    public $level_id;
    public $semestre_id;
    public $survey_statut;
    public $survey_created_at;
    public $Report;

    

    public function __construct($id_survey = null) {
        if($id_survey){
            $this->id_survey=$id_survey;
            $this->loadsurveyDataFromDB($id_survey);
        }
    }
    private function loadsurveyDataFromDB() {
        $db = new Database();
        $surveyData = $db->select('survey', ['id_survey' => $this->id_survey]);
        if(count($surveyData) == 1){


            $surveyData = $surveyData[0];
        $this->id_survey = $surveyData['id_survey'];
       
        $this->level_id = $surveyData['level_id'];
        $this->semestre_id = $surveyData['semestre_id'];
        $this->survey_created_at = $surveyData['survey_created_at'];
        $this->survey_statut = $surveyData['survey_statut'];
        $this->Report = $surveyData['Report'];
      
   
    }}

    public function save() {
        $db = new Database();
        if($this->id_survey){
            $db->update('survey', [
                
                'level_id' => $this->level_id,
                
                'semestre_id' => $this->semestre_id,              
                'survey_created_at' => $this->survey_created_at,           
                'survey_statut' => $this->survey_statut,              
                             
                'Report' => $this->Report,              
            ], ['id_survey' => $this->id_survey]);
        }else{
            
            $this->id_survey = $db->insert('survey', [
                'level_id' => $this->level_id,
                'semestre_id' => $this->semestre_id,
                'survey_created_at' => $this->survey_created_at,
                'survey_statut' => $this->survey_statut,              
                'Report' => $this->Report,
                
            ]);
        }
    }
    public function update($data) {
        if($this->id_survey){
            if(isset($data['level_id'])) $this->level_id = $data['level_id'];
            if(isset($data['id_survey'])) $this->id_survey = $data['id_survey'];
            if(isset($data['semestre_id'])) $this->semestre_id = $data['semestre_id'];
            if(isset($data['survey_statut'])) $this->survey_statut = $data['survey_statut'];
            if(isset($data['survey_created_at'])) $this->survey_created_at = $data['survey_created_at'];
            if(isset($data['Report'])) $this->Report = $data['Report'];

            
            $this->save();
        }
    }

    public function delete() {
        if($this->id_survey){
            $db = new Database();
            $surveyData = $db->select('survey', ['id_survey' => $this->id_survey]);
            if (!$surveyData) {
                throw new Exception("Surveyquestion not found.");
            }
            $db->delete('survey', ['id_survey' => $this->id_survey]);
        }
    }
    public function getAll(){
        $db = new Database();
        $survey_data = $db->select('survey');
        return $survey_data;
    }
  
}