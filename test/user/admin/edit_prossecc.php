<?php
include "../user.php";
include "../../auth/validation.php";
include "../../auth/auth.php";
include "../../db/recive_as_db.php";

$AdminObject = $_SESSION['AdminObject'];
$UserName = $_POST['username'];
$UserPassword = $_POST['userpassword'];

#check $_POST isset and is not empty
$valid = validation::validize($UserName, $UserPassword, $_SESSION['path']);
if($valid == true){

    $authorizion = new authorizion($UserName, $UserPassword);
    $authorize = $authorizion->check();
            
        if($authorize !== false){
            
        $AdminObject->SetName($UserName);
        $AdminObject->SetPassword($UserPassword);
        $_SESSION["error"] = "edit was successfully";
        header("Location: edit_information.php");
        }
    else{
        header("Location: edit_information.php");
    }
}
?>