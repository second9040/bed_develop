<?php
    require_once __DIR__."/../php/DB.class.php";
    $group  = $_POST["group"];
    $status = $_POST["status"];
    $title  = $_POST["title"];
    $page   = $_POST["page"];
    $number = $_POST["number"];
    $db = new DB;
    $sql = '';
    if(isset($group) && $group != "0") {
        $sql .= " AND `classify` = :group";
    }
    if(isset($title)) {
        $sql .= " AND `title` LIKE :title";
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
    $db->query("SELECT * FROM `{$db->prefix}_product` WHERE `status` != '2' {$sql} ORDER BY `sort` ASC, `id` ASC");
    if(isset($group) && $group != "0") {
        $db->bind(':group', $group);
    }
    if(isset($title)) {
        $db->bind(':title', "%{$title}%");
    }
    //前台2是全部 就不用看status
    if(isset($status) && $status != "2") {
        $db->bind(':status', $status);
    }
    $res = $db->get();
    $total_number = $db->rowCount();
    //總頁數
    $total_page = ceil($total_number / $number);
    $db->query("SELECT * FROM `{$db->prefix}_product` WHERE `status` != '2' {$sql} ORDER BY `sort` ASC, `id` ASC LIMIT :s_page, :e_page");
    if(isset($group) && $group != "0") {
        $db->bind(':group', $group);
    }
    if(isset($title)) {
        $db->bind(':title', "%{$title}%");
    }
    //前台2是全部 就不用看status
    if(isset($status) && $status != "2") {
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

