<?php
if (!interface_exists('connect_db')) {
    interface connect_db {
        public static function connect();
    }
}

if (!class_exists('connect_PDOtoMysql')) {
    class connect_PDOtoMysql implements connect_db {
        public static function connect() {
            try {
                $db = new PDO(
                    "mysql:host=localhost;dbname=test",
                    "root",
                    ""
                );
                return $db;
            } catch (PDOException $e) {
                die("database not available, please try again");
            }
        }
    }
}  

if (!trait_exists('ConnectToDB')) {
    trait ConnectToDB {
        public $db;

        public function __construct() {
            $this->db = connect_PDOtoMysql::connect();
        }
    }
}
?>