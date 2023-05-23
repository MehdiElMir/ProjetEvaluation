<?php


require_once 'db.php';



class Level
{
    public $id_level;
    public $level_name;
    public $level_number;
    public $branch_id;




    public function __construct($id_level = null)
    {
        if ($id_level) {
            $this->id_level = $id_level;
            $this->loadlevelDataFromDB($id_level);
        }
    }
    private function loadlevelDataFromDB()
    {
        $db = new Database();
        $levelData = $db->select('level', ['id_level' => $this->id_level]);
        if (count($levelData) == 1) {


            $levelData = $levelData[0];

            $this->level_name = $levelData['level_name'];
            $this->level_number = $levelData['level_number'];
            $this->branch_id = $levelData['branch_id'];
        }
    }

    public function save()
    {
        $db = new Database();
        if ($this->id_level) {
            $db->update('level', [
                'level_name' => $this->level_name,
                'level_number' => $this->level_number,
                'branch_id' => $this->branch_id,

            ], ['id_level' => $this->id_level]);
        } else {

            $this->id_level = $db->insert('level', [
                'level_name' => $this->level_name,
                'level_number' => $this->level_number,
                'branch_id' => $this->branch_id,


            ]);
        }
    }
    public function update($data)
    {
        if ($this->id_level) {
            if (isset($data['level_name'])) $this->level_name = $data['level_name'];
            if (isset($data['level_number'])) $this->level_number = $data['level_number'];
            if (isset($data['branch_id'])) $this->branch_id = $data['branch_id'];


            $this->save();
        }
    }

    public function delete()
    {
        if ($this->id_level) {
            $db = new Database();
            $levelData = $db->select('level', ['id_level' => $this->id_level]);
            if (!$levelData) {
                throw new Exception("Level not found.");
            }
            $db->delete('level', ['id_level' => $this->id_level]);
        }
    }
    public function getAllByBranch($branch_id)
    {
        $db = new Database();
        $level_Data = $db->select('level', ['branch_id' => $branch_id]);
        var_dump($level_Data);
        return $level_Data;
    }
}
