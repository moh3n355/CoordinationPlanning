<?php
include "../user.php";
include "../../auth/validation.php";
include "../../auth/auth.php";
// include "../../db/recive_as_db.php";

#Client object created in the auth/login_prossec
$ClientObject = $_SESSION['ClientObject'];

$UserName = $_POST['username'];
$UserPassword = $_POST['userpassword'];

#check $_POST isset and is not empty
$valid = validation::validize($UserName, $UserPassword, $_SESSION['path']);
if($valid == true){

    $authorizion = new authorizion($UserName, $UserPassword);
    $authorize = $authorizion->check();
         
        if($authorize !== false){

            $ReciveAllName = new ReciveAllName;
            $resault =$ReciveAllName->Recive();
            
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
