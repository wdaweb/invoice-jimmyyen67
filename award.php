<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>統一發票中獎號碼</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <style>
    * {
      text-align: center;
    }

    table {
      min-width: 900px;
    }

    table tr td {
      padding: 3px;
      border: 1px solid #9997;
      border-collapse: collapse;
    }

    .text {
      font-size: x-large;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <?php
  include "./include/header.php";

  if (date('n') == 1 || date('n') == 2) {
    $year = date('Y') - 1912;
    $period = '11-12';
  } elseif (date('n') == 3 || date('n') == 4) {
    $year = date('Y') - 1911;
    $period = '1-2';
  } elseif (date('n') == 5 || date('n') == 6) {
    $year = date('Y') - 1911;
    $period = '3-4';
  } elseif (date('n') == 7 || date('n') == 8) {
    $year = date('Y') - 1911;
    $period = '5-6';
  } elseif (date('n') == 9 || date('n') == 10) {
    $year = date('Y') - 1911;
    $period = '7-8';
  } elseif (date('n') == 11 || date('n') == 12) {
    $year = date('Y') - 1911;
    $period = '9-10';
  }
  ?>
  <div class="d-flex justify-content-center">
    <table class="col-9">
      <form action="award_save.php" method="POST"></form>
      <tr>
        <td>
          <h2>年月份</h2>
        </td>
        <td>
          <h2><?= $year ?>年 <?= $period ?>月</h2>
        </td>
      </tr>
      <tr>
        <td rowspan="2">
          <h4>特別獎</h4>
        </td>
        <td><span class="text text-danger">12620024</span></td>
      </tr>
      <tr>
        <td><span>同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元</td>
      </tr>
      <tr>
        <td rowspan="2">
          <h4>特獎</h4>
        </td>
        <td><span class="text text-danger">39793895</span></td>
      </tr>
      <tr>
        <td><span>同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金200萬元</span></td>
      </tr>
      <tr>
        <td rowspan="2">
          <h4>頭獎</h4>
        </td>
        <td><span class="text text-danger">67913945</span><br><span class="text text-danger">09954061</span><br><span class="text text-danger">54574947</span></td>
      </tr>
      <tr>
        <td><span>同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金20萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>二獎</h4>
        </td>
        <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>三獎</h4>
        </td>
        <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>四獎</h4>
        </td>
        <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>五獎</h4>
        </td>
        <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>六獎</h4>
        </td>
        <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>增開六獎</h4>
        </td>
        <td><span class="text text-danger">700</span></td>
      </tr>
    </table>
  </div>


  <!-- <div class="d-flex justify-content-center">
    <table class="col-9">
      <tr>
        <td>
          <h2>年月份</h2>
        </td>
        <td>
          <h2><?= $year ?>年 <?= $period ?>月</h2>
        </td>
      </tr>
      <tr>
        <td rowspan="2">
          <h4>特別獎</h4>
        </td>
        <td><span class="text text-danger">12620024</span></td>
      </tr>
      <tr>
        <td><span>同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元</td>
      </tr>
      <tr>
        <td rowspan="2">
          <h4>特獎</h4>
        </td>
        <td><span class="text text-danger">39793895</span></td>
      </tr>
      <tr>
        <td><span>同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金200萬元</span></td>
      </tr>
      <tr>
        <td rowspan="2">
          <h4>頭獎</h4>
        </td>
        <td><span class="text text-danger">67913945</span><br><span class="text text-danger">09954061</span><br><span class="text text-danger">54574947</span></td>
      </tr>
      <tr>
        <td><span>同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金20萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>二獎</h4>
        </td>
        <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>三獎</h4>
        </td>
        <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>四獎</h4>
        </td>
        <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>五獎</h4>
        </td>
        <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>六獎</h4>
        </td>
        <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</span></td>
      </tr>
      <tr>
        <td>
          <h4>增開六獎</h4>
        </td>
        <td><span class="text text-danger">700</span></td>
      </tr>
    </table>
  </div> -->
</body>

</html>