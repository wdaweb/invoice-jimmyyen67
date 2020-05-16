<?php
include "./com/base.php";

$year = $_POST['year'];
$period = $_POST['period'];
$jackpot = $_POST['jackpot'];
$special = $_POST['special'];
$premium1 = $_POST['premium1'];
$premium2 = $_POST['premium2'];
$premium3 = $_POST['premium3'];
$additional = $_POST['additional'];

$sql = "insert into prizenumber (
    `year`,
    `period`,
    `jackpot`,
    `special`,
    `premium1`,
    `premium2`,
    `premium3`,
    `additional`
) values (
    '$year',
    '$period',
    '$jackpot',
    '$special',
    '$premium1',
    '$premium2',
    '$premium3',
    '$additional'
)";

$res = $pdo->exec($sql);


header("location:award.php");
?>