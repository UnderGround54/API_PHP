<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Acces-Control-Allow-Mathods: POST");

    include_once '../../config/database.php';
    include_once '../../class/etudiants.php';

    $database = new Database();
    $db = $database->getConnection();
    $delete = new Etudiant($db);

    $id = htmlspecialchars(strip_tags($_GET["id_etudiant"]));

    if($delete->delete($id)){
        echo "Suppression avec succes";
    }else{
        echo "Erreur de suppression";
    }
?>