<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../../config/database.php';
    include_once '../../class/etudiants.php';
    
    $database = new Database();
    $db = $database->getConnection();
    $etudiants = new Etudiant($db);
    $data = $etudiants->selectAll();

    if (isset($_GET["id_etudiant"])) {
        $id = $_GET["id_etudiant"];
        $data = $etudiants->select($id);
    }else{
        $data = $etudiants->selectAll();
    }
    echo json_encode($data);
?>