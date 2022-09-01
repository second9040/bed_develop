<?php
    if(!empty($_POST) && isset($_POST["api"]) && isset($_POST["id"]) && isset($_POST["index_show"])) {
        require_once __DIR__."/../php/DB.class.php";
        $api = $_POST["api"];
        $db = new DB;
        $db->query("UPDATE `{$db->prefix}_{$api}` SET `index_show` = :index_show WHERE `id` = :id");   
        $db->bind(":id",$_POST["id"]);
        $db->bind(":index_show",$_POST["index_show"]);    
        $db->execute();
        echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Success']);
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error']);
    }
    exit;
?>

