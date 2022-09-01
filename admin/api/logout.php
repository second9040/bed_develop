<?php
    $setting = parse_ini_string(file_get_contents(__DIR__."/../php/settings.ini.php"), true, INI_SCANNER_RAW)["SQL"];
    session_start();
    if(!empty($_SESSION["{$setting['prefix']}_login"])) {
        unset($_SESSION["{$setting['prefix']}_login"]);
        unset($_SESSION["{$setting['prefix']}_account"]);
        unset($_SESSION["{$setting['prefix']}_username"]);
        unset($_SESSION["{$setting['prefix']}_accountid"]);
        unset($_SESSION["{$setting['prefix']}_category"]);
    }
    $folder = parse_ini_string(file_get_contents(__DIR__."/../php/folder.php"), true, INI_SCANNER_RAW)["FOLDER"];
    header("location: {$folder['folder']}/login.php");
    exit;
?>