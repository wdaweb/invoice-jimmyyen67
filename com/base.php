<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=invoice";
$pdo = new PDO($dsn, 'root', "");
date_default_timezone_set("Asia/Taipei");
session_start();

// 查詢全部
function all($table, ...$arg)
{
    global $pdo;
    $sql = "select * from $table ";

    if (isset($arg[0]) && is_array($arg[0])) {
        $tmp = [];
        foreach ($arg[0] as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'", $key, $value);
        }
        $sql = $sql . " where " . implode(" && ", $tmp);
    }
    if (isset($arg[1])) {
        $sql = $sql . $arg[1];
    }

    return $pdo->query($sql)->fetchAll();
}


// 查詢單筆
function find($table, $arg)
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (isset($arg) && is_array($arg)) {
        $tmp = [];
        foreach ($arg as $key => $value) {
            $tmp[] = sprintf("`$key`='$value'", $key, $value);
        }
        $sql = $sql . ' WHERE  ' . implode(" && ", $tmp);
    }
    $row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $row;
}


// 算筆數
function nums($table, ...$arg)
{
    global $pdo;
    $sql = "select count(*) from $table ";

    if (isset($arg[0]) && is_array($arg[0])) {
        $tmp = [];
        foreach ($arg[0] as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'", $key, $value);
        }
        $sql = $sql . " where " . implode(" && ", $tmp);
    }
    if (isset($arg[1])) {
        $sql = $sql . $arg[1];
    }

    //echo $sql;

    return $pdo->query($sql)->fetchColumn();
}


// 新增/修改
function save($table, $arg)
{
    global $pdo;
    if (isset($arg['id'])) {
        //update
        foreach ($arg as $key => $value) {
            if ($key != 'id') {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
        }

        $sql = "update $table set " . implode(',', $tmp) . " where `id`='" . $arg['id'] . "'";
    } else {
        //insert

        $sql = "insert into $table (`" . implode("`,`", array_keys($arg)) . "`) values('" . implode("','", $arg) . "')";
    }
    return $pdo->exec($sql);
}


// 查詢
function q($sql)
{
    global $pdo;

    return $pdo->query($sql)->fetchAll();
}

del('invoice', 6);


// 刪除
function del($table, $arg)
{
    global $pdo;
    $sql = "delete from $table ";

    if (is_array($arg)) {
        $tmp = [];
        foreach ($arg as $key => $value) {
            $tmp[] = sprintf("`%s`='%s'", $key, $value);
        }
        $sql = $sql . " where " . implode(" && ", $tmp);
    } else {
        $sql = $sql . " where `id`='$arg'";
    }

    // echo $sql;
    return $pdo->exec($sql);
}

// 新增
function insert($table, $arg)
{
    global $pdo;

    //$str1="(`".implode("`,`",array_keys($arg))."`)";
    //echo $str1 . "<br>";
    //$str2="('".implode("','",$arg)."')";
    //echo $str2 . "<br>";
    $sql = "insert into $table (`" . implode("`,`", array_keys($arg)) . "`) values('" . implode("','", $arg) . "')";
    //   echo $sql;
    //return $pdo->exec($sql);

    return $pdo->exec($sql);
}

// 修改
function update($table, $arg)
{
    global $pdo;
    foreach ($arg as $key => $value) {
        if ($key != 'id') {
            $tmp[] = sprintf("`%s`='%s'", $key, $value);
        }
    }

    $sql = "update $table set " . implode(',', $tmp) . " where `id`='" . $arg['id'] . "'";
    //   echo $sql;
    return $pdo->exec($sql);
}


// 導向
function to($url)
{
    header("location:" . $url);
}
