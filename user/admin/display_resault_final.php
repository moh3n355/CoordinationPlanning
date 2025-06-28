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

$causes = ["کسانی ک نمیتونن بیان:", "کسانی که ترجیج میدن نیان:","کسانی ک میتونن بیان:"];

$days = [
    "0shanbe" => "شنبه",
    "1shanbe" => "یکشنبه",
    "2shanbe" => "دوشنبه",
    "3shanbe" => "سه‌شنبه",
    "4shanbe" => "چهارشنبه",
    "5shanbe" => "پنجشنبه",
    "6shanbe" => "جمعه",
];
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>نتیجه نهایی</title>

  <style>
    body {
      font-family: Tahoma, sans-serif;
      background-color: #f4f4f4;
      padding: 30px;
      direction: rtl;
      text-align: right;
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

<p class="recommend">روزهای پیشنهادی:</p>
<?php
foreach ($RecommendDay as $day => $value) {
    echo $days[$day . 'shanbe'] . " | ";
}
?>
<br><br>

<input type="button" value="بازگشت" class="button"
       onclick="window.location.href='/test/user/admin/show_resault.php'">
<br><br>

<?php
foreach ($days as $key => $label) {
?>
    <fieldset>
        <legend><?php echo $label; ?></legend>

        <?php if ($CanBe[$key] == 0) { ?>
            <p class="not-available">در این روز نمیشود برنامه چید</p>
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
