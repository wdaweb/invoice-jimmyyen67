<?php
include_once "./com/base.php";
$period = $_GET['period'];

del('prizenumber',['period'=>$period]);

to("award.php?period=$period");
