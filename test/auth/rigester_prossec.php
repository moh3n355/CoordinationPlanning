<?php
include "auth.php";
include "../auth/validation.php";

$UserName = $_POST['username'];
$UserPassword = $_POST['userpassword'];

#check $_POST isset and is not empty
$valid = validation::validize($UserName, $UserPassword, $_SESSION['path']);
if($valid == true){

    #rigester in auth/auth
    $rigesterObj = new rigester($UserName, $UserPassword);
    $authorizion = new authorizion($UserName, $UserPassword);

        #check username and password is authorize
        $authorize = $authorizion->check();
        if($authorize !== false){
            
            #check username is uniqe in the database
            $resault = $rigesterObj->check();
            if(!in_array($UserName, $resault)){
            $rigesterObj->registerize();
            $_SESSION["error"] = "rigeester was successfully";
            header("Location: ../main.php");
            }
            else{
            $_SESSION["error"] = "your user name already is exsitence";
            header("Location: ../rigester_main.php");
            } 
        }
        else{
            header("Location: ../rigester_main.php");
        }
}
?>