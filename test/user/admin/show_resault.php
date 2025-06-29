<?php
session_start();
include "../../db/recive_as_db.php";

# ReciveAllName in db/recive_as_db
$obj = new ReciveAllName;
$AllName = $obj->Recive();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choose Pesrons</title>

  <style>
    body {
      font-family: Tahoma, sans-serif;
      background-color: #f4f4f4;
      padding: 30px;
      text-align: center;
    }

    form {
      background-color: #fff;
      padding: 20px;
      margin: auto;
      width: 300px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h3 {
      margin-bottom: 20px;
    }

    .checkbox-group {
      text-align: left;
      margin-bottom: 8px;
    }

    input[type="checkbox"] {
      margin-left: 10px;
    }

    input[type="submit"],
    input[type="button"] {
      padding: 10px 15px;
      margin: 10px 5px;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
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
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <h3>Choose PSersons:</h3>

  <form action="/test/user/admin/resault_prossecc.php" method="POST">
    <?php 
    foreach($AllName as $name){ ?>
      <div class="checkbox-group">
        <input type="checkbox" name="names[]" value="<?php echo $name ?>" checked>
        <label><?php echo $name ?></label>
      </div>
    <?php } ?>

    <input type="submit" value="submit">
  </form>

  <input type="button" value="Back" onclick="window.location.href='/test/user/admin/choose_admin.php'">

  <p>
    <?php 
      echo isset($_SESSION["error"]) ? $_SESSION["error"] : null; 
      unset($_SESSION["error"]);
    ?>
  </p>

</body>
</html>
