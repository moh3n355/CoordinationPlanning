<?php
include_once __DIR__ . '/../db/put_in_db.php';

interface Base{
    public function __construct($name, $password, $data, $db);
    public function SetName($NewName);
    Public function GetName();
    public function SetPassword($NewPassword);
    public function GetPassword();
    public function show();
}

trait BaseValue{
    private $name;
    private $password; 
    public $data;   
    public $table;

    public function __construct($name, $password, $data, $table,){
        $this->name = $name;
        $this->password = $password;
        $this->data = $data;
        $this->table = $table;
    }
    
    public function SetName($NewName){
        $ObjForChange = new ChangeData;
        $ObjForChange->change($NewName, $this->name,'name', $this->table);
        $this->name = $NewName;
    }   

    public function GetName(){
        return $this->name;
    }

    public function SetPassword($NewPassword){
        $ObjForChange = new ChangeData;
        $ObjForChange->change($NewPassword, $this->name,'password', $this->table);
        $this->password = $NewPassword;
    }

    public function GetPassword(){
        return $this->password;
    }
}

class admin implements Base{
   use BaseValue;

    public function show(){
        header("location: /TEST/user/admin/choose_admin.php");
    }

    public function DeleteUser($UserName){
        #DeleteUser in db/put_in_db
        $DeleteObj = new DeleteUser;
        $DeleteObj->delete($UserName);
    }

}

class client implements Base{
    use BaseValue;

    public function show(){
        header("location: /TEST/user/client/choose_client.php");
    }

    #update all times that user changed in the user/update_times_prossecc
    public function UpdateTimes($new_data, $target){

        #ChangeData in db/put_in_db
        $ObjForChange = new ChangeData;
        $ObjForChange->change($new_data, $this->name,$target, 'users');
    }

    #update data after UpdateTime for display times chooised after change
    #used in the user/client/update_time_prossecc
    public function UpdateData(){

        #ReciveInfoBynamein db/put_in_db
        $ObjForReciveInfo = new ReciveInfoByname;
        $this->data = $ObjForReciveInfo->Recive($this->name);
    }
}
?>