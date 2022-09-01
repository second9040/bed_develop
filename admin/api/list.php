<?php
    if(!empty($_POST)) {
        require_once __DIR__."/../php/DB.class.php";
        $db = new DB;
        $key = '';
        $val = '';
        foreach($_POST as $k => $v) {
            if(!isset($v)) continue;
            if($k == 'api') {
                $api = $v;
            } else {
                $key .= " `{$k}`,";
                $val .= " :{$k},";
            }
        }
        if(!empty($api) && !empty($key) && !empty($val)) {
            //創立訂單
            $key .= " datetime, status, sort";
            $val .= " :datetime, :status, :sort";
            $db->query("INSERT INTO `{$db->prefix}_{$api}` ({$key}) VALUES ({$val})");
            foreach($_POST as $k => $v) {
                if(!isset($v)) continue;
                if($k == 'api') continue;
                $db->bind(":{$k}", $v);
            }
            //預設status為0 (未付款)
            $db->bind(":datetime", date("Y-m-d H:i:s"));
            $db->bind(":status", '1');
            $db->bind(":sort", '0');
            $db->execute();
            if(!empty($db->lastInsertId())) {
                echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Success']);
            } else {
                echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error1']);
            }
        } else {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error2']);
        }
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error']);
    }
    exit;
?>

