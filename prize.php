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

$money = 0;
$win_jackpot = [];
$win_special = [];
$win_premium_3 = [];
$win_premium_4 = [];
$win_premium_5 = [];
$win_premium_6 = [];
$win_premium_7 = [];
$win_premium_8 = [];
$win_addition = [];

foreach ($invoice as $invoice) {

  $code = $invoice['code'];
  $number = $invoice['number'];
  $expend = $invoice['expend'];

  if ($number == $jackpot) {
    // 【特別獎】1,000萬
    $win_jackpot[] = $code . $number;
    $money = $money + 10000000;
  } elseif ($invoice['number'] == $prize['special']) {
    // 【特獎】200萬
    $win_special[] = $code . $number;
    $money = $money + 2000000;
  } elseif (
    $number == $premium1 ||
    $number == $premium2 ||
    $number == $premium3
  ) {
    // 【頭獎】100萬
    $win_premium_8[] = $code . $number;
    $money = $money + 1000000;
  } elseif (substr($number, -7) == substr($premium1, -7) || substr($number, -7) == substr($premium2, -7) || substr($number, -7) == substr($premium3, -7)) {
    // 【二獎】20萬
    $win_premium_7[] = $code . $number;
    $money = $money + 200000;
  } elseif (substr($number, -6) == substr($premium1, -6) || substr($number, -6) == substr($premium2, -6) || substr($number, -6) == substr($premium3, -6)) {
    // 【三獎】1萬
    $win_premium_6[] = $code . $number;
    $money = $money + 10000;
  } elseif (substr($number, -5) == substr($premium1, -5) || substr($number, -5) == substr($premium2, -5) || substr($number, -5) == substr($premium3, -5)) {
    // 【四獎】4,000
    $win_premium_5[] = $code . $number;
    $money = $money + 4000;
  } elseif (substr($number, -4) == substr($premium1, -4) || substr($number, -4) == substr($premium2, -4) || substr($number, -4) == substr($premium3, -4)) {
    // 【五獎】1,000
    $win_premium_4[] = $code . $number;
    $money = $money + 1000;
  } elseif (substr($number, -3) == substr($premium1, -3) || substr($number, -3) == substr($premium2, -3) || substr($number, -3) == substr($premium3, -3)) {
    // 【六獎】200
    $win_premium_3[] = $code . $number;
    $money = $money + 200;
  } elseif (substr($number, -3) == $addition1 || substr($number, -3) == $addition2 || substr($number, -3) == $addition3) {
    //【新增六獎】200
    $win_addition[] = $code . $number;
    $money = $money + 200;
  }
}
// }number_format($money, 0, ',', ',')
?>

<body>
  <!-- 上方按鈕列 -->
  <div class="container text-center">
    <a href="index.php"><button class="btn btn-primary btn-sm mt-2">登錄頁面</button></a>
    <a href="invoice_list.php"><button class="btn btn-outline-primary btn-sm mt-2">查看發票</button></a>
    <a href="award.php"><button class="btn btn-outline-success btn-sm mt-2">中獎號碼</button></a>
    <a href="https://www.etax.nat.gov.tw/etw-main/web/ETW183W1/" target="_blank"><button class="btn btn-outline-info btn-sm mt-2">財政部網站</button></a>
  </div>

  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-4">
        <table>
          <tr>
            <th>獎別</th>
            <th>發票號碼</th>
            <th>中獎金額</th>
          </tr>
          <tr>
            <?php
            foreach ($win_jackpot as $win_jackpot) {
              echo "<td>";
              echo "特別獎";
              echo "</td>";
              echo "<td>";
              echo $win_jackpot;
              echo "</td>";
              echo "<td>";
              echo "1,000萬";
              echo "</td>";
            }
            ?>
          </tr>
          <tr>
            <?php
            foreach ($win_special as $win_special) {
              echo "<td>";
              echo "別獎";
              echo "</td>";
              echo "<td>";
              echo $win_special;
              echo "</td>";
              echo "<td>";
              echo "200萬";
              echo "</td>";
            }
            ?>
          </tr>
          <tr>
            <?php
            foreach ($win_premium_8 as $win_premium_8) {
              echo "<td>";
              echo "頭獎";
              echo "</td>";
              echo "<td>";
              echo $win_premium_8;
              echo "</td>";
              echo "<td>";
              echo "20萬";
              echo "</td>";
            }
            ?>
          </tr>
          <tr>
            <?php
            foreach ($win_premium_7 as $win_premium_7) {
              echo "<td>";
              echo "頭獎";
              echo "</td>";
              echo "<td>";
              echo $win_premium_7;
              echo "</td>";
              echo "<td>";
              echo "4萬";
              echo "</td>";
            }
            ?>
          </tr>
          <tr>
            <?php
            foreach ($win_premium_6 as $win_premium_6) {
              echo "<td>";
              echo "三獎";
              echo "</td>";
              echo "<td>";
              echo $win_premium_6;
              echo "</td>";
              echo "<td>";
              echo "1萬";
              echo "</td>";
            }
            ?>
          </tr>
          <tr>
            <?php
            foreach ($win_premium_5 as $win_premium_5) {
              echo "<td>";
              echo "四獎";
              echo "</td>";
              echo "<td>";
              echo $win_premium_5;
              echo "</td>";
              echo "<td>";
              echo "4,000元";
              echo "</td>";
            }
            ?>
          </tr>
          <tr>
            <?php
            foreach ($win_premium_4 as $win_premium_4) {
              echo "<td>";
              echo "五獎";
              echo "</td>";
              echo "<td>";
              echo $win_premium_4;
              echo "</td>";
              echo "<td>";
              echo "1,000元";
              echo "</td>";
            }
            ?>
          </tr>
          <tr>
            <?php
            foreach ($win_premium_3 as $win_premium_3) {
              echo "<td>";
              echo "六獎";
              echo "</td>";
              echo "<td>";
              echo $win_premium_3;
              echo "</td>";
              echo "<td>";
              echo "200元";
              echo "</td>";
            }
            ?>
          </tr>
          <tr>
            <?php
            foreach ($win_addition as $win_addition) {
              echo "<td>";
              echo "增開六獎";
              echo "</td>";
              echo "<td>";
              echo $win_addition;
              echo "</td>";
              echo "<td>";
              echo "200元";
              echo "</td>";
            }
            ?>
          </tr>
          <tr>
            <td colspan="3">本期中獎金額：<?= number_format($money, 0, ',', ',') ?>元</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</body>

</html>