<?php
    require_once __DIR__."/../php/DB.class.php";
    $date = $_POST["date"];
    $msg = "";
    if(empty($date)) {
        //沒日期就查今天
        $date = [date("Y-m-d"), date("Y-m-d")];
        $count_day = 1;
        $msg = "日期不可為空";
    }
    $d1 = strtotime($date[0]);
    $d2 = strtotime($date[1]);
    //計算2日相差天數
    $count_day = (($d2 - $d1) / 86400) + 1;
    $db = new DB;
    $db->query("SELECT `date`, `number`, date_format(`date`, '%Y') as YY, date_format(`date`, '%m') as MM, date_format(`date`, '%d') as DD FROM `{$db->prefix}_count` WHERE `date` BETWEEN :stime AND :etime GROUP BY `date`");
    $db->bind(":stime", $date[0]);
    $db->bind(":etime", $date[1]);
    $res = $db->get();
    $number = 0;
    $label  = [];
    $day    = [];
    //起始日
    $s = date("d", strtotime($date[0]));
    //結束日
    $e = date("d", strtotime($date[0])) + $count_day;
    for($i = $s; $i < $e; $i++) {
        $label[] = $i."日";
        $day[] = 0;
    }
    if(!empty($res)) {
        foreach ($res as $k => $v) {
            if($v["MM"] == $M) {
                $number += $v["number"];
                $day[$v["DD"]-1] = $v["number"];
            }
        }
    }
    
    // if(!empty($res)) {
        echo json_encode(['status' => 1, 'number' => $number, 'day' => $day, 'label' => $label, 'msg' => $msg]);
    // } else {
        // echo json_encode(['status' => 0, 'msg' => '查無資料']);
    // }
    exit;
?>

