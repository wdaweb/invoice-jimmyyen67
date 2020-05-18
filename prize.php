<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>統一發票開獎系統</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<?php
include_once "./include/header.php";
include_once "./com/base.php";
?>
<?php
if (isset($_GET['period'])) {
  $period = $_GET['period'];
}

$sql_p = "SELECT * from prizenumber where `period`= '$period'";
$prize = $pdo->query($sql_p)->fetch(PDO::FETCH_ASSOC);
$sql_i = "SELECT * from invoice where `period` = '$period'";
$invoice = $pdo->query($sql_i)->fetchAll(PDO::FETCH_ASSOC);

$jackpot = $prize['jackpot'];
$special = $prize['special'];
$premium1 = $prize['premium1'];
$premium2 = $prize['premium2'];
$premium3 = $prize['premium3'];
$addition1 = $prize['addition1'];
$addition2 = $prize['addition2'];
$addition3 = $prize['addition3'];

echo "<pre>";
print_r($prize);
echo "</pre>";
$money = 0;
foreach ($invoice as $invoice) {

  $code = $invoice['code'];
  $number = $invoice['number'];
  $expend = $invoice['expend'];

  if ($number == $jackpot) {
    echo "就是這一張發票" .  "=>" . $code . $number;
    echo "<br>";
    echo "【特別獎】1,000萬";
    $money = $money + 10000000;
    echo "<br>";
  } elseif ($invoice['number'] == $prize['special']) {
    echo "就是這一張發票" . "=>" .  $code . $number;
    echo "<br>";
    echo "【特獎】200萬";
    $money = $money + 2000000;
    echo "<br>";
  } elseif (
    $number == $premium1 ||
    $number == $premium2 ||
    $number == $premium3
  ) {
    echo "就是這一張發票" . "=>" . $code . $number;
    echo "<br>";
    echo "【頭獎】100萬";
    $money = $money + 1000000;
    echo "<br>";
  } elseif (substr($number, -7) == substr($premium1, -7) || substr($number, -7) == substr($premium2, -7) || substr($number, -7) == substr($premium3, -7)) {
    echo "就是這一張發票" .  "=>" . $code . $number;
    echo "<br>";
    echo "【二獎】20萬";
    $money = $money + 200000;
    echo "<br>";
  } elseif (substr($number, -6) == substr($premium1, -6) || substr($number, -6) == substr($premium2, -6) || substr($number, -6) == substr($premium3, -6)) {
    echo "就是這一張發票" . "=>" .  $code . $number;
    echo "<br>";
    echo "【三獎】1萬";
    $money = $money + 10000;
    echo "<br>";
  } elseif (substr($number, -5) == substr($premium1, -5) || substr($number, -5) == substr($premium2, -5) || substr($number, -5) == substr($premium3, -5)) {
    echo "就是這一張發票" . "=>" .  $code . $number;
    echo "<br>";
    echo "【四獎】4,000";
    $money = $money + 4000;
    echo "<br>";
  } elseif (substr($number, -4) == substr($premium1, -4) || substr($number, -4) == substr($premium2, -4) || substr($number, -4) == substr($premium3, -4)) {
    echo "就是這一張發票" . "=>" .  $code . $number;
    echo "<br>";
    echo "【五獎】1,000";
    $money = $money + 1000;
    echo "<br>";
  } elseif (substr($number, -3) == substr($premium1, -3) || substr($number, -3) == substr($premium2, -3) || substr($number, -3) == substr($premium3, -3)) {
    echo "就是這一張發票" . "=>" .  $code . $number;
    echo "<br>";
    echo "【六獎】200";
    $money = $money + 200;
    echo "<br>";
  } elseif (substr($number, -3) == $addition1 || substr($number, -3) == $addition1 || substr($number, -3) == $addition1) {
    echo "就是這一張發票" . "=>" .  $code . $number;
    echo "<br>";
    echo "【新增六獎】200";
    $money = $money + 200;
    echo "<br>";
  }
}
echo "本期發票總計中了：" . number_format($money, 0, ',', ',') . "元";





?>

<body>
  <!-- 上方按鈕列 -->
  <div class="container text-center">
    <a href="index.php"><button class="btn btn-primary btn-sm mt-2">登錄頁面</button></a>
    <a href="invoice_list.php"><button class="btn btn-outline-primary btn-sm mt-2">查看發票</button></a>
    <a href="award.php"><button class="btn btn-outline-success btn-sm mt-2">中獎號碼</button></a>
    <a href="https://www.etax.nat.gov.tw/etw-main/web/ETW183W1/" target="_blank"><button class="btn btn-outline-info btn-sm mt-2">財政部網站</button></a>
  </div>
  <div>






  </div>
</body>

</html>