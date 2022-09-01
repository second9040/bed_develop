<?php
    if(!empty($_POST) && isset($_POST["api"]) && isset($_POST["id"]) && isset($_POST["sort"])) {
        require_once __DIR__."/../php/DB.class.php";
        $api = $_POST["api"];
        $db = new DB;
        $db->query("UPDATE `{$db->prefix}_{$api}` SET `sort` = :sort WHERE `id` = :id");   
        $db->bind(":id",$_POST["id"]);
        $db->bind(":sort",$_POST["sort"]);    
        $db->execute();
        echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Success']);
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error']);
    }
    exit;
?>

