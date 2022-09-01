<?php
    include "include/mate.php";
    $folder = parse_ini_string(file_get_contents(__DIR__."/php/folder.php"), true, INI_SCANNER_RAW)["FOLDER"]['folder'];
    if(!empty($_GET['id'])) {
        require_once __DIR__."/php/DB.class.php";
        $db = new DB;
        $db->query("SELECT * FROM  `{$db->prefix}_product` WHERE `id` = :id");
        $db->bind(":id", $_GET['id']);
        $data = $db->first();
        if(empty($data)) {
            header("location: {$folder}/product.php");
        }
        $img = !empty($data["imgUrl"]) ? "../dist/images/".$data["imgUrl"] : "";
    } else {
        header("location: {$folder}/product.php");
    }
    setcookie("product_page", $_GET['page'], time() + 600);
    setcookie("product_number", $_GET['number'], time() + 600);
?>
<body>
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?>
    <div class="wrap">
        <div class="titleRow">
            <span>中文</span> <em>實際案例</em> 成品展示 /
            <b>修改</b>
        </div>
        <h2 class="txtTitle"></h2>
        <div class="listTable">
            <div class="listHead">修改成品展示</div>
            <div class="news_add">
                <input type="hidden" id="id" value="<?php echo $data["id"];?>">
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
                    <a href="javascript:;" class="editBtn">修改</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php";?>
    <script src="dist/js/oddImg.js"></script>
    <script>
        $(".editBtn").click(function(){
            $.ajax({
                url:"api/productEdit.php",
                type:"POST",
                data:{
                    "id":$("#id").val(),
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
