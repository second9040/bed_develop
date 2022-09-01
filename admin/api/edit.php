<?php
    if(!empty($_POST)) {
        require_once __DIR__."/../php/DB.class.php";
        $db = new DB;
        $api = "";
        $sql = '';
        foreach($_POST as $k => $v) {
            if(!isset($v)) continue;
            if($k == 'id') continue;
            if($k == 'api') {
                $api = $v;
            } else {
                $sql .= " `{$k}` = :{$k},";
            }
        }
        if(!empty($sql) && !empty($sql)) {
            $sql .= " datetime = :datetime";
            $db->query("UPDATE `{$db->prefix}_{$api}` SET {$sql} WHERE `id` = :id");
            foreach($_POST as $k => $v) {
                if(!isset($v)) continue;
                if($k == 'api') continue;
                $db->bind(":{$k}", $v);
            }
            $db->bind(":datetime", date("Y-m-d H:i:s"));
            $db->execute();
            echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Success']);
        } else {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error']);
        }
        exit;
    }else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error']);
    }
?>