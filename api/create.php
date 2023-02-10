<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../class/Etudiant.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Etudiant($db);
    $data = json_decode(file_get_contents("php://input"));
    $item->nom = $data->nom;
    $item->prenom = $data->prenom;
    $item->age = $data->age;
    $item->email = $data->email;
    $item->adresse = $data->adresse;
    $item->niveau = $data->niveau;
    $item->created = date('Y-m-d H:i:s');
    
    if($item->createEtudiant()){
        echo json_encode('Profil Etudiant créé avec succès .');
    } else{
        echo json_encode('Erreur dans la création du profil etudiant.');
    }
?>