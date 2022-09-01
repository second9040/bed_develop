<?php
    include "include/mate.php";
    $db->query("SELECT * FROM `{$db->prefix}_web_setting`");
    if (!empty($db->first())) {
        $data = $db->first();
    }
?>
<body>
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?>
    <div class="wrap">
        <div class="titleRow">
            <span>廣告圖設置</span>
            <b>網站設定</b>
        </div>
        <div class="table">
            <div class="table-header">網站設定</div>
            <div class="table-body">
                <div class="flex">
                    <div class="col-5">
                        <p>網站標題</p>
                        <input type="text" id="title" class="inputBox" value="<?php echo $data['title'];?>">
                    </div>
                    <div class="col-5">
                        <p>網站擁有者</p>
                        <input type="text" id="owner" class="inputBox" value="<?php echo $data['owner'];?>">
                    </div>
                    <div class="col-5">
                        <p>網站版權所有</p>
                        <input type="text" id="copyright" class="inputBox" value="<?php echo $data['copyright'];?>">
                    </div>
                    <div class="col-5">
                        <p>網站連結</p>
                        <input type="text" id="url" class="inputBox" value="<?php echo $data['url'];?>">
                    </div>
                    <div class="col-5">
                        <p>網頁描述</p>
                        <input type="text" id="description" class="inputBox" value="<?php echo $data['description'];?>">
                    </div>
                    <div class="col-1">
                        <p>網頁關鍵字</p>
                        <textarea id="keywords" class="textarea"><?php echo $data['keywords'];?></textarea>
                    </div>
                </div>
                <div class="wrapBtn">
                    <a href="javascript:;" class="basicsettingBtn aBtn">修改資料</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php";?>
    <script>
        $(".basicsettingBtn").click(()=>{
            $.ajax({
                url:"api/api.php",
                type:"POST",
                data:{
                    "api": "web_setting",
                    "title": $("#title").val(),
                    "owner": $("#owner").val(),
                    "copyright": $("#copyright").val(),
                    "url": $("#url").val(),
                    "description": $("#description").val(),
                    "keywords": $("#keywords").val(),
                    
                },
                dataType:"json",
                success:function(data){
                    if(data.status){
                        alert("修改成功，將重新整理頁面");
                        window.location.reload();
                    }
                }
            });
        });      
    </script>
</body>
</html>
