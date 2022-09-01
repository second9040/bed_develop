<?php
    require_once __DIR__."/../php/DB.class.php";
    require_once __DIR__."/../php/saveImg.php";
    $db = new DB;
    if(!empty($_POST['img'])) {
        if(count($_POST['img']) > 8) {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => '圖片上傳數量一次最多為8張']);
            exit;
        }
        //為了跟上傳的順序一樣
        rsort($_POST['img']);
        foreach($_POST['img'] as $k => $v) {
            $img = base64_image_content($k, $v);
            $key = " `imgUrl`, `datetime`, `status`, `sort`";
            $val = " :imgUrl, NOW(), '1', '0'";
            $db->query("INSERT INTO `{$db->prefix}_product` ({$key}) VALUES ({$val})");
            $db->bind(":imgUrl", $img);
            $db->execute();
            if(empty($db->lastInsertId())) $err = 1;
        }
    }
    if($err) {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error1']);
    } else {
        echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Success']);
    }
    exit;
?>

