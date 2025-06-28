<?php
include "auth.php";
include "../auth/validation.php";

$UserName = $_POST['username'];
$UserPassword = $_POST['userpassword'];

#check $_POST isset and is not empty
$valid = validation::validize($UserName, $UserPassword, $_SESSION['path']);
if($valid = true){

    #check username is uniqe in the database
    #rigester in auth/auth
    $rigesterObj = new rigester($UserName, $UserPassword);
    $resault = $rigesterObj->check();
    if(!in_array($UserName, $resault)){
        $rigesterObj->registerize();
        $_SESSION["error"] = "rigeester was successfully";
        header("Location: ../index.php");
    }
    else{
        $_SESSION["error"] = "you user name already is exsitence";
        header("Location: ../rigester_main.php");
    }
}
?>