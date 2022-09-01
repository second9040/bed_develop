<?php
    include "include/mate.php";
?>
<body>
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?>
    <div class="wrap">
        <div class="titleRow">
            <span>好眠商品</span>
            <b>新增商品</b>
        </div>
        <h2 class="txtTitle"></h2>
        <div class="listTable">
            <div class="listHead">新增商品</div>
            <div class="news_add">
                <div class="box boxs">
                    <b>品名</b>
                    <input type="text" id="title">
                </div>
                <div class="box boxs">
                    <b>分類</b>
                    <select name="" id="type" class="pageSearch">
                        <option value="1">床墊</option>
                        <option value="2">床架/床頭櫃</option>
                        <option value="3">衣櫃</option>
                    </select>
                </div>
                <div class="box boxs">
                    <b>選擇圖片</b>
                    <input type="file" id="imgUpdate">
                    <button class="imgUpdate">選擇圖片</button>
                </div>
                <div class="box">
                    <b>預覽圖片</b>
                    <div class="oddImg"></div>
                </div>
                <div class="box">
                    <b>產品特色</b>
                    <div class="boxs_textarea">
                        <textarea class="textarea" id="feature" rows="10" cols="80"></textarea>
                    </div>
                </div>
                <div class="box">
                    <b>內容</b>
                    <div class="boxs_textarea">
                        <textarea name="content" id="content" rows="10" cols="80"></textarea>
                    </div>
                </div>
                <div class="box wrapBtn">
                    <b></b>
                    <a href="javascript:;" class="repage" onclick="history.go(-1)">回上一頁</a>
                    <a href="javascript:;" class="addNews addNewsBtn">新增</a>
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
        $(".addNewsBtn").click(function(){
            $.ajax({
                url:"api/productInsert.php",
                type:"POST",
                data:{
                    "title": $("#title").val(),
                    "type": $("#type").val(),
                    "feature": $("#feature").val(),
                    "imgUrl": $(".oddpic").attr("src"),
                    "content": CKEDITOR.instances.content.getData()
                },
                dataType:"json",
                success:function(data){
                    if(data.status) {
                        alert("新增成功,將回上一頁");
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
