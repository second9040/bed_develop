<?php include "include/mate.php";?>
<body>       
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?> 
    <div class="wrap">
        <div class="titleRow">
            <span>使用者管理</span>
            <b>編輯使用者資訊</b>
        </div>           
        <div class="listTable">
            <div class="listHead">編輯使用者資訊</div>  
            <div class="listBodyWrap member_add">
                <input type="hidden" id="id">
                <div class="box">
                    <span>使用者帳號</span>
                    <input type="text" value="Authma">
                </div>
                <div class="box">
                    <span>使用者密碼</span>
                    <input type="text" value="63906720">
                </div>
                <div class="box">
                    <span>使用者名稱</span>
                    <input type="text" value="艾勝渼">
                </div>
                <div class="wrapBtn">
                    <a href="javascript:;" class="repage" onclick="history.go(-1)">回上一頁</a>
                    <a href="javascript:;" class="logiBtn aBtn">確認新增</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php";?>    
</body>
</html>
