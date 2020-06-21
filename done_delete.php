<?php
include_once "./com/base.php";
$id = $_POST['id'];


$period = find('invoice', ['id' => '190']);
$period = $period['period'];
$sql = "DELETE from invoice WHERE id=$id";

$res = $pdo->exec($sql);
header ("location:invoice_list.php?period=$period");
?>