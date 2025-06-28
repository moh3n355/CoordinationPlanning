<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client</title>

  <style>
    body {
      font-family: Tahoma, sans-serif;
      background-color: #f4f4f4;
      padding: 30px;
      text-align: center;
    }

    .btn {
      padding: 10px 20px;
      margin: 10px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      color: white;
      width: 200px;
    }

    .green { background-color: green; }
    .orange { background-color: orange; }
    .red { background-color: red; }

    .btn:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>

  <input type="button" value="Edit Information"
         class="btn green"
         onclick="window.location.href='/TEST/user/client/edit_info_client.php'"><br>

  <input type="button" value="Edit times"
         class="btn orange"
         onclick="window.location.href='/TEST/user/client/choose_times.php'"><br>

  <input type="button" value="Back"
         class="btn red"
         onclick="window.location.href='../../main.php'"><br>

</body>
</html>
