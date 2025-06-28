<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>

  <style>
    body {
      font-family: sans-serif;
      background-color: #f4f4f4;
      padding: 30px;
      text-align: center;
    }

    .btn {
      padding: 10px 20px;
      margin: 10px;
      border: none;
      border-radius: 6px;
      color: white;
      cursor: pointer;
      font-size: 16px;
      width: 200px;
    }

    .green { background-color: green; }
    .orange { background-color: orange; }
    .yellow { background-color: goldenrod; }
    .red { background-color: red; }

    .btn:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>

  <input type="button" value="Edit information" 
    class="btn green" onclick="window.location.href='/TEST/user/admin/edit_information.php'"><br>

  <input type="button" value="Display Result" 
    class="btn orange" onclick="window.location.href='/TEST/user/admin/show_resault.php'"><br>

  <input type="button" value="Delete User" 
    class="btn yellow" onclick="window.location.href='/TEST/user/admin/delete_user.php'"><br>

  <input type="button" value="Back" 
    class="btn red" onclick="window.location.href='/TEST/index.php'"><br>

</body>
</html>
