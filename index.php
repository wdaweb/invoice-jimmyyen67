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
  <?php
  $year = date('Y');
  $lastyear = $year - 1;
  include "./include/header.php";
  ?>

  <div class="row">
    <div class="col-4"></div>
    <div class="col-4">
      <table>
        <form action="invoice_save.php" method="POST">
          <tr>
            <td>
              年份：
            </td>
            <td>
              <select name="year" required>
                <option value="<?= $year ?>" selected><?= $year ?></option>
                <option value="<?= $lastyear ?>"><?= $lastyear ?></option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              期別：
            </td>
            <td>
              <select name="period" required>
                <option value="1">1,2月</option>
                <option value="2">3,4月</option>
                <option value="3">5,6月</option>
                <option value="4">7,8月</option>
                <option value="5">9,10月</option>
                <option value="6">11,12月</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              獎號：
            </td>
            <td>
              <input type="text" name="code" id="code" onkeyup="this.value = this.value.toUpperCase();" required class="">
              <input type="text" name="number" required>
            </td>
          </tr>
          <tr>
            <td>
              金額：
            </td>
            <td>
              <input type="number" name="expend" required>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" value="儲存" class="btn btn-primary btn-sm mt-3">
            </td>
            <td>
              <input type="reset" value="清除" class="btn btn-secondary btn-sm mt-3">
            </td>
        </form>
        </tr>
        <tr>
          <td colspan="2">
            <a href="invoice_list.php"><button class="btn btn-secondary btn mt-3">查看發票</button></a>
          </td>
        </tr>
      </table>
    </div>
    <div class="col-4"></div>
    </>
</body>

</html>