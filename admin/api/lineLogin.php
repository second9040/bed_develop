<?php
    use \Firebase\JWT\JWT;
    if(empty($_REQUEST['error']) && !empty($_REQUEST['code']) && !empty($_REQUEST['state'])) {
        require_once __DIR__."/../php/Send.class.php";
        //載入line設定
        $setting = parse_ini_string(file_get_contents(__DIR__."/../php/line_settings.php"), true, INI_SCANNER_RAW);
        $setting = $setting["LINE"];
        $folder = parse_ini_string(file_get_contents(__DIR__."/../php/folder.php"), true, INI_SCANNER_RAW);
        $folder = $folder["FOLDER"];
        //取得line token
        $post = [
                    "grant_type"    => "authorization_code",
                    "code"          => $_REQUEST['code'],
                    "redirect_uri"  => $setting['callback_url'].$folder['folder']."/api/lineLogin.php",
                    "client_id"     => $setting['login_id'],
                    "client_secret" => $setting['login_secret']
        ];
        $p = new Send;
        $p->post('https://api.line.me/oauth2/v2.1/token', $post, true);
        $res = json_decode($p->response, 1);
        if(!empty($res['id_token'])) {
            require_once __DIR__."/../jwt/JWT.php";
	        $jwt = JWT::decode($res['id_token'] , $setting['login_secret'], ["HS256"]);
            $arr = json_decode(json_encode($jwt), 1);
            //驗證JWT exp的時效驗證在JWT decode裡面
            if(!empty($arr) && !empty($arr['iss']) && $arr['iss'] == 'https://access.line.me' && !empty($arr['aud']) && $arr['aud'] == $setting['login_id']) {
                require_once __DIR__."/../php/DB.class.php";
                $db = new DB;
                //查詢是否為綁定的帳號
                $db->query("SELECT `linename` FROM `{$db->prefix}_account_line` WHERE `accountid` = :accountid AND `linename` = :linename");
                $db->bind(":accountid", $_REQUEST['state']);
                $db->bind(":linename", $arr['name']);
                $res = $db->first();
                if (!empty($res)) {
                    $db->query("SELECT * FROM `{$db->prefix}_account` WHERE `id` = :id AND `status` = '1'");
                    $db->bind(":id", $_REQUEST['state']);
                    $res2 = $db->first();
                    if (!empty($res2)) {
                        session_start();
                        $_SESSION["{$db->prefix}_login"]     = 1;
                        $_SESSION["{$db->prefix}_account"]   = $res2['account'];
                        $_SESSION["{$db->prefix}_username"]  = $res2['username'];
                        $_SESSION["{$db->prefix}_accountid"] = $res2['id'];
                        $_SESSION["{$db->prefix}_category"]  = $res2['category'];
                        error_log(date("H:i:s")." ::: [SUCCESS] {$res['linename']}".PHP_EOL, 3, __DIR__."/../log/".date('Ymd').".log");
                        header("location: {$folder['folder']}/index.php");
                        exit;
                    } else {
                        error_log(date("H:i:s")." ::: [ERROR 0] Line Is Not Bind".PHP_EOL, 3, __DIR__."/../log/".date('Ymd').".log");
                    }
                } else {
                    error_log(date("H:i:s")." ::: [ERROR 1] Account Error".PHP_EOL, 3, __DIR__."/../log/".date('Ymd').".log");
                    header("location: {$folder['folder']}/login.php?code=2");
                    exit;
                }
            } else {
                error_log(date("H:i:s")." ::: [ERROR 2] ".json_encode($arr).PHP_EOL, 3, __DIR__."/../log/".date('Ymd').".log");
            }
        } else {
            error_log(date("H:i:s")." ::: [ERROR 3] ".json_encode($res).PHP_EOL, 3, __DIR__."/../log/".date('Ymd').".log");
            echo json_encode($res);
        }
    }
    header("location: {$folder['folder']}/login.php?code=1");
    exit;
?>

