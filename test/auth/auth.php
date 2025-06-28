<?php
include "../db/recive_as_db.php";
include "../db/put_in_db.php";

interface BaseAuth {
    public function __construct($name, $password);
    public function check();
}

trait ReciveInfo {
    public $name;
    public $password;

    public function __construct($name, $password) {
        $this->name = $name;
        $this->password = $password;
    }
}

#for client also admin
class login implements BaseAuth {
    use ReciveInfo;

    #check that password who user inputed is correct
    public function check() {

        #RecivePassByName in the db/recive_as_db
        $RecivePassByName = new RecivePassByName;
        $resault = $RecivePassByName->Recive($this->name, $_SESSION['table']);
        if($resault == $this->password){
            return true;
        }
    }
}

class rigester implements BaseAuth {
    use ReciveInfo;

    #check that name who user inputed is uniqe in the database
    public function check() {

        #ReciveAllName in the db/recive_as_db
        $AllName = new ReciveAllName;
        $resault = $AllName->Recive();
            return $resault;
    }

    public function registerize(){

        #AddUser in the db/put_in_db
        $ObjectForRegister = new AddUser;
        $ObjectForRegister->add($this->name, $this->password);
    }
}
?>
