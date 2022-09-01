<?php include "include/mate.php";?>
<body>       
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?> 
    <div class="wrap">    
        <div class="titleRow">
            <span>Line擴充套件</span>
            <b>Line通知連動</b>
        </div> 
        <div class="outsideSet">
            <div class="boxs">
                <div class="title">通知連動說明</div>
                <div class="outsideSetWrap">
                    <p class="outsideSet-p">與Line通知連動可以將前台網站通知發送至您設定的Line對話視窗</p>                   
                    <p class="outsideSet-p" style="margin:15px 0;">如果您連動的是群組請先將 <button class="greenBtn">LINE Notify官方帳號</button> 加入至要連動的群組。手動新增連動帳號請至 <button class="blueBtn">連動的服務</button> 介面新增</p> 
                </div>
            </div>
        </div>
        <!-- <div class="listTable">
            <div class="listHead">通知連動管理</div>  
            <div class="listBodyWrap">
                <div class="productTable">
                    <div class="header main flex">
                        <div class="check"><label for="checkbox"><input type="checkbox" id="checkbox" class="checkboxAll">全選</label></div>
                        <div class="list">類別</div>
                        <div class="name">名稱</div>
                        <div class="time">建立日期</div>
                        <div class="edit">操作</div>
                    </div>                       
                    <div class="main flex">
                        <div class="check"><label for="checkbox-1"><input type="checkbox" id="checkbox-1" class="checkC"></label></div>
                        <div class="list">群組</div>
                        <div class="name">W873-1小艾行銷第二站-崴仕牙材C雙-客戶網域</div>
                        <div class="time">2019-03-09</div>
                        <div class="editRow">
                            <a href="javascript:;" class="editBtn promptBtn"><i class="fas fa-edit"></i>發送訊息</a>
                            <a href="javascript:;" class="deleteBtn"><i class="fas fa-trash-alt"></i>取消連動</a>
                        </div>
                    </div>  
                </div>
            </div> -->
        </div>
    </div>   
    <?php include "include/footer.php";?>    
</body>
</html>
<script>
    $(".promptBtn").click(function(){
        prompt("請輸入要發送的訊息!");
    })
</script>