<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>統一發票管理系統</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
  <?php include "./include/header.php";
  include "./com/base.php";
  $sql = "select * from invoice";
  $res = $pdo->query($sql);
  $list = $res->fetchAll();

  $period_current = '5,6月';

  $period1 = '1,2月';
  $period2 = '3,4月';
  $period3 = '5,6月';
  $period4 = '7,8月';
  $period5 = '9,10月';
  $period6 = '11,12月';
  ?>

  <div class="container main">
    <div>
      <table>
        <tr>
          <th><?= $period1 ?></th>
          <th><?= $period2 ?></th>
          <th><?= $period3 ?></th>
          <th><?= $period4 ?></th>
          <th><?= $period5 ?></th>
          <th><?= $period6 ?></th>
          <th> <a href="index.php"><button>回首頁</button></a></th>
        </tr>
      </table>
    </div>
    <div>
      <h2><?= $period_current ?> 發票列表</h2>
    </div>
    <div clas="invoice_main">
      <table>
        <tr>
          <td>發票號碼</td>
          <td>發票金額</td>
        </tr>
        <tr>
          <?php
          foreach ($list as $list) {
            echo"<tr>";
            echo"<td>";
            echo $list['code'];echo $list['number'];
            echo"</td>";
            echo"<td>";
            echo $list['expend'];
            echo"</td>";
            echo"</tr>";
          }
          ?>
        </tr>
      </table>
    </div>
  </div>








</body>

</html>