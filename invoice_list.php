<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>統一發票管理列表</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/bootstrap.css">
  <script src="https://kit.fontawesome.com/65952ca494.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
    * {
      text-align: center;
    }

    body {
      height: 100vh;
    }

    .main {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .invoice_main {
      border: 1px solid #333333;
      height: 50vh;
      width: 100%;
    }
  </style>
</head>

<body>
  <?php
  include_once "./com/base.php";
  include_once "./include/header.php";

  // 設定讀取現在月份時，自動設定period是哪一階段
  if (date('n') == 1 || date('n') == 2) {
    $period_display = 1;
    $period_month = '1~2月';
  } elseif (date('n') == 3 || date('n') == 4) {
    $period_display = 2;
    $period_month = '3~4月';
  } elseif (date('n') == 5 || date('n') == 6) {
    $period_display = 3;
    $period_month = '5~6月';
  } elseif (date('n') == 7 || date('n') == 8) {
    $period_display = 4;
    $period_month = '7~8月';
  } elseif (date('n') == 9 || date('n') == 10) {
    $period_display = 5;
    $period_month = '9~10月';
  } elseif (date('n') == 11 || date('n') == 12) {
    $period_display = 6;
    $period_month = '11~12月';
  }

  // 設定頁面顯示哪一個period內容
  if (isset($_GET['period'])) {
    $period = $_GET['period'];
  } else {
    $period = $period_display;
  }

  // 設定標題顯示月份
  if (isset($_GET['period']) && $_GET['period'] == 1) {
    $period_month = '1,2月';
  } elseif (isset($_GET['period']) && $_GET['period'] ==  2) {
    $period_month = '3,4月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 3) {
    $period_month = '5,6月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 4) {
    $period_month = '7,8月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 5) {
    $period_month = '9,10月';
  } elseif (isset($_GET['period']) && $_GET['period'] == 6) {
    $period_month = '11,12月';
  }

  // 設定抓取內容
  $year = date('Y');
  $total = counts('invoice', ['period' => $period]);
  $onepage = 10;
  $pages = ceil($total / 10);
  $nowpage = (!empty($_GET['p'])) ? $_GET['p'] : 1;
  $start = ($nowpage - 1) * $onepage;
  $list = all('invoice', ['period' => $period], "order by `id` desc limit $start,$onepage", " order by ID desc");
  ?>

  <div class="container main">
    <div>
      <table>
        <tr>
          <div>
            <a href="index.php"><button class="badge badge-info">首頁</button></a>
            <a href="?period=1&page=1"><button class="badge badge-warning">1,2月</button></a>
            <a href="?period=2&page=1"><button class="badge badge-warning">3,4月</button></a>
            <a href="?period=3&page=1"><button class="badge badge-warning">5.6月</button></a>
            <a href="?period=4&page=1"><button class="badge badge-warning">7,8月</button></a>
            <a href="?period=5&page=1"><button class="badge badge-warning">9,10月</button></a>
            <a href="?period=6&page=1"><button class="badge badge-warning">11,12月</button></a>
            <a href="award.php"><button class="badge badge-success">中獎號碼</button></a>
          </div>
        </tr>
      </table>
    </div>
    <div>
      <h2 class="mt-2"><?= $year ?>年 <?= $period_month ?> 發票列表</h2>
    </div>

    <div style="text-align:center;" class="m-auto">
      <?php
      if ($nowpage > 0) {
        if ($nowpage == 1) {
      ?>
          <a href="#" class="btn btn-outline-secondary btn-sm disabled" role="button" style="width:4rem;">&lt;</a>
        <?php
        } else {
        ?>
          <a role="button" class="btn btn-primary btn-sm" href="?period=<?= $period ?>&p=<?= $nowpage - 1 ?>" style="width:4rem;">&lt;</a>
        <?php
        }
        ?>
      <?php
      }
      ?>
      <?php
      for ($i = 1; $i <= $pages; $i++) {
        $buttonstyle = ($i == $nowpage) ? 'btn btn-secondary btn-sm' : 'btn btn-outline-secondary btn-sm';
      ?>
        <a href="?period=<?= $period ?>&p=<?= $i ?>"><button class="<?= $buttonstyle ?>" style="width:2rem;"><?= $i ?></button></a>
        <?php
      }
      if ($nowpage <= $pages) {
        if ($nowpage == $pages) {
        ?>
          <a href="#" class="btn btn-outline-secondary btn-sm disabled" role="button" style="width:4rem;">&gt;</a>
        <?php
        } else {
        ?>
          <a role="button" class="btn btn-primary btn-sm" href="?period=<?= $period ?>&p=<?= $nowpage + 1 ?>" style="width:4rem;">&gt;</a>
        <?php
        }
        ?>
      <?php
      }
      ?>
    </div>

    <div class="container">
      <div class="row">
        <table class="table table-borderless table-hover">
          <thead>
            <tr class="row justify-content-md-center">
              <th class="col-1">年份</th>
              <th class="col-1">月份</th>
              <th class="col-1">發票號碼</th>
              <th class="col-1">金額</th>
              <td class='col-0.5'>
                <span class="btn-primary btn-sm active">編輯</span>
              </td>
              <td class='col-0.5'>
                <span class="btn-danger btn-sm active">刪除</span>
              </td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($list as $list) {
              echo "<tr class='row justify-content-md-center'>";
              echo "<td class='col-1'>";
              echo $list['year'];
              echo "</td>";
              echo "<td class='col-1'>";
              echo $period_month;
              echo "</td>";
              echo "<td class='col-1'>";
              echo $list['code'];
              echo $list['number'];
              echo "</td>";
              echo "<td class='col-1'>";
              echo $list['expend'] . '元';
              echo "</td>";
              echo "<td class='col-0.5'>";
              echo "<button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#editPanel'>
              編輯
            </button>";
            ?>
              <div class="modal fade" id="editPanel" tabindex="-1" aria-labelledby="editPanelLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="editPanelLabel">編輯發票</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="done_edit.php" method="POST">
                        <div class="form-group d-flex justify-content-center flex-wrap col-12">
                          <label for="year">年份：</label>
                          <div class="col-12 justify-content-center d-flex">
                            <select name="year" required class="form-control form-control-sm col-4">
                              <option value="2020" selected>2020</option>
                            </select>
                          </div>
                          <small class="form-text text-muted col-12">*發票年份</small>
                        </div>
                        <div class="form-group d-flex justify-content-center flex-wrap">
                          <label for="period col-12">期別：</label>
                          <div class="col-12 justify-content-center d-flex">
                            <select name="period" required class="form-control form-control-sm col-4">
                              <option value="<?= $period_display ?>">&nbsp;<?= $period_month ?></option>
                              <option value="1">&nbsp;1~2月</option>
                              <option value="2">&nbsp;3~4月</option>
                              <option value="3">&nbsp;5~6月</option>
                              <option value="4">&nbsp;7~8月</option>
                              <option value="5">&nbsp;9~10月</option>
                              <option value="6">11~12月</option>
                            </select>
                          </div>
                          <small class="form-text text-muted col-12">*發票月份</small>
                        </div>
                        <div class="form-group d-flex justify-content-center flex-wrap">
                          <label class="col-12">獎號：</label>
                          <div class="form-row d-flex justify-content-center">
                            <div class="col-2">
                              <input type="text" name="code" id="code" onkeyup="this.value = this.value.toUpperCase();" required class="form-control" value="<?= $list['code'] ?>"></div>
                            <div class="col-5">
                              <input type="text" name="number" required class="form-control" value="<?= $list['number'] ?>"></div>
                          </div>
                          <small class="form-text text-muted col-12">*英文2碼、數字8碼</small>
                        </div>
                        <div class="form-group d-flex justify-content-center flex-wrap">
                          <label>金額：</label>
                          <div class="input-group mb-2 d-flex justify-content-center">
                            <div class="input-group-prepend">
                              <div class="input-group-text form-control">$</div>
                            </div>
                            <input type="number" name="expend" required class="form-control col-4" value="<?= $list['expend'] ?>">
                            <small class="form-text text-muted col-12">*必填選項</small>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <input type="hidden" name="id" value="<?= $list['id'] ?>">
                      <input type="submit" class="btn btn-primary" value="編輯確認">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              echo "</td>";
              echo "<td class='col-0.5'>";
              echo "<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deletePanel'>
              刪除
            </button>";
              ?>
              <div class="modal fade" id="deletePanel" tabindex="-1" aria-labelledby="deletePanelLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="deletePanelLabel">確定刪除本張發票？</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <form action="done_delete.php" method="post">
                    </div>
                    <div class="modal-body">
                      <span class="font-weight-bold mr-5"><?= $list['code']; ?> <?= $list['number']; ?> </span>
                      <input type="hidden" name="id" value="<?= $list['id'] ?>">
                    </div>
                    <div class="modal-footer float-right">
                      <input type="submit" class="btn btn-danger" value="確認刪除">
                      <button type='button' class="btn btn-secondary" data-dismiss="modal">取消</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>









</body>

</html>