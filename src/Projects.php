<?php

    class Projects{
        private PDO $db;

        public function __construct(PDO $pdo){
            $this->db = $pdo;
        }

        public function create($nom,$description){
            $query = $this-> db -> prepare("INSERT INTO project(nom,description) VALUES (:nom,:description)");
            $query -> execute([
                ":nom" => $nom,
                ":description" => $description
            ]);
        }
    }
?>