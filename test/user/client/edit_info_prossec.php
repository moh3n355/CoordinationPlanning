<?php
include "../user.php";
include "../../auth/validation.php";
include "../../auth/auth.php";
// include "../../db/recive_as_db.php";

#Client object created in the auth/login_prossec
$ClientObject = $_SESSION['ClientObject'];

#POST['username'] , ['userpassword] recived as user/client/edit_info_prossecc
$UserName = $_POST['username'];
$UserPassword = $_POST['userpassword'];

#check $_POST isset and is not empty
#SESSION['path'] recive as any form that is valdating
$valid = validation::validize($UserName, $UserPassword, $_SESSION['path']);
if($valid == true){

    #authorizion in auth/auth
    $authorizion = new authorizion($UserName, $UserPassword);
    $authorize = $authorizion->check();
        
        #check username and password is authorize
        if($authorize !== false){
            
            #ReciveAllName in db/recive_as_db
            $ReciveAllName = new ReciveAllName;
            $resault =$ReciveAllName->Recive();
            
            #check username is uniqe in database
            if(!in_array($UserName, $resault)){
            
                $ClientObject->SetName($UserName);
                $ClientObject->SetPassword($UserPassword);
                $_SESSION["error"] = "edit was successfully";
                header("Location: edit_info_client.php");
            }
            else{
                $_SESSION["error"] = "your name already is exsistence";
                header("Location: edit_info_client.php");
            }
        }
    else{
        header("Location: edit_info_client.php");
    }
}
?>
