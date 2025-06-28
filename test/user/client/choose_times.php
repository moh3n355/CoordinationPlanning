<?php
include "../user.php";
session_start();

#Client object created in the auth/login_prossec
$ClientObject = $_SESSION['ClientObject'];
$data = $ClientObject->data;

$days = [
    "0shanbe" => "Saturday",
    "1shanbe" => "Sunday",
    "2shanbe" => "Monday",
    "3shanbe" => "Tuesday",
    "4shanbe" => "Wednesday",
    "5shanbe" => "Thursday",
    "6shanbe" => "Friday",
];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <title>edit chooses times</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <style>
    body {
      font-family: Tahoma, sans-serif;
      background-color: #f4f4f4;
      padding: 30px;
      direction: ltr;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
    }

    form {
      margin: auto;
      max-width: 400px;
    }

    fieldset {
      background-color: #fff;
      padding: 15px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-shadow: 0 0 6px rgba(0,0,0,0.1);
      text-align: left;
    }

    legend {
      font-weight: bold;
      font-size: 16px;
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      cursor: pointer;
    }

    input[type="radio"] {
      margin-left: 8px;
    }

    button[type="submit"],
    input[type="button"] {
      padding: 10px 16px;
      margin-top: 10px;
      font-size: 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button[type="submit"] {
      background-color: green;
      color: white;
    }

    input[value="Back"] {
      background-color: red;
      color: white;
      margin-top: 10px;
    }

    p {
      color: red;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <h2>Choose status for every day</h2>

  <form action="/test/user/client/update_times_prossec.php" method="POST">
    <?php foreach ($days as $key => $label){ ?>
      <fieldset>
        <legend><?php echo $label; ?></legend>
        <label>
          <input type="radio" name="<?php echo $key ?>" value="2" <?= $data[$key] == 2 ? "checked" : "" ?>>
          I can to come
        </label>
        <label>
          <input type="radio" name="<?php echo $key ?>" value="1" <?= $data[$key] == 1 ? "checked" : "" ?>>
          prefer not to come
        </label>
        <label>
          <input type="radio" name="<?php echo $key ?>" value="0" <?= $data[$key] == 0 ? "checked" : "" ?>>
          I can't to come
        </label>
      </fieldset>
    <?php }; ?>

    <button type="submit">submit</button>
  </form>

  <br>
  <input type="button" value="Back"
         onclick="window.location.href='/test/user/client/choose_client.php'">

  <p>
    <?php
      if (isset($_SESSION["error"])) {
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
      }
    ?>
  </p>

</body>
</html>
