<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>統一發票管理系統</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <?php include "./include/header.php" ?>
  <form action="invoice_save.php" method="POST">
    年份：
    <select name="year">
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
    </select>
    <br>
    期別：
    <select name="period">
      <option value="1">1,2月</option>
      <option value="2">3,4月</option>
      <option value="3">5,6月</option>
      <option value="4">7,8月</option>
      <option value="5">9,10月</option>
      <option value="6">11,12月</option>
    </select>
    <br>
    獎號：
    <input type="text" name="code">
    <input type="text" name="number">
    <br>
    金額：
    <input type="number" name="expend">
    <input type="submit" value="儲存">
  </form>
</body>

</html>