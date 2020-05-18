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
      font-weight: bolder;
      font-family: 'Microsoft Jhenghei';
    }

    .main {
      border: 2px solid #999;
      border-radius: 15px;
      padding: 15px 0px 15px 30px;
    }
  </style>
</head>

<?php
$year = date('Y');
$lastyear = $year - 1;
include_once "./include/header.php";
?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-4"></div>
      <div class="col-4 main">
        <div>
          <form action="invoice_save.php" method="POST">
            <div class="form-group">
              <label for="year">年份：</label>
              <select name="year" required class="form-control form-control-sm col-4">
                <option value="<?= $year ?>" selected><?= $year ?></option>
                <option value="<?= $lastyear ?>"><?= $lastyear ?></option>
              </select>
              <small class="form-text text-muted">*發票年份</small>
            </div>
            <div class="form-group">
              <label for="period">期別：</label>
              <select name="period" required class="form-control form-control-sm col-4">
                <option value="1">&nbsp;1~2月</option>
                <option value="2">&nbsp;3~4月</option>
                <option value="3">&nbsp;5~6月</option>
                <option value="4">&nbsp;7~8月</option>
                <option value="5">&nbsp;9~10月</option>
                <option value="6">11~12月</option>
              </select>
              <small class="form-text text-muted">*發票月份</small>
            </div>
            <div class="form-group">
              <label>獎號：</label>
              <div class="form-row">
                <div class="col-3">
                  <input type="text" name="code" id="code" onkeyup="this.value = this.value.toUpperCase();" required class="form-control
            "></div>
                <div class="col-5">
                  <input type="text" name="number" required class="form-control"></div>
              </div>
              <small class="form-text text-muted">*英文2碼、數字8碼</small>
            </div>
            <div class="form-group">
              <label>金額：</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text form-control">$</div>
                </div>
                <input type="number" name="expend" required class="form-control col-4">
              </div>
              <small class="form-text text-muted">*必填選項</small>
            </div>
            <div class="mb-3">
              <input type="submit" value="發票儲存" class="btn btn-primary btn-lg">
              <input type="reset" value="清除重寫" class="btn btn-danger btn-lg">
          </form>
        </div>
        <a href="invoice_list.php"><button class="btn btn-outline-primary btn-sm mt-2">查看發票</button></a>
        <a href="award.php"><button class="btn btn-outline-success btn-sm mt-2">中獎號碼</button></a>
        <a href="prize.php"><button class="btn btn-outline-warning btn-sm mt-2">兌獎系統</button></a>
        <a href="https://www.etax.nat.gov.tw/etw-main/web/ETW183W1/" target="_blank"><button class="btn btn-outline-info btn-sm mt-2">財政部網站</button></a>
      </div>
    </div>
    <div class="col-4"></div>
  </div>
  </div>
</body>

</html>