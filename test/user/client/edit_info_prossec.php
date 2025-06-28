<?php
include "../user.php";
include "../../auth/validation.php";

#Client object created in the auth/login_prossec
$ClientObject = $_SESSION['ClientObject'];

$UserName = $_POST['username'];
$UserPassword = $_POST['userpassword'];

#check $_POST isset and is not empty
$valid = validation::validize($UserName, $UserPassword, $_SESSION['path']);
if($valid == true){ 
    $ClientObject->SetName($UserName);
    $ClientObject->SetPassword($UserPassword);
    $_SESSION['error'] = "change is successfully";
    header("location: /test/user/client/edit_info_client.php");
}
?>