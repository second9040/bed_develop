<?php
    include "include/mate.php";
?>
<body>
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?>
    <div class="wrap">
        <div class="titleRow">
            <span>中文</span> <em>實際案例</em> 合作夥伴 /
            <b> 新增</b>
        </div>
        <h2 class="txtTitle"></h2>
        <div class="listTable">
            <div class="listHead">新增合作夥伴</div>
            <div class="news_add">
                <div class="box boxs">
                    <b>名稱</b>
                    <input type="text" id="title">
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
                                <img class="oddpic" src="">
                            </div>
                        </div>
                    </div>
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
    <script src="dist/js/oddImg.js"></script>
    <script>
        $(".addBtn").click(function(){
            $.ajax({
                url:"api/teamInsert.php",
                type:"POST",
                data:{
                    'title':$("#title").val(),
                    'imgUrl':$(".oddpic").attr("src")
                },
                dataType:"json",
                success:function(data){
                    if(data.status){
                        alert("新增成功,將回上一頁");
                        history.back();
                    } else {
                        alert(data.msg);
                    }
                }
            });
            
        });

    </script>
</body>
</html>
