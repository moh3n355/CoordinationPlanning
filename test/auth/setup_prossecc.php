<?php
include "validation.php";

#this is default
$host = 'localhost';

$user = $_POST['user'];

#Because password can be ""
if(!empty($_POST['path'])){
    $pass = $_POST['password'];
}
else{
    $pass = "";
}

#for create tests and tables that we need
$sqlFile = __DIR__ . '/db/db.sql'; 

#check $_POST isset and is not empty(just user)
$valid = validation::validize($user, 'pass', $_SESSION['path']);
if($valid == true){

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $pass);

    // Check test database is exsistence
    $stmt = $pdo->query("SHOW DATABASES LIKE 'test'");
    $dbExists = $stmt->fetch();
    
    setcookie("user", $user, time() + (86400 * 30), "/");
    setcookie("password", $pass, time() + (86400 * 30), "/");

    if (!$dbExists) {
        $sql = file_get_contents($sqlFile);
        $pdo->exec($sql);
        header("Location: ../main.php");
    }
    else{
        header("Location: ../main.php");
    }
}
catch (PDOException) {
    $_SESSION['error'] = 'connect to database is faild, Please try again';
    header("location: /test/index.php");
}
}
?>
