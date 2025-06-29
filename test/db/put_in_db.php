<?php
include "connect_to_db.php"; #db/ConnectToDB
include "recive_as_db.php";  #db/recive_as_db

class ChangeData implements BaseDB{
    use ConnectToDB;

    #for edit client or admin
    public function change($value, $username,$target, $table){
            $stmt = $this->db->prepare("update $table set $target='$value' where name='$username'");
            $stmt->execute();
    }
}

class AddUser implements BaseDB{
    use ConnectToDB;

    public function add($UserName, $UserPassword){
        $stmt = $this->db->prepare("INSERT INTO users (name, password) VALUES ('$UserName', '$UserPassword');");
        $stmt->execute();
    }
}

class DeleteUser implements BaseDb{
    use ConnectToDB;

    public function delete($name){
        $stmt = $this->db->prepare("DELETE FROM users WHERE name = '$name';");
        $stmt->execute();
    }
}
?>