<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <?php
  include "./com/base.php";

  $sql = "insert into invoice (
  `period`,
  `year`,
  `code`,
  `number`,
  `expend`
  ) values(
    '" . $_POST['period'] . "',
    '" . $_POST['year'] . "',
    '" . $_POST['code'] . "',
    '" . $_POST['number'] . "',
    '" . $_POST['expend'] . "'
    )";

  $res = $pdo->exec($sql);

  if ($_POST['period'] == 1) {
    $period = '1,2月';
  } elseif ($_POST['period'] == 2) {
    $period = '3,41月';
  } elseif ($_POST['period'] == 3) {
    $period = '5,6月';
  } elseif ($_POST['period'] == 4) {
    $period = '7,8月';
  } elseif ($_POST['period'] == 5) {
    $period = '9,10月';
  } elseif ($_POST['period'] == 6) {
    $period = '11,12月';
  }

  if ($res == 1) {
  ?>
    <table>
      <tr>
        <th colspan="2">發票登錄成功！</th>
      </tr>
      <tr>
        <td>月份：</td>
        <td><?= $period ?></td>
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
        <td><a href="invoice_list.php">查看列表</a></td>
      </tr>
    </table>
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