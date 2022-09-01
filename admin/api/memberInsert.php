<?php
    require_once __DIR__."/../php/DB.class.php";
    $db = new DB;
    session_start();
    $key = '';
    $val = '';
    foreach($_POST as $k => $v) {
        if(!isset($v)) continue;
        $key .= " `{$k}`,";
        $val .= " :{$k},";
    }
    if(!empty($key) && !empty($val)) {
        //創立訂單
        $key .= " datetime, status, category";
        $val .= " :datetime, :status, :category";
        $db->query("INSERT INTO `{$db->prefix}_account` ({$key}) VALUES ({$val})");
        foreach($_POST as $k => $v) {
            if(!isset($v)) continue;
            if($k == 'password') continue;
            $db->bind(":{$k}", $v);
        }
        //預設status為0 (未付款)
        $db->bind(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
        $db->bind(":datetime", date("Y-m-d H:i:s"));
        $db->bind(":status", '1');
        $db->bind(":category", $_SESSION["{$db->prefix}_category"]);
        $db->execute();
        if(!empty($db->lastInsertId())) {
            echo json_encode(['status' => 1, 'data' => '', 'msg' => '新增成功']);
        } else {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error1']);
        }
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error2']);
    }
    exit;
?>

