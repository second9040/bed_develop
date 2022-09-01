<?php
    require_once __DIR__."/../php/DB.class.php";
    $db = new DB;
    $key = '';
    $val = '';
    foreach($_POST as $k => $v) {
        if(!isset($v)) continue;
        $key .= " `{$k}`,";
        $val .= " `:{$k}`,";
    }
    if(!empty($key) && !empty($val)) {
        $key = $key." datetime";
        $val = $val." :datetime";
        $db->query("INSERT INTO `{$db->prefix}_contact` ({$key}) VALUES ({$val})");
        foreach($_POST as $k => $v) {
            if(!isset($v)) continue;
            $db->bind(":{$k}", $v);
        }
        $db->bind(":datetime", date("Y-m-d H:i:s"));
        $db->execute();
        if(!empty($db->lastInsertId())) {
            echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Success']);
        } else {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error']);
        }
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error']);
    }

?>

