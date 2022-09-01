<?php
    require_once __DIR__."/../php/DB.class.php";
    $date   = $_POST["date"];
    $status = $_POST["status"];
    $page   = $_POST["page"];
    $number = $_POST["number"];
    $db = new DB;
    $sql = '';
    if(!empty($date) && !empty($date[0]) && !empty($date[1])) {
        $sql .= " AND `datetime` BETWEEN :s_time AND :e_time";
    }
    //前台2是全部 就不用看status
    if(isset($status) && $status != "2") {
        $sql .= " AND `status` = :status";
    }
    //判斷頁數跟數量
    if(empty($page) || empty($number)) {
        echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Page Error']);
        exit;
    }
    //DB的status:2是刪除
    $db->query("SELECT * FROM `{$db->prefix}_contact` WHERE `status` != '2' {$sql}");
    if(!empty($date) && !empty($date[0]) && !empty($date[1])) {
        $db->bind(":s_time", $date[0]." 00:00:00");
        $db->bind(":e_time", $date[1]." 23:59:59");
    }
    //前台2是全部 就不用看status
    if($status != "2") {
        $db->bind(':status', $status);
    }
    $res = $db->get();
    $total_number = $db->rowCount();
    //總頁數
    $total_page = ceil($total_number / $number);
    $db->query("SELECT * FROM `{$db->prefix}_contact` WHERE `status` != '2' {$sql} ORDER BY `id` DESC LIMIT :s_page, :e_page");
    if(!empty($date) && !empty($date[0]) && !empty($date[1])) {
        $db->bind(":s_time", $date[0]." 00:00:00");
        $db->bind(":e_time", $date[1]." 23:59:59");
    }
    if($status != "2") {
        $db->bind(':status', $status);
    }
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

