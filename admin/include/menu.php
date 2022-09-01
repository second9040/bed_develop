<?php 
    include "include/self.php";
?>
<menu>
    <ul>
        <li class="color2 <?php echo ($page_index == 1)?'active':"";?>">
            <a href="company.php" class="menuBtn"><i class="fas fa-server"></i>公司基本資料</a>
        </li>
        <li class="muneliBtn color2 <?php echo ($page_index == 0 || $page_index == 2 || $page_index == 3 || $page_index == 4)?'active':"";?>">
            <a href="javascript:;" class="menuBtn"><i class="fas fa-tools"></i>網站設置<i class="fa fa-angle-down"></i></a>
            <ol>             
                <li><a href="index.php" <?php echo ($page_index == 0)?'class="active"':"";?>>流量統計</a></li>
                <li><a href="basicsetting.php" <?php echo ($page_index == 3)?'class="active"':"";?>>SEO設定</a></li>
            </ol>
        </li>      
        <li class="muneliBtn color2 <?php echo ($page_index == 6)?'active':"";?>">
            <a href="member.php" class="menuBtn"><i class="fas fa-users"></i>使用者管理</a>
        </li>  
        <li class="color2 <?php echo ($page_index == 9)?'active':"";?>">
            <a href="product.php" class="menuBtn"><i class="fas fa-server"></i>好眠商品</a>
        </li>   
        <li class="muneliBtn color2 <?php echo ($page_index == 12)?'active':"";?>">
            <a href="contact.php" class="menuBtn"><i class="fas fa-phone-volume"></i>聯絡我們</a>
        </li>
        <!-- <li class="muneliBtn color2 <?php echo ($page_index == 13 || $page_index == 14)?'active':"";?>">
            <a href="javascript:;" class="menuBtn"><i class="fab fa-line"></i>Line擴充套件<i class="fa fa-angle-down"></i></a>
            <ol>
                <li><a href="myLineJoin.php" <?php echo ($page_index == 13)?'class="active"':"";?>>Line登入綁定</a></li>           
                <li><a href="lineGearing.php" <?php echo ($page_index == 14)?'class="active"':"";?>>Line通知連動</a></li>       
            </ol>
        </li> -->
    </ul>
</menu>