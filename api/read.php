<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/Etudiant.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Etudiant($db);
    $stmt = $items->getEtudiants();
    $itemCount = $stmt->rowCount();

    echo json_encode($itemCount);
    if($itemCount > 0){
        
        $etudiantArr = array();
        $etudiantArr["body"] = array();
        $etudiantArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "nom" => $nom,
                "prenom" => $prenom,
                "age" => $age,
                "email" => $email,
                "adresse" => $adresse,
                "niveau" => $niveau,
                "created" => $created
            );
            array_push($etudiantArr["body"], $e);
        }
        echo json_encode($etudiantArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>