<?php
    include "include/mate.php";
    $db->query("SELECT * FROM `{$db->prefix}_company`");
    if (!empty($db->first())) {
        $data = $db->first();
    }
?>
<body>
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?>
    <div class="wrap">
        <div class="titleRow">
            <span>網站基本資料</span>公司資訊
        </div>
        <div class="table">
            <div class="table-header">基本資料</div>
            <div class="table-body">
                <div class="flex">
                    <div class="col-5">
                        <p>公司名稱</p>
                        <input type="text" id="company" class="inputBox" value="<?php echo $data['company'];?>">
                    </div>
                    <div class="col-5">
                        <p>信箱</p>
                        <input type="text" id="email" class="inputBox" value="<?php echo $data['email'];?>">
                    </div>
                    <div class="col-5">
                        <p>聯絡電話</p>
                        <input type="text" id="tel" class="inputBox" value="<?php echo $data['tel'];?>">
                    </div>
                    <div class="col-5">
                        <p>手機</p>
                        <input type="text" id="phone" class="inputBox" value="<?php echo $data['phone'];?>">
                    </div>
                    <div class="col-1">
                        <p>公司地址</p>
                        <input type="text" id="address" class="inputBox" value="<?php echo $data['address'];?>">
                    </div>
                    <div class="col-1">
                        <p>Google 位置</p>
                        <input type="text" id="map" class="inputBox" value='<?php echo $data["map"];?>'>
                    </div>
                    <!-- <div class="col-5">
                        <p>傳真</p>
                        <input type="text" id="fax" class="inputBox" value="<?php echo $data['fax'];?>">
                    </div> -->
                </div>
                <div class="wrapBtn">
                    <a href="javascript:;" class="companyBtn1 aBtn">修改</a>
                </div>
            </div>
        </div>
        <div class="table">
            <div class="table-header">社群連接設定</div>
            <div class="table-body">
                <div class="flex">
                    <div class="col-5">
                        <p>Facebook</p>
                        <input type="text" id="facebook" class="inputBox" value="<?php echo $data['facebook'];?>">
                    </div>
                    <div class="col-5">
                        <p>Line</p>
                        <input type="text" id="line" class="inputBox" value="<?php echo $data['line'];?>">
                    </div>
                    <div class="col-5">
                        <p>Instagram</p>
                        <input type="text" id="ig" class="inputBox" value="<?php echo $data['ig'];?>">
                    </div>
                </div>
                <div class="wrapBtn">
                    <a href="javascript:;" class="companyBtn2 aBtn">修改</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php";?>
    <script>
        $(".companyBtn1").click(()=>{
            $.ajax({
                url:"api/api.php",
                type:"POST",
                data:{
                    "api": "company",
                    "company": $("#company").val(),
                    "address": $("#address").val(),
                    "tel": $("#tel").val(),
                    "phone": $("#phone").val(),
                    "email": $("#email").val(),
                    // "fax": $("#fax").val(),
                    "map":$("#map").val(),
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
                
        $(".companyBtn2").click(()=>{
            $.ajax({
                url:"api/api.php",
                type:"POST",
                data:{
                    "api": "company",
                    "facebook": $("#facebook").val(),
                    "line": $("#line").val(),
                    "ig": $("#ig").val(),
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