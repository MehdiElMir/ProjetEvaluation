<?php 


require_once 'db.php';



class Branch {
    public $id_branch;
    public $branch_name;
    public $branch_code;
    public $levels_nbr;
    public $faculty_id;
    

    public function __construct($id_branch = null) {
        if($id_branch){
            $this->id_branch=$id_branch;
            $this->loadbranchDataFromDB($id_branch);
        }
    }
    private function loadbranchDataFromDB() {
        $db = new Database();
        $branchData = $db->select('branch', ['id_branch' => $this->id_branch]);
        if(count($branchData) == 1){


            $branchData = $branchData[0];
        
        $this->branch_name = $branchData['branch_name'];
        
        $this->branch_code = $branchData['branch_code'];
        $this->levels_nbr = $branchData['levels_nbr'];
        $this->faculty_id = $branchData['faculty_id'];
   
    }}

    public function save() {
        $db = new Database();
        if($this->id_branch){
            $db->update('branch', [
                'branch_name' => $this->branch_name,
                'branch_code' => $this->branch_code,
                'levels_nbr' => $this->levels_nbr,
                'faculty_id' => $this->faculty_id,               
            ], ['id_branch' => $this->id_branch]);
        }else{
            
            $this->id_branch = $db->insert('branch', [
                'branch_name' => $this->branch_name,
                'branch_code' => $this->branch_code,
                'levels_nbr' => $this->levels_nbr,
                'faculty_id' => $this->faculty_id,
                
            ]);
        }
    }
    public function update($data) {
        if($this->id_branch){
            if(isset($data['branch_name'])) $this->branch_name = $data['branch_name'];
            if(isset($data['branch_code'])) $this->branch_code = $data['branch_code'];
            if(isset($data['levels_nbr'])) $this->levels_nbr = $data['levels_nbr'];
            if(isset($data['faculty_id'])) $this->faculty_id = $data['faculty_id'];
            
            $this->save();
        }
    }

    public function delete() {
        if($this->id_branch){
            $db = new Database();
            $branchData = $db->select('branch', ['id_branch' => $this->id_branch]);
            if (!$branchData) {
                throw new Exception("Branch not found.");
            }
            $db->delete('branch', ['id_branch' => $this->id_branch]);
        }
    }
    public function getAllByFaculty($faculty_id){
        $db = new Database();
        $branch_Data = $db->select('branch', ['faculty_id' => $faculty_id]);
        var_dump($branch_Data);
        return $branch_Data;
    }
        
    
  
}