<?php
    class Auth{

        public function __construct(){
            session_start();
        }

        public function isLoggedIn() : bool{
            return isset($_SESSION["id"]);
        }

        public function getId() : ?integer{
            return $_SESSION["id"] ?? null;
        }

        public function logout() : void{
            $_SESSION = [];
            session_destroy();
        }

        public function getAllUser($pdo){
            $query = $pdo -> execute("SELECT * FROM admin");
            $result = $query -> fetchAll();
            return $result;
        }

        public function createUser(PDO $pdo,string $user,string $password) : bool{


        }

    }
?>