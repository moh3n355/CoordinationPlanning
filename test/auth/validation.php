<?php
session_start();

class validation{
    public static function validize($username, $userpassword, $path){
            if(isset($username) && isset($userpassword)){
                if(!empty($username) && !empty($userpassword)){
                return true;}
            else{
                $_SESSION["error"] = "please entire all fields";
                header("Location: $path");
            }     
        }
    }
}
?>