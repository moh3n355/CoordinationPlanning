<?php
session_start();

# for comeback error that will create in the auth/validation
$_SESSION['path'] = "/test/admin_main.php";

# declare table for edit admin information in the that used check isAdmin in the auth/login_prossec and check isAdmin
# for create a object as admin class(admin/user)
$_SESSION['table'] = "admins";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>

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

  <form action="/TEST/auth/login_prossec.php" method="POST">
    <label>
      name:<br>
      <input type="text" name="username"
        value="<?php echo isset($_COOKIE['AdminName']) ? $_COOKIE['AdminName'] : ''; ?>">
    </label>

    <label>
      password:<br>
      <input type="password" name="userpassword"
        value="<?php echo isset($_COOKIE['AdminPassword']) ? $_COOKIE['AdminPassword'] : ''; ?>">
    </label>
    
    <input type="submit" value="submit">
  </form><br>

  <input type="button" value="Back" onclick="window.location.href='/test/main.php'"><br><br>

  <!-- error received from auth/validation or auth/login_prossecc -->
  <p>
    <?php 
      echo isset($_SESSION["error"]) ? $_SESSION["error"] : null; 
      unset($_SESSION["error"]);
    ?>
  </p>

</body>
</html>
