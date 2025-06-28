<?php
#this page created because this project will run on the licalhost
#any localhost has diffrent username and password
#for work with database, we recive thats as client
session_start();

# for comeback error that will create in the auth/validation
$_SESSION['path'] = "/test/index.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>

  <style>
    body {
      font-family: sans-serif;
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

    label {
      display: block;
      text-align: left;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="password"] {
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
    }

    input[type="submit"] {
      background-color: green;
      color: white;
    }
    p {
      color: red;
      margin-top: 15px;
    }
  </style>
</head>
<body>
    <p style="color: blue; font-size: 18px; font-weight: bold; line-height: 1.6;">
        This program uses a localhost database.<br>
        To run this program, please enter your localhost's username and password.
    </p>
    <p style="color: red; font-size: 20px; font-weight: bold; line-height: 1.6;">
        If you already have test database, First drop that
    </p>

  <form action= '/test/auth/setup_prossecc.php' method="POST">
    <label>
      user of database:<br>
      <input type="text" name="user" 
        value="<?php echo isset($_COOKIE['user']) ? $_COOKIE['user'] : ''; ?>">
    </label>

    <label>
      password of database:<br>
      <input type="password" name="password" 
        value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
    </label>
    
    <input type="submit" value="submit">
  </form><br>
  <p>
    <?php 
      echo isset($_SESSION["error"]) ? $_SESSION["error"] : null; 
      unset($_SESSION["error"]);
    ?>
  </p>
</body>
</html>
