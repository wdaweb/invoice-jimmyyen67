<?php
include_once "./com/base.php";
$id = $_POST['id'];


$sql = "DELETE from invoice WHERE id=$id";

$res = $pdo->exec($sql);
header ("location:invoice_list.php");