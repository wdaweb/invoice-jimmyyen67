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

if ($res == 1) {
  echo "新增成功";
  echo "<a href='index.php'>繼續登陸</a>";
  echo "<a href='invoice_list.php'>查看發票</a>";
} else {
  echo "新增失敗";
}
