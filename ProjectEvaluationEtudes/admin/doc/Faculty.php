<?php 

require_once 'db.php';

class Faculty {
    public $id_faculty;
    public $faculty_name;
    
    public function __construct($id_faculty = null){
        if(!empty($id_faculty)){
            $this->id_faculty = $id_faculty;
            $this->loadFacultyDataFromDB();
        }
    }
    
    private function loadFacultyDataFromDB(){
        $db = new Database();
        $faculty_data = $db->select('faculty', ['id_faculty' => $this->id_faculty]);
        if(count($faculty_data) == 1){
            $faculty_data = $faculty_data[0];
            $this->faculty_name = $faculty_data['faculty_name'];
          
            
        }
    }

    public function getName(){
        return $this->faculty_name;
    }
    public function getAll(){
        $db = new Database();
        $faculty_data = $db->select('faculty');
        return $faculty_data;
    }


}