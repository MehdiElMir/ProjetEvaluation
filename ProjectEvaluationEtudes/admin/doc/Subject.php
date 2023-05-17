<?php 

require_once 'db.php';


class Subject {
    public $id_subject;
    public $subject_name;
    public $professeur_id;
    public $level_id;
    public $semestre_id;
    public $subject_year;
    
   
    

    public function __construct($id_subject = null) {
        if($id_subject){
            $this->id_subject=$id_subject;
            $this->loadsubjectDataFromDB($id_subject);
        }
    }
    private function loadsubjectDataFromDB() {
        $db = new Database();
        $subjectData = $db->select('subject', ['id_subject' => $this->id_subject]);
        if(count($subjectData) == 1){


            $subjectData = $subjectData[0];
        
        $this->subject_name = $subjectData['subject_name'];
        $this->professeur_id = $subjectData['professeur_id'];
        $this->level_id = $subjectData['level_id'];
        $this->semestre_id = $subjectData['semestre_id'];
        $this->subject_year = $subjectData['subject_year'];
        
   
    }}

    public function save() {
        $db = new Database();
        if($this->id_subject){
            $db->update('subject', [
                'subject_name' => $this->subject_name,
                'professeur_id' => $this->professeur_id,
                'level_id' => $this->level_id,
                'semestre_id' => $this->semestre_id,
                'subject_year' => $this->subject_year,
                             
            ], ['id_subject' => $this->id_subject]);
        }else{
            
            $this->id_subject = $db->insert('subject', [
                'subject_name' => $this->subject_name,
                'professeur_id' => $this->professeur_id,
                'level_id' => $this->level_id,
                'semestre_id' => $this->semestre_id,
                'subject_year' => $this->subject_year,
                
                
            ]);
        }
    }
    public function update($data) {
        if($this->id_subject){
            if(isset($data['subject_name'])) $this->subject_name = $data['subject_name'];
            if(isset($data['professeur_id'])) $this->professeur_id = $data['professeur_id'];
            if(isset($data['level_id'])) $this->level_id = $data['level_id'];
            if(isset($data['semestre_id'])) $this->level_id = $data['semestre_id'];
            if(isset($data['subject_year'])) $this->level_id = $data['subject_year'];
           
            
            $this->save();
        }
    }

    public function delete() {
        if($this->id_subject){
            $db = new Database();
            $subjectData = $db->select('subject', ['id_subject' => $this->id_subject]);
            if (!$subjectData) {
                throw new Exception("Subject not found.");
            }
            $db->delete('subject', ['id_subject' => $this->id_subject]);
        }
    }
  
}