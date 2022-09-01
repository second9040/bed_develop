<?php
    if(!empty($_POST)) {
        include __DIR__."/../php/DB.class.php";
        $db = new DB;
        $api = "";
        $sql = "";
        foreach($_POST as $k => $v) {
            if(!isset($v)) continue;
            if($k == 'api') {
                $api = $v;
            } else {
                $sql .= " `{$k}` = :{$k},";
            }
        }  
        $sql = substr($sql, 0, -1);
       
        if(!empty($api) && !empty($sql)) {
            $db->query("UPDATE `{$db->prefix}_{$api}` SET {$sql} WHERE `id` = 1");
            foreach($_POST as $k => $v) {
                if(!isset($v)) continue;
                if($k == 'api') continue;
                $db->bind(":{$k}", $v);
            }
            $db->execute();
            echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Success']);
        } else {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error']);
        }
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error']);
    }

?>

