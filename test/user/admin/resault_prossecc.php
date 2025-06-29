<?php
include "../user.php";
session_start();

#we dont use as auth/validation in here because this progress is diffrent
if($_POST['names'] == null && empty($_POST['names'])){
    $_SESSION['error'] = "you should select a persen";
    header("location: /test/user/admin/show_resault.php");
}

#Admin object created in the auth/login_prossec
$data = $_SESSION['AdminObject']->data;

$AllNameSelected = $_POST['names'];

#Can that To be calculated with Multiply up users selected for display wich day can be planed
#0->can't  1->can be
$CanBe = [
    '0shanbe'=>1,
    '1shanbe'=>1,
    '2shanbe'=>1,
    '3shanbe'=>1,
    '4shanbe'=>1,
    '5shanbe'=>1,
    '6shanbe'=>1
];

#Point of any day that To be calculated with sum up users selected for recommand day to admin
#max point will recommending
$PointOfDays= [0, 0, 0, 0, 0, 0, 0];

foreach($data as $name=>$chooses){
    if(in_array($name, $AllNameSelected)){
        for($i=0; $i<7; $i++){
            $CanBe[$i . 'shanbe'] *= $chooses[$i.'shanbe'];
            $PointOfDays[$i] += $chooses[$i.'shanbe']; 
        }
    }
}

$max = max($PointOfDays);
$RecommandDay = array_filter($PointOfDays, function($value) use ($max) {
    return $value === $max;
});

$_SESSION['NamesOfThatSelected'] = $AllNameSelected;
$_SESSION['CanBe'] = $CanBe;
$_SESSION['RecommendDay'] = $RecommandDay;
header('location: /test/user/admin/display_resault_final.php');
?>
