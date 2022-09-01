<?php 
    include "include/mate.php";
    $date   = $_GET['date'];
    $status = $_GET['status'];
    $page   = $_GET['page'];
    $number = $_GET['number'];
    setcookie("contact_date", $date, time() + 600);
    setcookie("contact_status", $status, time() + 600);
    setcookie("contact_page", $page, time() + 600);
    setcookie("contact_number", $number, time() + 600);
    if(!empty($_GET['id'])) {
        require_once __DIR__."/php/DB.class.php";
        $db = new DB;
        $db->query("SELECT * FROM  `{$db->prefix}_contact` WHERE `id` = :id");
        $db->bind(":id", $_GET['id']);
        $data = '';
        if($db->first()) {
            $data = $db->first();
        } else {
            $folder = parse_ini_string(file_get_contents(__DIR__."/php/folder.php"), true, INI_SCANNER_RAW);
            $folder = $folder["FOLDER"];
            header("location: {$folder['folder']}/contact.php");
        }
    }
?>
<body>       
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?> 
    <div class="wrap">
        <div class="titleRow">
            <span>聯絡我們</span>
            <b>訊息查看</b>
        </div>            
        <div class="listTable">
            <div class="listHead">聯絡我們-訊息查看</div>  
            <div class="listBodyWrap contact_view">  
                <div class="box flex">
                    <span>姓名:</span>
                    <article><?php echo $data["name"];?></article>
                </div>
                <div class="box flex">
                    <span>電話:</span>
                    <article><?php echo $data["tel"];?></article>
                </div>
                <div class="box flex">
                    <span>Line:</span>
                    <article><?php echo $data["line"];?></article>
                </div>
                <div class="box flex">
                    <span>信箱:</span>
                    <article><?php echo $data["mail"];?></article>
                </div>
                <div class="box flex">
                    <span>內容:</span>
                    <article style="white-space: pre-line;"><?php echo $data["content"];?></article>
                </div>
                <div class="box flex">
                    <span>時間:</span>
                    <article><?php echo $data["datetime"];?></article>
                </div>
                <div class="wrapBtn">
                    <a href="javascript:;" class="btn" onclick="history.go(-1)">回上一頁</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php";?>    
</body>
</html>
