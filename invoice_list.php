<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>統一發票管理系統</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/bootstrap.css">

  <style>
    body {
      height: 100vh;
    }

    .main {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .invoice_main {
      border: 1px solid #333333;
      height: 50vh;
      width: 100%;
    }
  </style>
</head>

<body>
  <?php
  include "./com/base.php";
  include "./include/header.php";

  // 設定讀取現在月份時，自動設定period是哪一階段
  if (date('n') == 1 || date('n') == 2) {
    $period_display = 1;
    $period_month = '1,2月';
  } elseif (date('n') == 3 || date('n') == 4) {
    $period_display = 2;
    $period_month = '3,4月';
  } elseif (date('n') == 5 || date('n') == 6) {
    $period_display = 3;
    $period_month = '5,6月';
  } elseif (date('n') == 7 || date('n') == 8) {
    $period_display = 4;
    $period_month = '7,8月';
  } elseif (date('n') == 9 || date('n') == 10) {
    $period_display = 5;
    $period_month = '9,10月';
  } elseif (date('n') == 11 || date('n') == 12) {
    $period_display = 6;
    $period_month = '11,12月';
  }

  // 設定頁面顯示哪一個period內容
  if (isset($_GET['period'])) {
    $period = $_GET['period'];
  } else {
    $period = $period_display;
  }

  // 設定標題顯示月份
  if (isset($_GET['period']) && $_GET['period'] == 1) {
    $period_month = '1,2月';
  } elseif (isset($_GET['period']) && $_GET['period'] ==  2) {
    $period_month = '3,4月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 3) {
    $period_month = '5,6月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 4) {
    $period_month = '7,8月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 5) {
    $period_month = '9,10月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 6) {
    $period_month = '11,12月';
  }

  // 設定抓取內容
  $year = date('Y');
  $sql = "select * from invoice where (`period`=$period) AND (`year`=$year)";
  $res = $pdo->query($sql);
  $list = $res->fetchAll();
  ?>

  <div class="container main">
    <div>
      <table>
        <tr>
          <div>
            <a href="?period=1"><button class="badge badge-warning">1,2月</button></a>
            <a href="?period=2"><button class="badge badge-warning">3,4月</button></a>
            <a href="?period=3"><button class="badge badge-warning">5.6月</button></a>
            <a href="?period=4"><button class="badge badge-warning">7,8月</button></a>
            <a href="?period=5"><button class="badge badge-warning">9,10月</button></a>
            <a href="?period=6"><button class="badge badge-warning">11,12月</button></a>
            <a href="index.php"><button class="badge badge-info">回首頁</button></a>
          </div>
        </tr>
      </table>
    </div>
    <div>
      <h2 class="mt-2"><?= $year ?>年 <?= $period_month ?> 發票列表</h2>
    </div>
    <div>
      <table>
        <tr>
          <td>發票號碼</td>
          <td>發票金額</td>
        </tr>
        <tr>
          <?php
          foreach ($list as $list) {
            echo "<tr>";
            echo "<td>";
            echo $list['code'];
            echo $list['number'];
            echo "</td>";
            echo "<td>";
            echo $list['expend'] . '元';
            echo "</td>";
            echo "<td>";
            echo "<a href='invoice_edit.php?id=$list[id]' class='btn btn-primary btn-sm active'>編輯</a>";
            echo "</td>";
            echo "<td>";
            echo "<a href='invoice_delete.php?id=$list[id]' class='btn btn-danger btn-sm'>刪除</a>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tr>
      </table>
    </div>
  </div>








</body>

</html>