<?php
    include "include/mate.php";
    if(!empty($_GET['id'])) {
        require_once __DIR__."/php/DB.class.php";
        $db = new DB;
        $db->query("SELECT * FROM  `{$db->prefix}_product` WHERE `id` = :id");
        $db->bind(":id", $_GET['id']);
        $data = $db->first();
        if(empty($data)) {
            $folder = parse_ini_string(file_get_contents(__DIR__."/php/folder.php"), true, INI_SCANNER_RAW)["FOLDER"];
            header("location: {$folder['folder']}/product.php");
        }
        $img = !empty($data["imgUrl"]) ? "../img/".$data["imgUrl"] : "";
    } else {
        header("location: {$folder['folder']}/product.php");
    }
    setcookie("product_type", $_GET['type'], time() + 600);
    setcookie("product_status", $_GET['status'], time() + 600);
    setcookie("product_page", $_GET['page'], time() + 600);
    setcookie("product_number", $_GET['number'], time() + 600);
?>
<body>
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?>
    <div class="wrap">
        <div class="titleRow">
            <span>好眠商品</span>
            <b>修改商品</b>
        </div>
        <h2 class="txtTitle"></h2>
        <div class="listTable">
            <div class="listHead">修改商品</div>
            <div class="news_add">
                <div class="box boxs">
                    <b>品名</b>
                    <input type="text" id="title" value="<?php echo $data["title"];?>">
                </div>
                <div class="box boxs">
                    <b>分類</b>
                    <select name="" id="type" class="pageSearch">
                        <option value="1" <?php echo $data['type'] == '1' ? 'selected' : ''; ?>>床墊</option>
                        <option value="2" <?php echo $data['type'] == '2' ? 'selected' : ''; ?>>床架/床頭櫃</option>
                        <option value="3" <?php echo $data['type'] == '3' ? 'selected' : ''; ?>>衣櫃</option>
                    </select>
                </div>
                <div class="box boxs">
                    <b>選擇圖片</b>
                    <button class="imgUpdate">選擇圖片</button>
                    <input type="file" id="imgUpdate" style="max-width: 70px;">
                </div>
                <div class="box">
                    <b>預覽圖片</b>
                    <div class="imgStyle">
                        <div class="oddImg">
                            <div class="odd_delete">
                                <i class="fas fa-trash"></i>
                            </div>
                            <div class="result">
                                <img class="oddpic" src="<?php echo $img;?>" alt=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <b>產品特色</b>
                    <div class="boxs_textarea">
                        <textarea class="textarea" id="feature" rows="10" cols="80"><?php echo $data["feature"];?></textarea>
                    </div>
                </div>
                <div class="box">
                    <b>內容</b>
                    <div class="boxs_textarea">
                        <textarea name="content" id="content" rows="10" cols="80"><?php echo $data["content"];?></textarea>
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
        var editor = CKEDITOR.replace( 'content', {
            height:"50"+"vh",
            width:"100"+ "%"
        });

        $(".editBtn").click(function(){
            $.ajax({
                url:"api/productEdit.php",
                type:"POST",
                data:{
                    "id": <?php echo $data["id"];?>,
                    "title": $("#title").val(),
                    "type": $("#type").val(),
                    "feature": $("#feature").val(),
                    "imgUrl": $(".oddpic").attr("src"),
                    "content": CKEDITOR.instances.content.getData()
                },
                dataType:"json",
                success:function(data){
                    if(data.status) {
                        alert("修改成功,將回上一頁");
                        history.back();
                    } else {
                        alert(data.msg);
                    }
                },
            })

        });
    </script>
</body>
</html>
