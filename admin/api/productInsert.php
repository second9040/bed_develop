<?php
    require_once __DIR__."/../php/DB.class.php";
    require_once __DIR__."/../php/saveImg.php";
    $db = new DB;
    $key = '';
    $val = '';
    $imgurl = '';
    if(!empty($_POST['imgUrl'])) {
        $imgurl = base64_image_content(9, $_POST['imgUrl']);
    }
    foreach($_POST as $k => $v) {
        if(!isset($v)) continue;
        if($k == 'imgUrl') continue;
        $key .= " `{$k}`,";
        $val .= " :{$k},";
    }
    if(!empty($key) && !empty($val)) {
        $key .= " `imgUrl`, `datetime`, `status`, `sort`";
        $val .= " :imgUrl, NOW(), '1', '0'";
        $db->query("INSERT INTO `{$db->prefix}_product` ({$key}) VALUES ({$val})");
        foreach($_POST as $k => $v) {
            if(!isset($v)) continue;
            $db->bind(":{$k}", $v);
        }
        $db->bind(":imgUrl", $imgurl);
        $db->execute();
        if(!empty($db->lastInsertId())) {
            echo json_encode(['status' => 1, 'data' => '', 'msg' => 'Success']);
        } else {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error1']);
        }
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => 'Error2']);
    }
    exit;
?>

