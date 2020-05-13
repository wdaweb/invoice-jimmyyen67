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
      font-weight: bolder;
      font-family: 'Microsoft Jhenghei';
    }

    .main {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<?php
$year = date('Y');
$lastyear = $year - 1;
include "./include/header.php";
?>

<body>
  <div class="container main">
    <div>
      <form action="invoice_save.php" method="POST">
        <div class="form-group">
          <label for="year">年份：</label>
          <select name="year" required class="form-control form-control-sm col-3">
            <option value="<?= $year ?>" selected><?= $year ?></option>
            <option value="<?= $lastyear ?>"><?= $lastyear ?></option>
          </select>
        </div>
        <div class="form-group">
          <label for="period">期別：</label>
          <select name="period" required class="form-control form-control-sm col-3">
            <option value="1">&nbsp;1, 2月</option>
            <option value="2">&nbsp;3, 4月</option>
            <option value="3">&nbsp;5, 6月</option>
            <option value="4">&nbsp;7,  8月</option>
            <option value="5">&nbsp;9, 10月</option>
            <option value="6">11,12月</option>
          </select>
        </div>
        <div class="form-group">
          <label>獎號：</label>
          <div class="form-row">
            <div class="col-3">
              <input type="text" name="code" id="code" onkeyup="this.value = this.value.toUpperCase();" required class="form-control form-control-sm
            "></div>
            <div class="col-5">
              <input type="text" name="number" required class="form-control form-control-sm"></div>
          </div>
          <small class="form-text text-muted">*英文2碼、數字8碼</small>
        </div>
        <div class="form-group">
          <label>金額：</label>
          <input type="number" name="expend" required class="form-control form-control-sm col-3">
          <small class="form-text text-muted">*必填選項</small>
        </div>
        <div>
          <input type="submit" value="儲存" class="btn btn-primary btn-sm mt-2">
          <input type="reset" value="清除" class="btn btn-danger btn-sm mt-2">
          <a href="invoice_list.php"><button class="btn btn-secondary btn-sm mt-2">查看發票</button></a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>