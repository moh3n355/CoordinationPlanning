<?php
#for use as client object that crated as a class in user/user
include "../user.php"; 

session_start();

#Client object created in the auth/login_prossec
$ClientObject = $_SESSION['ClientObject'];
#data is all info that associted client
$passdata = $ClientObject->data;

for ($i = 0; $i < 7; $i++) {
    $target = $i . 'shanbe';
    $pass_date = $passdata[$target];
    $new_data = $_POST[$target];

    if($pass_date !== $new_data){
        $ClientObject->UpdateTimes($new_data, $target);
    }
}

#update data after UpdateTime for display times chooised after change
$ClientObject->UpdateData();
$_SESSION['error'] = "change is successfully";
header("Location: /test/user/client/choose_times.php");
?>