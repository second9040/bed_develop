<?php
    $setting = parse_ini_string(file_get_contents(__DIR__."/php/line_settings.php"), true, INI_SCANNER_RAW)["LINE"];
    $folder = parse_ini_string(file_get_contents(__DIR__."/php/folder.php"), true, INI_SCANNER_RAW)["FOLDER"];
    require_once __DIR__."/php/DB.class.php";
    //判斷Line登入有無錯誤
    $lineError = 0;
    if(!empty($_GET['code'])) {
        $lineError = $_GET['code'];
    }
    $api = '';
    $db = new DB;
    //查詢是否為綁定的帳號
    // $db->query("SELECT * FROM `{$db->prefix}_account_line` WHERE `id` = 1");
    // $res = $db->first();
    // if (!empty($res) && $res['accountid'] != 0 && !empty($setting['login_id']) && !empty($setting['callback_url'])) {
    //     $api = "https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id={$setting['login_id']}&redirect_uri={$setting['callback_url']}{$folder['folder']}/api/lineLogin.php&state={$res['accountid']}&scope=profile%20openid";
    // }
    $title = "公司";
    $db->query("SELECT `title` FROM `{$db->prefix}_web_setting`");
    if (!empty($db->first())) {
        $title = $db->first()['title'];
    }
    // $logo = [];
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
    <title><?php echo $title;?>管理後台</title>
    <link rel="icon" href="dist/img/a_logo.svg">
    <link rel="stylesheet" href="dist/css/style.min.css">
    <script src="dist/js/jquery.min.js"></script>
</head>
<body id="login">
    <section class="login">
        <div class="loginTitle" style="line-height:0;padding-bottom:12px;"><img src="dist/img/a_logo.svg" alt="" style="top: 14px;"><?php echo $title;?> <span>管理後台</span></div>
        <div class="inputBox"><input type="text" class="loginInput" placeholder="帳號" id="username"></div>
        <div class="inputBox"><input type="password" class="loginInput" placeholder="密碼" id="password"></div>
        <div class="inputBox">
            <input type="text" class="loginCode" placeholder="驗證碼" id="code">
            <a href="javascript:;" >
                <canvas class="show-captcha code_img" id="canvas" width="100" height="30"></canvas>
            </a>
        </div>
        <div class="inputBox">
            <button class="loginBtn"><a href="javascipt: void(0);">登入</a></button>
            <!-- <button class="lineBtn"><a href="<?php echo $api; ?>" class="lineBtnApi" style="color:#fff;"><img src="dist/img/line_icon_3.png" alt="">使用LINE登錄</a></button> -->
        </div>
        <!-- <input type="hidden" id="lineError" value="<?php echo $lineError; ?>"> -->
    </section>
    <script src="dist/js/code.js"></script>
    <script>
        //Line登入驗證錯誤
        // if($("#lineError").val() == 1) {
        //     alert("Line登入錯誤");
        //     window.location.href = "login.php";
        // } else if ($("#lineError").val() == 2) {
        //     alert("請使用已綁定的Line帳號");
        //     window.location.href = "login.php";
        // }

        $(".loginBtn").click(function(){            
            if($("#username").val()==""){
                alert("請輸入帳號");
            }else if($("#password").val()==""){
                alert("請輸入密碼");
            }else if($("#code").val() != code){
                alert("驗證碼錯誤");
            }else{
                $.ajax({
                    type: "POST",
                    url:"api/login.php",
                    data: {
                        "acc": $("#username").val(),
                        "password": $("#password").val(),
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            window.location.href = "index.php";
                        }else{
                            alert(data.msg);
                        }
                    },
                });
            }
        });

        // $(".lineBtn").click(function(){
        //     let lineBtnApi = $(".lineBtnApi").attr("href");
        //     if(lineBtnApi==""){
        //         alert("請先登入後，再綁定Line帳號")
        //     }
        // });

        $(document).keydown(function (event) {
            if (event.which == 13) {
                if($("#username").val()==""){
                    alert("請輸入帳號");
                }else if($("#password").val()==""){
                    alert("請輸入密碼");
                }else if($("#code").val() != code){
                    alert("驗證碼錯誤");
                }else{
                    $.ajax({
                        type: "POST",
                        url:"api/login.php",
                        data: {
                            "acc": $("#username").val(),
                            "password": $("#password").val(),
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.status) {
                                window.location.href = "index.php";
                            }else{
                                alert(data.msg);
                            }
                        },
                    });
                }
            }
        });
    </script>
</body>
</html>