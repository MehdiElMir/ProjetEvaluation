<?php
require_once '../db.php';
require_once '../Level.php';



$db = new Database();
$branch_id = $_POST['branch'];


// Utilisez l'ID de la faculté pour récupérer toutes les branches correspondantes
$level = new Level();
$level_data = $level->getAllByBranch($branch_id);

// Vérifiez si des branches ont été trouvées et affichez-les si c'est le cas
if ($level_data) {
  echo '<option value="0">Sélectionnez un niveau</option>';
  foreach ($level_data as $row) {
    echo '<option value="' . $row['id_level'] . '">' . $row['level_number'] . '</option>';
  }
} else {
  echo '<option>Aucune Level disponible</option>';
}
