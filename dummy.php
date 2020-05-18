<?php

include("./com/base.php");


$num = 10;
$char = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
for ($i = 0; $i < $num; $i++) {
  $code = $char[rand(0, 25)] . $char[rand(0, 25)];
  $data = [
    'period' => rand(1, 6),
    'year' => 2020,
    'code' => $code,
    'number' => rand(10000000, 99999999),
    'expend' => rand(10, 9999)
  ];
  echo $data['code'] . $data['number'] . "<br>";
  save("invoice", $data);
}
