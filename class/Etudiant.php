<?php
    class Etudiant{
        // Connection
        private $conn;
        // Table
        private $db_table = "Etudiant";
        // Columns
        public $id;
        public $nom;
        public $prenom;
        public $age;
        public $email;
        public $adresse;
        public $niveau;
        public $created;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getEtudiants(){
            $sqlQuery = "SELECT id, nom,prenom, age, email, adresse, niveau ,created FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createEtudiant(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        nom = :nom, 
                        prenom = :prenom,
                        age = :age,
                        email = :email, 
                        adresse = :adresse,
                        niveau = :niveau, 
                        created = :created";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->nom=htmlspecialchars(strip_tags($this->nom));
            $this->prenom=htmlspecialchars(strip_tags($this->prenom));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->adresse=htmlspecialchars(strip_tags($this->adresse));
            $this->niveau=htmlspecialchars(strip_tags($this->niveau));
            $this->created=htmlspecialchars(strip_tags($this->created));
        
            // bind data
            $stmt->bindParam(":nom", $this->nom);
            $stmt->bindParam(":prenom", $this->prenom);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":adresse", $this->adresse);
            $stmt->bindParam(":niveau", $this->niveau);
            $stmt->bindParam(":created", $this->created);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // READ single
        public function getUnEtudiant(){
            $sqlQuery = "SELECT
                        id, 
                        nom,
                        prenom, 
                        age,
                        email, 
                        adresse,
                        niveau,
                        created
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->nom = $dataRow['nom'];
            $this->prenom = $dataRow['prenom'];
            $this->age = $dataRow['age'];
            $this->email = $dataRow['email'];
            $this->adresse = $dataRow['adresse'];
            $this->niveau = $dataRow['niveau'];
            $this->created = $dataRow['created'];
        }        
        // UPDATE
        public function updateEtudiant(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        nom = :nom, 
                        prenom = :prenom,
                        email = :email, 
                        age = :age, 
                        adresse = :adresse,
                        niveau = :niveau, 
                        created = :created
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->nom=htmlspecialchars(strip_tags($this->nom));
            $this->prenom=htmlspecialchars(strip_tags($this->prenom));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->adresse=htmlspecialchars(strip_tags($this->adresse));
            $this->niveau=htmlspecialchars(strip_tags($this->niveau));
            $this->created=htmlspecialchars(strip_tags($this->created));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":nom", $this->nom);
            $stmt->bindParam(":prenom", $this->prenom);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":adresse", $this->adresse);
            $stmt->bindParam(":niveau", $this->niveau);
            $stmt->bindParam(":created", $this->created);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteEtudiant(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>