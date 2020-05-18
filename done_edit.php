<?php
include_once "./com/base.php";
$id = $_GET['id'];
$year = $_POST['year'];
$period = $_POST['period'];
$code = $_POST['code'];
$number = $_POST['number'];
$expend = $_POST['expend'];

$sql = "UPDATE invoice SET year='$year', period='$period', code='$code', number='$number', expend='$expend' WHERE id=$id";

$res = $pdo->exec($sql);
header ("location:invoice.php?period=$period");