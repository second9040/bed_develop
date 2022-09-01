<?php
    include "include/mate.php";
    if(!empty($_GET['id'])) {
        require_once __DIR__."/php/DB.class.php";
        $db = new DB;
        $db->query("SELECT * FROM  `{$db->prefix}_team` WHERE `id` = :id");
        $db->bind(":id", $_GET['id']);
        $data = $db->first();
        if(empty($data)) {
            $folder = parse_ini_string(file_get_contents(__DIR__."/php/folder.php"), true, INI_SCANNER_RAW)["FOLDER"];
            header("location: {$folder['folder']}/team.php");
        }
        $img = !empty($data["imgUrl"]) ? "../dist/images/".$data["imgUrl"] : "";
    }
    setcookie("team_page", $_GET['page'], time() + 600);
    setcookie("team_number", $_GET['number'], time() + 600);
?>
<body>
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?>
    <div class="wrap">
        <div class="titleRow">
            <span>中文</span> <em>實際案例</em> 合作夥伴 /
            <b> 修改</b>
        </div>
        <h2 class="txtTitle"></h2>
        <div class="listTable">
            <div class="listHead">修改合作夥伴</div>
            <div class="news_add">
                <input type="hidden" id="id" value="<?php echo $data["id"];?>">
                <div class="box boxs">
                    <b>名稱</b>
                    <input type="text" id="title" value="<?php echo $data["title"];?>">
                </div>
                <div class="box boxs">
                    <b>圖片</b>
                    <input type="file" id="imgUpdate">
                    <button class="imgUpdate">選擇圖片</button>
                </div>
                <div class="box">
                    <b>顯示圖片</b>
                    <div class="oddImg">
                        <div>
                            <div class="odd_delete"><i class="fas fa-trash"></i></div>
                            <div class="result">
                                <img class="oddpic" src="<?php echo $img;?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box wrapBtn">
                    <b></b>
                    <a href="javascript:;" class="repage" onclick="history.go(-1)">回上一頁</a>
                    <a href="javascript:;" class="addBtn">修改</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php";?>
    <script src="dist/js/oddImg.js"></script>
    <script>        
        $(".addBtn").click(function(){
            $.ajax({
                url:"api/teamEdit.php",
                type:"POST",
                data:{
                    "id":$("#id").val(),
                    "title":$("#title").val(),
                    "imgUrl": $(".oddpic").attr("src"),
                },
                dataType:"json",
                success:function(data){
                    if(data.status) {
                        alert("修改成功,回上一頁");
                        history.back();
                    } else {
                        alert(data.msg)
                    }
                },
            })

        });
    </script>
</body>
</html>
