<?php include "include/mate.php";?>
<body>       
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?> 
    <div class="wrap">
        <div class="titleRow">
            <span>使用者管理</span>
            <b>新增使用者</b>
        </div>             
        <div class="listTable">
            <div class="listHead">新增使用者</div>  
            <div class="listBodyWrap member_add">
                <div class="box">
                    <span>使用者帳號</span>
                    <input type="text" id="account">
                </div>
                <div class="box">
                    <span>使用者密碼</span>
                    <input type="text" id="password">
                </div>
                <div class="box">
                    <span>使用者名稱</span>
                    <input type="text" id="username">
                </div>
                <div class="wrapBtn">
                    <a href="javascript:;" class="repage" onclick="history.go(-1)">返回</a>
                    <a href="javascript:;" onclick="send()" class="memberBtn aBtn">新增</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php";?>   
</body>
</html>
<script>
    function send()
    {
        let account = $("#account").val();
        let password = $("#password").val();
        let username = $("#username").val();
        $.ajax({
            type:"POST",
            url:"api/memberInsert.php",
            data:{
                "account": account,
                "password": password,
                "username": username
            },
            dataType:"json",
            success:function(data){
                alert(data.msg);
                if(data.status == '1') {
                    window.location.href="member.php"
                }
            }
        });
    }
</script>
