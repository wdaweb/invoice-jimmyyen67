<?php
include "./com/base.php";
$id = $_GET['id'];


$sql = "DELETE from invoice WHERE id=$id";

$res = $pdo->exec($sql);
header ("location:invoice.php");