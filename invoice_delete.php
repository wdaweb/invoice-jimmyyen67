<?php
include "./com/base.php";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

$sql = "select * from invoice where `id`=$id";
$res = $pdo->query($sql);
$edit = $res->fetch();

// 編輯內容變數
$year = $edit['year'];
$period = $edit['period'];
$code = $edit['code'];
$number = $edit['number'];
$expend = $edit['expend'];

// 預設年份
$currentyear = date('Y');
$lastyear = $year - 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>發票編輯</title>
</head>

<body>
  <form action="done_delete.php?id=<?= $id ?>" method="POST">
    <table>
      <tr>
        <td colspan="3">確定要刪除此筆發票嗎？</td>
      </tr>
      <tr>
        <td>年份</td>
        <td><select name="year" disabled>
            <option value="<?= $currentyear ?>" selected><?= $currentyear ?></option>
            <option value="<?= $lastyear ?>"><?= $lastyear ?></option>
          </select></td>
      </tr>
      <tr>
        <td>期別：</td>
        <td>
          <select name="period" disabled>
            <option value="1">1,2月</option>
            <option value="2">3,4月</option>
            <option value="3">5,6月</option>
            <option value="4">7,8月</option>
            <option value="5">9,10月</option>
            <option value="6">11,12月</option>
          </select></td>
      </tr>
      <tr>
        <td> 獎號：</td>
        <td> <input type="text" name="code" value="<?= $code ?>" onkeyup="this.value = this.value.toUpperCase();" disabled> </td>
        <td> <input type="text" name="number" value="<?= $number ?>" disabled></td>
      </tr>
      <tr>
        <td>金額</td>
        <td> <input type="number" name="expend" value="<?= $expend ?>" disabled></td>
      </tr>
      <tr>
        <td><input type="submit" value="確定刪除"></td>
  </form>
  <td colspan="2"> <a href="invoice_list.php">返回</a></td>
  </tr>
  </table>
</body>

</html>