<?php
    if(!empty($_POST) && isset($_POST["api"]) && isset($_POST["id"]) && isset($_POST["status"])) {
        require_once __DIR__."/../php/DB.class.php";
        $api = $_POST["api"];
        $db = new DB;
        $db->query("UPDATE `{$db->prefix}_{$api}` SET `status` = :status WHERE `id` = :id");   
        $db->bind(":id",$_POST["id"]);
        $db->bind(":status",$_POST["status"]);    
        $db->execute();
        echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Success']);
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error']);
    }
    exit;
?>

