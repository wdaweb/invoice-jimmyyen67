<?php
include_once "./com/base.php";

$year = $_POST['year'];
$period = $_POST['period'];
$jackpot = $_POST['jackpot'];
$special = $_POST['special'];
$premium1 = $_POST['premium1'];
$premium2 = $_POST['premium2'];
$premium3 = $_POST['premium3'];
$addition1 = $_POST['addition1'];
if (isset($_POST['addition2'])) {
    $addition2 = $_POST['addition2'];
} else {
    $addition2 = "null";
}
if (isset($_POST['addition3'])) {
    $addition3 = $_POST['addition3'];
} else {
    $addition3 = "null";
}

$sql = "insert into prizenumber (
    `year`,
    `period`,
    `jackpot`,
    `special`,
    `premium1`,
    `premium2`,
    `premium3`,
    `addition1`,
    `addition2`,
    `addition3`
) values (
    '$year',
    '$period',
    '$jackpot',
    '$special',
    '$premium1',
    '$premium2',
    '$premium3',
    '$addition1',
    '$addition2',
    '$addition3'
)";

$res = $pdo->exec($sql);


header("location:award.php");
