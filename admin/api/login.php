<?php
    $acc = $_POST['acc'];
    $pwd = $_POST['password'];
    if(!empty($acc) && !empty($pwd)) {
        if (preg_match('/[^A-Za-z0-9]/', $acc) || preg_match('/[^A-Za-z0-9]/', $pwd)) {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => '帳號及密碼必須是英文或數字']);
            exit;
        }
        // if(strlen($pwd) < 6 || strlen($pwd) > 18) {
        //     echo json_encode(['status' => 0, 'data' => '', 'msg' => '密碼長度必須介於6~18碼']);
        // }
        require_once __DIR__."/../php/DB.class.php";
        $db = new DB;
        $db->query("SELECT * FROM `{$db->prefix}_account` WHERE `account` = :account AND `status` = '1'");
        $db->bind(':account', $acc);
        $res = $db->first();
        if(!empty($res)) {
            if(password_verify($pwd, $res['password'])) {
                session_start();
                $_SESSION["{$db->prefix}_login"]     = 1;
                $_SESSION["{$db->prefix}_account"]   = $res['account'];
                $_SESSION["{$db->prefix}_username"]  = $res['username'];
                $_SESSION["{$db->prefix}_accountid"] = $res['id'];
                echo json_encode(['status' => 1, 'data' => '', 'msg' => '登入成功']);
            } else {
                echo json_encode(['status' => 0, 'data' => '', 'msg' => '密碼錯誤']);
            }
        } else {
            echo json_encode(['status' => 0, 'data' => '', 'msg' => '查無此帳號']);
        }
    } else {
        echo json_encode(['status' => 0, 'data' => '', 'msg' => '帳號或密碼不可為空']);
    }
    exit;
    ///////////////////////////////////// password_hash($pwd, PASSWORD_BCRYPT);
?>

