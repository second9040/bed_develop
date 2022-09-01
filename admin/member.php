<?php 
    include "include/mate.php";
    $db->query("SELECT * FROM `{$db->prefix}_account` WHERE `status` != '2' ORDER BY `status`, `id` DESC");
    if (!empty($db->get())) {
        $account = $db->get();
    }  
?>
<body>        
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?> 
    <div class="wrap">
        <div class="titleRow">
            <span>使用者管理</span>
            <b>管理者列表</b>
        </div>                
        <div class="listTable">
            <div class="listHead">管理者名單</div>  
            <div class="listBodyWrap">
                <div class="addWrap">
                    <a href="member_add.php" class="addBtn">新增管理人員</a>
                </div>
                <div class="memberTable">
                    <div class="header main flex">
                        <div class="listM">項次</div>
                        <div class="userM">帳號</div>
                        <div class="nameM">管理者名稱</div>
                        <div class="statusM">狀態</div>
                        <div class="editM">編輯</div>
                    </div>    
                    <?php for($i=0;$i<count($account);$i++){?>                    
                        <div class="main flex">                           
                            <div class="listM"><?php echo $i+1;?></div>
                            <div class="userM"><?php echo $account[$i]["account"];?></div>
                            <div class="nameM"><?php echo $account[$i]["username"];?></div>
                            <div class="statusM">
                                <span class="checkbox">
                                    <?php $checkstatus = ($account[$i]['status']=='1') ? "checked" : "";?>
                                    <input type="checkbox" class="statusBtn<?php echo $account[$i]["id"];?>" onchange="checkBox(<?php echo $account[$i]['id'];?>)" value="<?php echo $account[$i]["status"];?>" <?php echo $checkstatus;?>>
                                    <label data-on="開" data-off="關"></label>
                                </span>
                            </div>
                            <div class="editM">
                                <a href="javascript:;" class="delete" onclick="updateStatus(<?php echo $account[$i]['id'];?>, 2, 1)"><i class="fas fa-trash-alt"></i>刪除</a>
                            </div>                       
                        </div>
                    <?php };?>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php";?>   
    <script>
        var len = $(".main").length;
        if(len>3){
            $(".addBtn").css({"background-color":"rgb(119 119 119)","cursor" :"no-drop"}).attr("href","javascript:;")
        };
        function checkBox(id){
            let status = parseInt($(".statusBtn"+id).val());
            status = !status|0;
            updateStatus(id, status, 0)
        }
        function updateStatus(id, s, del)
        {
            var confirms = 1
            if(del !== 0) {
                confirms = confirm("你確定要刪除這筆資料嗎?");
            }
            if(confirms) {
                $.ajax({
                    type:"POST",
                    url:"api/status.php",
                    data:{
                        "id": id,
                        "api": "account",
                        "status": s
                    },
                    dataType:"json",
                    success:function(data){
                        history.go(0);
                    }
                });
            }
        }
    </script> 
</body>
</html>
