<?php
include "../user.php";

session_start();
$ClientObject = $_SESSION['ClientObject'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Information</title>
  
  <style>
    body {
      font-family: Tahoma, sans-serif;
      background-color: #f4f4f4;
      padding: 30px;
      text-align: center;
      direction: ltr;
    }

    form {
      background-color: white;
      margin: auto;
      padding: 20px;
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
      border-radius: 4px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    input[type="submit"],
    input[type="button"] {
      padding: 10px 20px;
      margin: 8px 4px;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
      color: white;
    }

    input[type="submit"] {
      background-color: green;
    }

    input[value="Back"] {
      background-color: red;
    }

    p {
      color: red;
      margin-top: 20px;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <form action="/TEST/user/client/edit_info_prossec.php" method="POST">
    <label>
      Username:<br>
      <input type="text" name="username" value="<?php echo $ClientObject->GetName(); ?>">
    </label>

    <label>
      Password:<br>
      <input type="text" name="userpassword" value="<?php echo $ClientObject->GetPassword(); ?>">
    </label>

    <input type="submit" value="submit">
  </form><br>

  <input type="button" value="Back" onclick="window.location.href='/test/user/client/choose_client.php'">

  <p>
    <?php 
      echo isset($_SESSION["error"]) ? $_SESSION["error"] : null; 
      unset($_SESSION["error"]);
    ?>
  </p>

</body>
</html>
