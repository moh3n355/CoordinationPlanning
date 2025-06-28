<?php
#for admin also for client:

include_once "auth.php";
include_once "../auth/validation.php";
include_once "../user/user.php";
include_once "../db/recive_as_db.php";

$UserName = $_POST['username'];
$UserPassword = $_POST['userpassword'];

#check $_POST isset and is not empty
$valid = validation::validize($UserName, $UserPassword, $_SESSION['path']);
if($valid == true){

    #check userpassword is correct
    #login in auth/auth
    $LoginObj = new login($UserName, $UserPassword);
    $OrginalPassword = $LoginObj->check();
    if($OrginalPassword == $UserPassword){
        
        #check user is admin
        if($_SESSION['table'] == 'admins'){

            setcookie("AdminName", $UserName, time() + (86400 * 30), "/");
            setcookie("AdminPassword", $UserPassword, time() + (86400 * 30), "/");

            #recive All info that in the database, will come useful in the futuer
            #ReciveAllInfo in db/recive_as_db
            $ObjForReciveInfo = new ReciveAllInfo;
            $data = $ObjForReciveInfo->Recive();

            #crate a object as admin class by data that user inputed
            #admin in user/user
            $admin = new admin($UserName, $UserPassword, $data, $_SESSION['table']);

            #for use as admin object in the othe page
            $_SESSION['AdminObject'] = $admin;

            #redirect to user/admin/choose_admin
            $admin->show();
        }
        else{
            setcookie("username", $UserName, time() + (86400 * 30), "/");
            setcookie("userpassword", $UserPassword, time() + (86400 * 30), "/");

            #recive All info associetad to client in the database, will come useful in the futuer
            #ReciveInfoByName in db/recive_as_db
            $ObjForReciveInfo = new ReciveInfoByname;
            $data = $ObjForReciveInfo->Recive($UserName);

            #crate a object as client class by data that user inputed
            #client in user/user
            $client = new client($UserName, $UserPassword, $data, $_SESSION['table']);

            #for use as admin object in the othe page
            $_SESSION['ClientObject'] = $client;

            #redirect to user/client/choose_client
            $client->show();
        }
    }
    else{
        $_SESSION["error"] = "your user name or password is incorrect";
        header("Location: ../index.php");
    }
}
?>