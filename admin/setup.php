<?php include "include/mate.php";?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
<body>       
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?> 
    <div class="wrap">
        <div class="titleRow">
            <span>後臺設定</span>
        </div>
        <h2 class="txtTitle"></h2>         
        <div class="listTable">
            <div class="listHead">後臺設定</div>  
            <div class="news_add">
                <div class="box boxs">
                    <b>LOGO</b>
                    <input type="file" class="change_img">
                </div>
                <div class="box">
                    <b></b>      
                    <button style="margin:10px 0 10px" class="deleteBtn">刪除圖片</button>             
                </div>
                <div class="box">
                    <b>公司名稱</b>
                    <input type="text" value="">               
                </div>   
                <div class="box">
                    <b>選單顏色</b>       
                    <div class="pickr"></div>   
                    <input type="hidden" class="pickr-field" value="#1c2b36" name="color"></input>
                </div>   
                <div class="box wrapBtn">
                    <b></b>
                    <a href="javascript:;" class="repage" onclick="history.go(-1)">回上一頁</a>
                    <a href="javascript:;" class="addNews">新增資料</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php";?>  
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.es5.min.js"></script>
   <script>
        var current_color = $(".pickr-field").val() || null;  
        var pickr = new Pickr({
            el: $(".pickr")[0],
            theme: "nano",
            swatches: null,
            defaultRepresentation: "HEXA",
            default: current_color,
            comparison: false,
            components: {
                preview: true,
                opacity: true,
                hue: true,
                interaction: {
                    hex: true,
                    rgba: true,
                    hsva: false,
                    input: true,
                    clear: true,
                    cancel: true,
                    save: true
                }
            }
        });
        pickr.on('change',function(instance){
            pickr.applyColor;
            pickr.setColor(instance.toHEXA().toString());          
            $("menu").css("background","#" + instance.toHEXA().join(""));
            $(".addNews").css("background","#" + instance.toHEXA().join(""));
            $(".listHead").css("background","#" + instance.toHEXA().join(""));
            $("header").css("border-color","#" + instance.toHEXA().join(""));            
        });
   </script>
</body>
</html>
