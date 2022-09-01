<?php include "include/mate.php";?>
<?php
    $setting = parse_ini_string(file_get_contents(__DIR__."/php/line_settings.php"), true, INI_SCANNER_RAW);
    $setting = $setting["LINE"];
    $folder = parse_ini_string(file_get_contents(__DIR__."/php/folder.php"), true, INI_SCANNER_RAW);
    $folder = $folder["FOLDER"];
    require_once __DIR__."/php/DB.class.php";
    $api = '';
    $db = new DB;
    //查詢是否為綁定的帳號
    $db->query("SELECT * FROM `{$db->prefix}_account_line` WHERE `id` = 1");
    $res = $db->first();
    if (empty($res['accountid']) && !empty($_SESSION["{$db->prefix}_accountid"]) && !empty($setting['bind_id']) && !empty($setting['callback_url'])) {
        $api = "https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id={$setting['bind_id']}&redirect_uri={$setting['callback_url']}{$folder['folder']}/api/lineBind.php&state={$_SESSION["{$db->prefix}_accountid"]}&scope=profile%20openid";
    }
?>
<body>       
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?> 
    <div class="wrap">    
        <div class="titleRow">
            <span>Line擴充套件</span>
            <b>Line登入綁定</b>
        </div> 
        <div class="outsideSet">
            <div class="boxs">
                <div class="title">Line第三方登入</div>
                <div class="outsideSetWrap">
                    <p class="outsideSet-p">LINE 的第三方登入服務，即可登入網站後台，以提供使用上的便利性。登入後若要取消綁定，請點選「移除」即可。</p>                   
                    <div class="addWrap" style="margin-top:30px;">
                        <?php if(!empty($api)) {?>
                            <a href="<?php echo $api; ?>" class="addBtn">綁定</a>
                        <?php } else {?>
                            <a class="addBtn">綁定成功</a>
                            <a href="javascript: void(0);" class="reBtn">移除</a></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <?php include "include/footer.php";?>    
</body>
</html>
<script>
    $(".reBtn").click(function(){            
        $.ajax({
            type: "POST",
            url:"api/lineLogout.php",
            data: {},
            dataType: "json",
            success: function(data) {
                if (data.status) {
                    window.location.href = "myLineJoin.php";
                    alert(data.msg);
                }else{
                    alert('失敗');
                }
            },
        });
    });
</script>
