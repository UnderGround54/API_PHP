<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");

    include_once '../../config/database.php';
    include_once '../../class/etudiants.php';

    $database = new Database();
    $db = $database->getConnection();

    $upDateEtud = new Etudiant($db);

    $data = array(
        'id_etudiant'=> htmlspecialchars(strip_tags($_GET["id_etudiant"])),
        'nom'=> htmlspecialchars(strip_tags($_POST["nom"])),
        'prenom'=> htmlspecialchars(strip_tags($_POST["prenom"])),
        'age'=> htmlspecialchars(strip_tags($_POST["age"]))
    );

    if($upDateEtud->update($data)){
        echo "mise à jour avec succes";
    }else{
        echo "erreur de mise à jour";
    }

?>