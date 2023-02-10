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
    
    $item->id = $data->id;
    
    // employee values
    $item->nom = $data->nom;
    $item->prenom = $data->prenom;
    $item->age = $data->age;
    $item->email = $data->email;
    $item->adresse = $data->adresse;
    $item->niveau = $data->niveau;
    $item->created = date('Y-m-d H:i:s');
    
    if($item->updateEtudiant()){
        echo json_encode("le Profil Etudiant a été mis a jour.");
    } else{
        echo json_encode("Echec de la mise à jour du profil étudiant ");
    }
?>