<?php
require_once '../db.php';
require_once '../Subject.php';
// Récupération des matières selon le level et le semestre choisi
if(isset($_POST["level"]) && isset($_POST["semestre"])) {
    $db = new Database();
    $level = $_POST["level"];
    $semestre = $_POST["semestre"];
    $subjects = $db->select("subject", ["level_id" => $level, "semestre_id" => $semestre]);
//    $subjects = $db->select("subject", ["level_id" => $level, "semestre_id" => $semestre]);


    if($subjects) {
        echo json_encode($subjects);
    } else {
        echo "Aucun sujet disponible";
    }
} else {
    echo "Paramètres manquants";
}
