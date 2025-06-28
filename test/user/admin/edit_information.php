<?php
include "../user.php";
session_start();
$AdminObject = $_SESSION['AdminObject'];
$_SESSION['path'] = '/test/user/admin/edit_information.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit information</title>

  <style>
    body {
      font-family: Tahoma, sans-serif;
      background-color: #f4f4f4;
      padding: 30px;
      text-align: center;
      direction: ltr;
    }

    form {
      background-color: #fff;
      padding: 20px;
      margin: auto;
      width: 300px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      text-align: left;
      margin-bottom: 10px;
    }

    input[type="text"] {
      width: 100%;
      padding: 8px;
      margin-top: 4px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"],
    input[type="button"] {
      padding: 8px 12px;
      margin: 5px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    input[type="submit"] {
      background-color: green;
      color: white;
    }

    input[value="Back"] {
      background-color: red;
      color: white;
    }

    p {
      color: red;
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <form action="/TEST/user/admin/edit_prossecc.php" method="POST">
    <label>
      name:<br>
      <input type="text" name="username" value="<?php echo $AdminObject->GetName(); ?>">
    </label>

    <label>
      password:<br>
      <input type="text" name="userpassword" value="<?php echo $AdminObject->GetPassword(); ?>">
    </label>
    
    <input type="submit" value="submit">
  </form><br>

  <input type="button" value="Back"
         onclick="window.location.href='/test/user/admin/choose_admin.php'">

  <p>
    <?php 
      echo isset($_SESSION["error"]) ? $_SESSION["error"] : null; 
      unset($_SESSION["error"]);
    ?>
  </p>

</body>
</html>
