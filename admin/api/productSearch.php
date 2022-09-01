<?php
    require_once __DIR__."/../php/DB.class.php";
    $page   = $_POST["page"];
    $number = $_POST["number"];
    $db = new DB;
    $sql = '';
    //判斷頁數跟數量
    if(empty($page) || empty($number)) {
        echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Page Error']);
        exit;
    }
    //DB的status:2是刪除
    $db->query("SELECT * FROM `{$db->prefix}_product` WHERE `status` != '2' {$sql}");
    $res = $db->get();
    $total_number = $db->rowCount();
    //總頁數
    $total_page = ceil($total_number / $number);
    $db->query("SELECT * FROM `{$db->prefix}_product` WHERE `status` != '2' {$sql} ORDER BY `sort` ASC LIMIT :s_page, :e_page");
    //起始資料
    $start = ($page - 1) * $number;
    $end = $number;
    $db->bind(":s_page", (Int)$start);
    $db->bind(":e_page", (Int)$end);
    $data = $db->get();
    if(!empty($res)) {
        echo json_encode(['status' => 1, 'data' => $data, 'total_page' => $total_page, 'total_number' => $total_number, 'msg' => '']);
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'total_page' => $total_page, 'total_number' => $total_number, 'msg' => '查無資料']);
    }

    exit;
?>

