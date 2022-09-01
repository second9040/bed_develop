<?php
    $opass  = $_POST['old_pass'];
    $npass1 = $_POST['new_pass1'];
    $npass2 = $_POST['new_pass2'];

    if(!empty($opass) && !empty($npass1) &&!empty($npass2)) {
        if (preg_match('/[^A-Za-z0-9]/', $opass) || preg_match('/[^A-Za-z0-9]/', $npass1) || preg_match('/[^A-Za-z0-9]/', $npass2)) {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => '密碼必須是英文或數字']);
            exit;
        }
        if($npass1 != $npass2) {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => '新密碼與確認密碼必須相同']);
            exit;
        }
        session_start();
        require_once __DIR__."/../php/DB.class.php";
        $db = new DB;
        $db->query("SELECT * FROM `{$db->prefix}_account` WHERE `id` = :id AND `status` = '1'");
        $db->bind(':id', $_SESSION["{$db->prefix}_accountid"]);
        $res = $db->first();
        if(!empty($res)) {
            if(password_verify($opass, $res['password'])) {
                $db->query("UPDATE `{$db->prefix}_account` SET `password` = :password WHERE `id` = :id");
                $db->bind(':id', $res['id']);
                $db->bind(':password', password_hash($npass1, PASSWORD_BCRYPT));
                $db->execute();                
                echo json_encode(['status' => 1, 'data' => '', 'msg' => '更改成功']);
            } else {
                echo json_encode(['status' => 0, 'data' => '', 'msg' => '舊密碼錯誤']);
            }
        } else {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => '帳號權限有誤，請重新登入']);
        }
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => '資料不可為空']);
    }
    exit;
    ///////////////////////////////////// password_hash($pwd, PASSWORD_BCRYPT);
?>

