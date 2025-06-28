<?php
include "../../db/recive_as_db.php";
include "../user.php";
include "../../auth/validation.php";

#Admin object created in the auth/login_prossec
$AdminObject = $_SESSION['AdminObject'];
$UserName = $_POST['username'];

#check $_POST isset and is not empty
$valid = validation::validize($UserName, 'default', $_SESSION['path']);
if($valid == true){

    #ReviceAllName in db/recive_as_db
    $AllName = new ReciveAllName;
    $resault = $AllName->Recive();

    #check that username selcted is exsitence in the database
    if(in_array($UserName, $resault)){

        #DeleteUser in db/recive_as_db
        $AdminObject->DeleteUser($UserName);
        $_SESSION["error"] = "delete was successfully";
    }
    else{
        $_SESSION["error"] = "user name not exsistence";
    }

header("Location: /test/user/admin/delete_user.php");
}
?>