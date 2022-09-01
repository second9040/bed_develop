<?php
    require_once __DIR__."/../php/DB.class.php";
    require_once __DIR__."/../php/saveImg.php";
    $db = new DB;
    $sql = ''; 
    $imgurl = ''; 
    if(!empty($_POST['imgUrl'])) {
        $imgurl = base64_image_content(9, $_POST['imgUrl']);
    }
    foreach($_POST as $k => $v) {
        if(!isset($v)) continue;
        if($k == 'id' || $k == 'imgUrl') continue;
        $sql .= " `{$k}` = :{$k}, ";
    }
    if(!empty($sql)) {
        $sql .= " `datetime` = NOW(), `imgUrl` = :imgUrl ";
        $db->query("UPDATE `{$db->prefix}_product` SET {$sql} WHERE `id` = :id");
        foreach($_POST as $k => $v) {
            if(!isset($v)) continue;
            if($k == 'imgUrl') continue;
            $db->bind(":{$k}", $v);
        }
        $db->bind(":imgUrl", $imgurl);
        $db->execute();       
        echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Success']);
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error']);
    }
    exit;
?>

