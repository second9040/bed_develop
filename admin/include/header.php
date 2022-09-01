<header>
    <div class="flex">
        <div class="headerLeft">
            <div class="title">
                <img src="" alt="" class="a_logo"> <span style="color:#222;">御品製床所 - 管理後台</span>
            </div>
            </div>
        <div class="headerRight">
            <ul class="flex">
                <li><a href="javascript:;"><i class="fas fa-user-alt"></i><?php echo $name; ?></a></li>
                <li><a href="../" target="__blank" title="回前台首頁"><i class="fas fa-home"></i></a></li>
                <li><a href="javascript:;" title="更改密碼" class="editPassword"><i class="fa fa-key"></i></a></li>
                <li><a href="<?php echo $folder['folder'];?>/api/logout.php" title="登出系統"><i class="fa fa-power-off fa-lg"></i></a></li>
            </ul>
        </div>
    </div>
</header>
<div class="editPasswordBox">
    <div class="content">
        <h2><i class="fas fa-user-edit"></i> 修改密碼</h2>
        <div class="box"><input type="password" class="old_pass" placeholder="舊密碼"></div>
        <div class="box"><input type="password" class="new_pass1" placeholder="新密碼"></div>
        <div class="box"><input type="password" class="new_pass2" placeholder="確認密碼"></div>
        <div class="box"> 
            <button class="editPasswordBtn">確認修改</button>
        </div>
        <div class="editPasswordclose"></div>
    </div>
    <div class="editPasswordBoxclose"></div>
</div>
<script>
    $(".editPasswordBtn").click(function(){
        $.ajax({
            url: 'api/changePassword.php',
            type: 'POST',
            dataType: "json",
            data: {
                "old_pass": $(".old_pass").val(),
                "new_pass1": $(".new_pass1").val(),
                "new_pass2": $(".new_pass2").val()
            },
            success: (data) => {
                if(data.status === 1) {
                    alert(data.msg);
                    $(".editPasswordBox").fadeOut();
                } else {
                    alert(data.msg);
                }
            }
        });
    });
</script>