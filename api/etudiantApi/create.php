<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset = UTF-8");
    header("Access-Control-Methods: POST");

    include_once '../../config/database.php';
    include_once '../../class/etudiants.php';

    $database = new Database();
    $db = $database->getConnection();
    $insertEt = new Etudiant($db);
    // $data = json_decode(file_get_contents("php://input"));

    if(isset($_POST["id_etudiant"]) || isset($_POST["nom"]) || isset($_POST["prenom"]) || isset($_POST["age"])){
        if($_POST["id_etudiant"==""] || $_POST["nom"==""] || $_POST["prenom"==""] || $_POST["age"==""]){
            echo "il y a de(s) champ(s) vide";
            return;
        }
    }

    $data = array(
        'id_etudiant'=> htmlspecialchars(strip_tags($_POST["id_etudiant"])),
        'nom'=> htmlspecialchars(strip_tags($_POST["nom"])),
        'prenom'=> htmlspecialchars(strip_tags($_POST["prenom"])),
        'age'=> htmlspecialchars(strip_tags($_POST["age"]))
    );

    if($insertEt->add($data)){
        echo "insertion avec succes";
    }else{
        echo "erreur d'insertion";
    }
?>