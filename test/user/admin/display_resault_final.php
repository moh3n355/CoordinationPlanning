<?php
include "../user.php";
session_start();

$CanBe = $_SESSION['CanBe'];
$RecommendDay = $_SESSION['RecommendDay'];
$NamesOfThatSelected = $_SESSION['NamesOfThatSelected'];

#Admin object created in the auth/login_prossec
$data = $_SESSION['AdminObject']->data;

foreach ($data as $name => $info){
    if(in_array($name, $NamesOfThatSelected)){
        $$name = $info;
    }
}

$causes = ["Those who can't come:", "Those who prefer not to come:", "Those who can to come:"];

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Final Resault</title>

  <style>
    body {
      font-family: Tahoma, sans-serif;
      background-color: #f4f4f4;
      padding: 30px;
      direction: ltr;
      text-align: left;
    }

    p {
      margin: 5px 0;
    }

    fieldset {
      background-color: #fff;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      box-shadow: 0 0 6px rgba(0,0,0,0.1);
    }

    legend {
      font-weight: bold;
      font-size: 18px;
      padding: 0 10px;
      color: #333;
    }

    .not-available {
      color: red;
      font-weight: bold;
    }

    .button {
      background-color: red;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      margin-bottom: 20px;
    }

    .button:hover {
      opacity: 0.9;
    }

    .recommend {
      font-size: 18px;
      margin-bottom: 20px;
      background-color: #dff0d8;
      padding: 10px;
      border-radius: 6px;
      display: inline-block;
    }
  </style>
</head>
<body>

<p class="recommend">Recommend Days:</p>
<?php
foreach ($RecommendDay as $day => $value) {
    echo $days[$day . 'shanbe'] . " | ";
}
?>
<br><br>

<input type="button" value="Back" class="button"
       onclick="window.location.href='/test/user/admin/show_resault.php'">
<br><br>

<?php
foreach ($days as $key => $label) {
?>
    <fieldset>
        <legend><?php echo $label; ?></legend>

        <?php if ($CanBe[$key] == 0) { ?>
            <p class="not-available">On this day, scheduling is not possible.</p>
        <?php } ?>

        <?php for ($i = 2; $i > -1; $i--) { ?>
            <p><?php echo $causes[$i]; ?></p>
            <?php foreach ($NamesOfThatSelected as $name) {
                if ($$name[$key] == $i) {
                    echo "<p>$name</p>";
                }
            } ?>
        <?php } ?>
    </fieldset>
<?php
}
?>

</body>
</html>
