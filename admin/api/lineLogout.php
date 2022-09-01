<?php
    require_once __DIR__."/../php/DB.class.php";
    $db = new DB;
    //查詢是否為綁定的帳號
    $db->query("UPDATE `{$db->prefix}_account_line` SET `accountid` = :accountid, `linename` = :linename WHERE `id` = 1");
    $db->bind(":accountid", null);
    $db->bind(":linename", null);
    $db->execute();
    echo json_encode(['status' => 1, 'data' => '', 'msg' => '解除綁定成功']);
?>

