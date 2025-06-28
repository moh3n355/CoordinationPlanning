<?php
include "../user.php";
include "../../auth/validation.php";

$AdminObject = $_SESSION['AdminObject'];
$UserName = $_POST['username'];
$UserPassword = $_POST['userpassword'];

#check $_POST isset and is not empty
$valid = validation::validize($UserName, $UserPassword, $_SESSION['path']);
if($valid == true){
    $AdminObject->SetName($UserName);
    $AdminObject->SetPassword($UserPassword);
    $_SESSION['error'] = "change is successfully";
    header("location: /test/user/admin/edit_information.php"); 
}
?>