<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>統一發票中獎號碼</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <style>
    table {
      min-width: 800px;
      text-align: center;
    }

    .loader_1 {
      min-width: 800px;
      margin-top: 10px;
    }

    table tr td {
      padding: 3px;
      border: 1px solid #9997;
      border-collapse: collapse;
    }

    .text {
      font-size: x-large;
    }

    .reminder {
      text-align: left;
    }
  </style>
</head>

<body>

  <?php
  include_once("./include/header.php");


  // 設定讀取現在月份時，自動設定period是哪一階段
  if (date('n') == 1 || date('n') == 2) {
    $period_display = 1;
    $period_month = '1-2月';
  } elseif (date('n') == 3 || date('n') == 4) {
    $period_display = 2;
    $period_month = '3-4月';
  } elseif (date('n') == 5 || date('n') == 6) {
    $period_display = 3;
    $period_month = '5-6月';
  } elseif (date('n') == 7 || date('n') == 8) {
    $period_display = 4;
    $period_month = '7-8月';
  } elseif (date('n') == 9 || date('n') == 10) {
    $period_display = 5;
    $period_month = '9-10月';
  } elseif (date('n') == 11 || date('n') == 12) {
    $period_display = 6;
    $period_month = '11-12月';
  }

  // 設定標題顯示月份
  if (isset($_GET['period']) && $_GET['period'] == 1) {
    $period_month = '1-2月';
  } elseif (isset($_GET['period']) && $_GET['period'] ==  2) {
    $period_month = '3-4月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 3) {
    $period_month = '5-6月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 4) {
    $period_month = '7-8月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 5) {
    $period_month = '9-10月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 6) {
    $period_month = '11-12月';
  }

  include "./com/base.php";

  if (isset($_GET['period'])) {
    $period = $_GET['period'];
  } else {
    $period = $period_display;
  }

  // 檢查是否已經有輸入過該期發票中獎號碼！
  $sql = "SELECT COUNT(*) AS num FROM prizenumber where period = $period";
  $prize = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

  if ($prize['num'] > 0) {
    $sql = "SELECT * FROM prizenumber WHERE `period`=$period";
    $res = $pdo->query($sql)->fetch();
    $jackpot = $res['jackpot'];
    $special = $res['special'];
    $premium1 = $res['premium1'];
    $premium2 = $res['premium2'];
    $premium3 = $res['premium3'];
    $addition1 = $res['addition1'];
    $addition2 = $res['addition2'];
    $addition3 = $res['addition3'];
  ?>
    <!-- 選單列表 -->
    <div class="d-flex justify-content-center mt-3 mb-3">
      <nav class="nav nav-pills">
        <a class="nav-link active mr-2" href="index.php">首頁</a>
        <a class="btn btn-outline-primary" href="invoice_list.php">發票列表</a>
        <a class="nav-link" href="?period=1">1-2月</a>
        <a class="nav-link" href="?period=2">3-4月</a>
        <a class="nav-link" href="?period=3">5-6月</a>
        <a class="nav-link" href="?period=4">7-8月</a>
        <a class="nav-link" href="?period=5">9-10月</a>
        <a class="nav-link" href="?period=6">11-12月</a>
        <button type="button" id="delete-button" class="btn btn-outline-danger btn-sm text-danger" data-toggle="modal" data-target="#awarddelete">Delete</a>
      </nav>
      <div class="modal fade reminder" id="awarddelete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="awarddelete"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h1>是否確定刪除此筆資料？</h1>
              <p class="font-weight-bold">資料刪除後無法復原，需要再次輸入正確獎號。</p>
            </div>
            <div class="modal-footer">
              <form action="award_delete.php?">
                <input type="hidden" name="period" value="<?= $period ?>">
                <input type="submit" class="btn btn-danger btn-sm" value="確定刪除">
              </form>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">取消</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 表格本體 -->
    <div class="d-flex justify-content-center">
      <table>
        <tr>
          <td>
            <h2>年月份</h2>
          </td>
          <td>
            <span class="h3"><?= date('Y') ?>年 <?= $period_month ?> 發票中獎號碼</span>
            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#rulesforprize">
              領獎注意事項
            </button>
            <div class="modal fade reminder" id="rulesforprize" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="rulesforprizeLabel">領獎注意事項</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>(1). 領獎期間自109年4月6日起至109年7月6日止，中獎人請於領獎期間攜帶國民身分證(非本國國籍人士得以護照、居留證或內政部移民署核發入出境許可證等替代)及中獎統一發票，依代發獎金單位公告之兌獎營業時間臨櫃兌領，逾期不得領獎。</p>
                    <p>(2). 統一發票未依規定載明金額者，不得領獎。</p>
                    <p>(3) .統一發票買受人為政府機關、公營事業、公立學校、部隊及營業人者，不得領獎。</p>
                    <p>(4) .中三獎(含)以上者，依規定應由發獎單位扣繳20﹪所得稅款。</p>
                    <p>(5) .中五獎(含)以上者，依規定應繳納0.4%印花稅款。</p>
                    <p>(6) .中獎之統一發票，每張按其最高中獎獎別限領1個獎金。</p>
                    <p>(7) .詳細領獎規定，請查閱「統一發票給獎辦法」。若有疑義，請洽財金公司客服專線：4128282(手機請撥：02-4128282)，或至財金公司網站查詢。</p>
                    <p>(8) .財政部統一發票兌獎APP下載點：</p>
                    <img src="./images/Image 002.png" alt="">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td rowspan="2">
            <h4>特別獎</h4>
          </td>
          <td><span class="text-danger font-weight-bold text"><?= $jackpot ?></span></td>
        </tr>
        <tr>
          <td><span>同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元</td>
        </tr>
        <tr>
          <td rowspan="2">
            <h5>特獎</h5>
          </td>
          <td><span class="text-danger font-weight-bold text"><?= $special ?></span></td>
        </tr>
        <tr>
          <td><span>同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金200萬元</span></td>
        </tr>
        <tr>
          <td rowspan="2">
            <h5>頭獎</h5>
          </td>
          <td>
            <span class="text-danger font-weight-bold text"><?= $premium1 ?></span><br>
            <span class="text-danger font-weight-bold text"><?= $premium2 ?></span><br>
            <span class="text-danger font-weight-bold text"><?= $premium3 ?></span>
          </td>
        </tr>
        <tr>
          <td><span>同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金20萬元</span></td>
        </tr>
        <tr>
          <td>
            <h5>二獎</h5>
          </td>
          <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元</span></td>
        </tr>
        <tr>
          <td>
            <h5>三獎</h5>
          </td>
          <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末6 位相同者各得獎金1萬元</span></td>
        </tr>
        <tr>
          <td>
            <h5>四獎</h5>
          </td>
          <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末5 位相同者各得獎金4,000元</span></td>
        </tr>
        <tr>
          <td>
            <h5>五獎</h5>
          </td>
          <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末4 位相同者各得獎金1,000元</span></td>
        </tr>
        <tr>
          <td>
            <h5>六獎</h5>
          </td>
          <td><span>同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末3 位相同者各得獎金200元</span></td>
        </tr>
        <tr>
          <td>
            <h5>增開六獎</h5>
          </td>
          <td><span class="text-danger font-weight-bold text"><?= $addition1 ?></span>
            <span class="text-danger font-weight-bold text"><?= $addition2 ?></span>
            <span class="text-danger font-weight-bold text"><?= $addition3 ?></span></td>
        </tr>
        <tr>
          <td colspan="2" class="border-0">
            <a class="btn btn-outline-success w-100 my-3" href="prize.php?period=<?= $period ?>">開獎囉！</a>
          </td>
        </tr>
      </table>
    </div>
  <?php
  } else {
  ?>
    <!-- 選單列表 -->
    <div class="d-flex justify-content-center mt-3 mb-3">
      <nav class="nav nav-pills">
        <a class="nav-link active mr-2" href="index.php">首頁</a>
        <a class="btn btn-outline-primary" href="invoice_list.php">發票列表</a>
        <a class="nav-link" href="?period=1">1-2月</a>
        <a class="nav-link" href="?period=2">3-4月</a>
        <a class="nav-link" href="?period=3">5-6月</a>
        <a class="nav-link" href="?period=4">7-8月</a>
        <a class="nav-link" href="?period=5">9-10月</a>
        <a class="nav-link" href="?period=6">11-12月</a>
        <button type="button" id="disabled-button" class="btn btn-outline-danger btn-sm text-danger disabled" aria-disabled="true">Delete</a>

      </nav>
    </div>

    <!-- 主要內容 -->
    <div class="d-flex justify-content-center text-center">
      <form action="award_save.php" method="post">
        <h2><?= date('Y') ?>年 <?= $period_month ?> 發票中獎號碼</h2>
        <p><span class="font-weight-bold">尚未開獎</span>或<span class="font-weight-bold">尚未登錄號碼</span>喔</p>
        <button type="button" class="badge badge-pill badge-warning" data-toggle="modal" data-target="#exampleModalCenter">
          輸入中獎號碼
        </button>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><?= date('Y') ?>年 <?= $period_month ?>中獎號碼</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <input type="hidden" name="year" value="<?= date('Y') ?>">
                <!-- <option disabled value="<?= date('Y') ?>"><?= date('Y') ?>></option> -->


                <input type="hidden" name="period" value="<?= $period ?>">
                <!-- <option disabled value="<?= $period ?>"><?= $period_month ?></option> -->
                <input type="number" name="jackpot" placeholder="特別獎" required class="form-control"><br>
                <input type="number" name="special" placeholder="特獎" required class="form-control"><br>
                <input type="number" name="premium1" placeholder="頭獎-1" required class="form-control">
                <input type="number" name="premium2" placeholder="頭獎-2" required class="form-control">
                <input type="number" name="premium3" placeholder="頭獎-3" required class="form-control"><br>
                <input type="number" name="addition1" placeholder="增開六獎-1" required class="form-control">
                <input type="number" name="addition2" placeholder="增開六獎-2" class="form-control">
                <input type="number" name="addition3" placeholder="增開六獎-3" class="form-control">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="儲存">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  <?php
  }
  ?>
</body>

</html>