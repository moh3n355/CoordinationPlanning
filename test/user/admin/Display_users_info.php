<?php
include '../../db/recive_as_db.php';
session_start();

//ReciveAllname in /db/recive_as_db
$forReciveAllname = new ReciveAllName;
$Allname = $forReciveAllname->Recive();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>User Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body {
      font-family: Tahoma, sans-serif;
      background-color: #f4f4f4;
      padding: 30px;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
    }

    .user-box {
      background-color: white;
      margin: 10px auto;
      padding: 15px;
      border-radius: 8px;
      width: 300px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: left;
    }

    .user-box p {
      margin: 0;
      font-size: 16px;
    }

    .back-button {
      background-color: red;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      margin-top: 30px;
      cursor: pointer;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <h2>User information</h2>

  <?php foreach ($Allname as $name): ?>
    <?php 
      $forRecivePass = new RecivePassByName();
      $Password = $forRecivePass->recive($name, 'users');
    ?>
    <div class="user-box">
      <p><strong>username:</strong> <?php echo $name; ?></p>
      <p><strong>password:</strong> <?php echo $Password; ?></p>
    </div>
  <?php endforeach; ?>

  <button class="back-button" onclick="window.location.href='/test/user/admin/choose_admin.php'">Back</button>

</body>
</html>
