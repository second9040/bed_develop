<?php
    require_once __DIR__."/../php/DB.class.php";
    $folder = parse_ini_string(file_get_contents(__DIR__."/../php/folder.php"), true, INI_SCANNER_RAW)["FOLDER"];
    $db = new DB();
    //不是在login頁的話就檢查有沒有登入的session 沒有就回到Login
    if($_SERVER['PHP_SELF'] != "{$folder['folder']}/login.php") {
        session_start();
        if(empty($_SESSION["{$db->prefix}_login"])) {
            // sleep(1);
            header("location: {$folder['folder']}/login.php");
            exit;
        }
    }
    $name = empty($_SESSION["{$db->prefix}_username"]) ? $_SESSION["{$db->prefix}_account"] : $_SESSION["{$db->prefix}_username"];
    $title = "公司";
    $db->query("SELECT `title` FROM `{$db->prefix}_web_setting`");
    if (!empty($db->first())) {
        $title = $db->first()['title'];
    }

    // $db->query("SELECT * FROM `{$db->prefix}_logo`");
    // if (!empty($db->first())) {
    //     $logo = $db->first();
    // }  
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - 管理後台</title>
    <!-- <link rel="icon" href="dist/img/a_logo.svg"> -->
    <link rel="stylesheet" href="dist/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="dist/css/style.min.css">
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/fancybox/jquery.fancybox.min.js"></script>  
    <script src="dist/ckeditor/ckeditor.js"></script>   
    <!-- <script src="dist/js/oddImg.js"></script> -->
    <script src="dist/js/main.js"></script>
</head>