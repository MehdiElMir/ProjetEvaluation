<?php
require_once '../db.php';
require_once '../Branch.php';



$db = new Database();


$faculty_id = $_POST['faculty'];

// Utilisez l'ID de la faculté pour récupérer toutes les branches correspondantes
$branch = new Branch();
$branch_data = $branch->getAllByFaculty($faculty_id);

// Vérifiez si des branches ont été trouvées et affichez-les si c'est le cas
if ($branch_data) {
    echo '<option value="0">Sélectionnez une branche</option>';
    
    foreach ($branch_data as $row) {
        echo '<option value="' . $row['id_branch'] . '">' . $row['branch_name'] . '</option>';
    }
} else {
    echo '<option>Aucune branche disponible</option>';
}


