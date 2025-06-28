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

    public function authorize(){

        if(strlen($this->name)>20 || strlen((string)$this->password)>10){
            $_SESSION['error'] = 'your username or password is so long';
            return false;
        }
        elseif(!preg_match('/^[a-zA-Z][^آ-ی]+$/u', $this->name)){
            $_SESSION['error'] = "username must be English and specil charecter \n and start with letters and";
            return false;
        }
        elseif(!preg_match('/^[^آ-ی]+$/u', $this->password)){
            $_SESSION['error'] = 'password must be English and specil charecter';
            return false;
        }
        else{
            return true;
        }
    }

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

class authorizion implements BaseAuth{
    use ReciveInfo;

    public function check(){
        if(strlen($this->name)>20 || strlen((string)$this->password)>10){
            $_SESSION['error'] = 'your username or password is so long';
            return false;
        }
        elseif(!preg_match('/^[a-zA-Z][^آ-ی]+$/u', $this->name)){
            $_SESSION['error'] = "username must be English and specil charecter \n and start with letters";
            return false;
        }
        elseif(!preg_match('/^[^آ-ی]+$/u', $this->password)){
            $_SESSION['error'] = 'password must be English and specil charecter';
            return false;
        }
        else{
            return true;
        } 
    }
}
?>