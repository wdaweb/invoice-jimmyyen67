<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>發票登錄</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <?php
  include_once "./include/header.php";
  include_once "./com/base.php";

  // $sql = "insert into invoice (
  // `period`,
  // `year`,
  // `code`,
  // `number`,
  // `expend`
  // ) values (
  //   '" . $_POST['period'] . "',
  //   '" . $_POST['year'] . "',
  //   '" . $_POST['code'] . "',
  //   '" . $_POST['number'] . "',
  //   '" . $_POST['expend'] . "'
  //   )";

  // $res = $pdo->exec($sql);
  $table = 'invoice';
  $data = [
    'period' => $_POST['period'],
    'year' => $_POST['year'],
    'code' => $_POST['code'],
    'number' => $_POST['number'],
    'expend' => $_POST['expend'],
  ];

  $res = save($table, $data);

  if ($_POST['period'] == 1) {
    $period_month = '1,2月';
    $period = 1;
  } elseif ($_POST['period'] == 2) {
    $period_month = '3,4月';
    $period = 2;
  } elseif ($_POST['period'] == 3) {
    $period_month = '5,6月';
    $period = 3;
  } elseif ($_POST['period'] == 4) {
    $period_month = '7,8月';
    $period = 4;
  } elseif ($_POST['period'] == 5) {
    $period_month = '9,10月';
    $period = 5;
  } elseif ($_POST['period'] == 6) {
    $period_month = '11,12月';
    $period = 6;
  }

  if ($res == 1) {
  ?>
    <div class="container">
      <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
          <table>
            <tr>
              <th colspan="2">發票登錄成功！</th>
            </tr>
            <tr>
              <td>月份：</td>
              <td><?= $period_month ?></td>
            </tr>
            <tr>
              <td>發票號碼：</td>
              <td><?= $_POST['code'] ?><?= $_POST['number'] ?></td>
            </tr>
            <tr>
              <td>發票金額：</td>
              <td><?= $_POST['expend'] ?></td>
            </tr>
            <tr>
              <td><a href="index.php">繼續登錄</a></td>
              <td><a href="invoice_list.php?period=<?= $period ?>">查看列表</a></td>
            </tr>
          </table>
        </div>
        <div class="col-4"></div>
      </div>
    </div>
  <?php
  } else {
    echo "新增失敗";
    echo "<br>";
    echo "可能有資料未齊全或連線出了問題。";
    echo "<br>";
    echo "<a href='index.php'>回到登錄頁面</a>";
  }
  ?>
</body>

</html>