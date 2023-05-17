<?php 

require_once 'db.php';

class Semestre {
    public $id_semestre;
    public $semestre_name;
    
    public function __construct($id_semestre = null){
        if(!empty($id_semestre)){
            $this->id_semestre = $id_semestre;
            $this->loadSemestreDataFromDB();
        }
    }
    
    private function loadSemestreDataFromDB(){
        $db = new Database();
        $semestre_data = $db->select('semestre', ['id_semestre' => $this->id_semestre]);
        if(count($semestre_data) == 1){
            $semestre_data = $semestre_data[0];
            $this->semestre_name = $semestre_data['semestre_name'];
          
            
        }
    }

    public function getName(){
        return $this->semestre_name;
    }
    public function getAll(){
        $db = new Database();
        $semestre_data = $db->select('semestre');
        return $semestre_data;
    }


}