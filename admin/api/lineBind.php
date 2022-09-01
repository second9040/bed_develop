<?php
    use \Firebase\JWT\JWT;
	use Curl\Curl;
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
                    "redirect_uri"  => $setting['callback_url'].$folder['folder']."/api/lineBind.php",
                    "client_id"     => $setting['bind_id'],
                    "client_secret" => $setting['bind_secret']
        ];
        $p = new Send;
        $p->post('https://api.line.me/oauth2/v2.1/token', $post, true);
        $res = json_decode($p->response, 1);
        if(!empty($res['id_token'])) {
            require_once __DIR__."/../jwt/JWT.php";
	        $jwt = JWT::decode($res['id_token'] , $setting['bind_secret'], ["HS256"]);
            $arr = json_decode(json_encode($jwt), 1);
            //驗證JWT exp的時效驗證在JWT decode裡面
            if(!empty($arr) && !empty($arr['iss']) && $arr['iss'] == 'https://access.line.me' && !empty($arr['aud']) && $arr['aud'] == $setting['bind_id']) {
                require_once __DIR__."/../php/DB.class.php";
                $db = new DB;
                //查詢是否為綁定的帳號
                $db->query("UPDATE `{$db->prefix}_account_line` SET `accountid` = :accountid, `linename` = :linename WHERE `id` = 1");
                $db->bind(":accountid", $_REQUEST['state']);
                $db->bind(":linename", $arr['name']);
                $db->execute();
            } else {
                error_log(date("H:i:s")." ::: [ERROR 2] ".json_encode($arr).PHP_EOL, 3, __DIR__."/../log/".date('Ymd').".log");
            }
        } else {
            error_log(date("H:i:s")." ::: [ERROR 3] ".json_encode($res).PHP_EOL, 3, __DIR__."/../log/".date('Ymd').".log");
            echo json_encode($res);
        }
    }
    header("location: {$folder['folder']}/myLineJoin.php");
    exit;
?>

