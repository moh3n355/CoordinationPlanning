<?php
include "connect_to_db.php"; #db/ConnectToDB

if (!interface_exists('BaseDB')) {
    interface BaseDB {
        public function __construct();
    }
}

if (!class_exists('RecivePassByName')) {
    class RecivePassByName implements BaseDB {
        use ConnectToDB;

        public function Recive($username, $DataBase) {
            $stmt = $this->db->prepare("SELECT password FROM $DataBase WHERE name = :name");
            $stmt->execute([':name' => $username]);
            $data = $stmt->fetch(PDO::FETCH_COLUMN);
            return (int)$data;
        }
    }
}

if (!class_exists('ReciveAllName')) {
    class ReciveAllName implements BaseDB {
        use ConnectToDB;

        public function Recive() {
            $stmt = $this->db->prepare("SELECT name FROM users");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_COLUMN);
            return $data;
        }
    }
}

if (!class_exists('ReciveInfoByname')) {
    class ReciveInfoByname implements BaseDB {
        use ConnectToDB;

        public function Recive($username) {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE name = :name");
            $stmt->execute([':name' => $username]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
    }
}

if (!class_exists('ReciveAllInfo')) {
    class ReciveAllInfo implements BaseDB {
        public $columns = ['0shanbe', '1shanbe', '2shanbe', '3shanbe', '4shanbe', '5shanbe', '6shanbe'];   
        public $db;
        public $columns_str;

        public function __construct() {
            $this->db = connect_PDOtoMysql::connect();

            #because we can't use as arraye in the query
            $this->columns_str = implode(", ", $this->columns);
        }

        public function Recive() {
            $stmt = $this->db->query("SELECT name, {$this->columns_str} FROM users");
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $resault = [];
            
            #organize data
            foreach ($data as $row) {
                $username = $row['name'];

                $week_values = [
                    '0shanbe' => (int)$row['0shanbe'],
                    '1shanbe' => (int)$row['1shanbe'],
                    '2shanbe' => (int)$row['2shanbe'],
                    '3shanbe' => (int)$row['3shanbe'],
                    '4shanbe' => (int)$row['4shanbe'],
                    '5shanbe' => (int)$row['5shanbe'],
                    '6shanbe' => (int)$row['6shanbe'],
                ];

                $resault[$username] = $week_values;
            }
            return $resault;
        }
    }
}
?>
