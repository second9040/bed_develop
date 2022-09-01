<?php
    include "include/mate.php";
?>
<body>
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?>
    <div class="wrap">
        <div class="titleRow">
            <span>中文</span> <em>實際案例</em> 成品展示 /
            <b>新增</b>
        </div>
        <h2 class="txtTitle"></h2>
        <div class="listTable">
            <div class="listHead">新增成品 (可多選)</div>
            <div class="news_add">
                <div class="box boxs">
                    <b>新增圖片</b>
                    <button id="selectImg" style="margin-right:10px;">選擇圖片</button>
                    <button id="reselect">重置</button>
                    <input type="file" id='file_input' multiple/>
                </div>   
                <div class="box">
                    <b>顯示圖片</b>
                    <div class="updateImg flex"></div>
                </div> 
                <div class="box wrapBtn">
                    <b></b>
                    <a href="javascript:;" class="repage" onclick="history.go(-1)">回上一頁</a>
                    <a href="javascript:;" class="addBtn">新增</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php";?>
    <script src="dist/js/muchImg.js"></script>
    <script>         
        $(".addBtn").click(function(){
            let pic_arr = [];
            $('.subPic').each(function () {
                pic_arr.push($(this).attr('src'));
            });
             $.ajax({
                url:"api/productInsert.php",
                type:"POST",
                data:{
                    "img": pic_arr,
                },
                dataType:"json",
                success:function(data){
                    if(data.status) {
                        alert("新增成功,回上一頁");
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
