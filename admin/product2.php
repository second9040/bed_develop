<?php
    include "include/mate.php";
    if(isset($_COOKIE['product_page'])) {
        $page = $_COOKIE['product_page'];
        setcookie("product_page", '', time() - 3600);
    } else {
        //預設第1頁
        $page = 1;
    }

    if(isset($_COOKIE['product_number'])) {
        $number = $_COOKIE['product_number'];
        setcookie("product_number", '', time() - 3600);
    } else {
        //預設10筆
        $number = 10;
    }
?>
<body>
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?>
    <div class="wrap">
        <div class="titleRow">
            <span>中文</span> <em>實際案例</em> 成品展示
        </div>
        <div class="listTable">
            <div class="listHead">成品展示-中文</div>
            <div class="listBodyWrap">
                <div class="addWrap">
                    <a href="product_add.php" class="addBtn">新增內容</a>
                    <select name="" id="" class="pageSearch" style="margin-top:-15px">
                        <option value="10" <?php echo $number == '10' ? 'selected' : ''; ?>>每頁10資料</option>
                        <option value="25" <?php echo $number == '25' ? 'selected' : ''; ?>>每頁25資料</option>
                        <option value="50" <?php echo $number == '50' ? 'selected' : ''; ?>>每頁50資料</option>
                    </select>
                </div>
                <div class="productTable">
                    <div class="header main flex">
                        <div class="list">項次</div>
                        <div class="img">圖片</div>
                        <div class="order">排序 <b class="orderEdit">修改</b> <b class="orderSave">儲存</b></div>
                        <div class="status">狀態</div>
                        <div class="edit">編輯</div>
                    </div>
                    <div class="table_main"></div>
                    <!-- <div class="main flex">
                        <div class="list"></div>
                        <div class="img"><img src="" alt="" style="max-width:70px"></div>
                        <div class="name"></div>
                        <div class="order"><input type="text" class="orderInput" data-id="" value="0"><span>0</span></div>
                        <div class="status">
                            <span class="checkbox">
                                <input class="statusBtn" onchange="checkBox()" value='' type="checkbox" name="status"  data-id="1" checked>
                                <label data-on="開" data-off="關"></label>
                            </span>
                        </div>
                        <div class="editRow">
                            <a href="product_modify.php" class="edit"><i class="fas fa-edit"></i>編輯</a>
                            <a href="javascript:;" class="delete" onclick="" data-id="1"><input type="hidden" id="delete" value="2"><i class="fas fa-trash-alt"></i>刪除</a>
                        </div>
                    </div> -->
                </div>
                <div class="page">
                    <div class="pageBox">
                        <div class="total"></div>
                        <a href="javascript:void(0)" onClick="firstPage()" class="page_prev"><i class="fas fa-angle-double-left"></i></a>
                        <a href="javascript:void(0)" onClick="minusPage()" class="page_prev"><i class="fas fa-angle-left"></i></a>
                        <div class="page_html" style="display: inline-block;"></div>
                        <a href="javascript:void(0)" onClick="addPage()" class="page_next"><i class="fas fa-angle-right"></i></a>
                        <a href="javascript:void(0)" onClick="finalPage()" class="page_next"><i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <?php include "include/footer.php";?>
    <script src="include/page.js"></script>
    <script>
        let page = parseInt(<?php echo json_encode($page);?>);
        let number = parseInt(<?php echo json_encode($number);?>);
        let total_page = 1;
        let api = 'product';
        
        setFunction(search);
        search();
        $(".orderBtn").change(function(){
            if($(this).is(":checked")){
                $.ajax({
                    type:"POST",
                    url:"api/status.php",
                    data:{
                        "api": api,
                        "id":$(this).attr("data-id"),
                        "status":"1"
                    },
                    dataType:"json",
                })
            }else{
                $.ajax({
                    type:"POST",
                    url:"api/status.php",
                    data:{
                        "api": api,
                        "id":$(this).attr("data-id"),
                        "status":"0"
                    },
                    dataType:"json",
                })
            }
        });
        $(document).on('click', '.orderEdit', function() {
            $(".orderEdit").hide();
            $(".orderSave").show();
            $(".order").find("span").hide();
            $(".order").find("input").show();
        });
        $(".orderSave").click(function(){
            history.go(0);
        });
        $(document).on('blur', '.orderInput', function() {
            $.ajax({
                type:"POST",
                url:"api/sort.php",
                data:{
                    "api": api,
                    "id":$(this).attr("data-id"),
                    "sort":$(this).val()
                },
                dataType:"json",
            })
        });
        // 排序
        function checkBox(id){
            let status = parseInt($(".statusBtn"+id).val());
            status = !status|0;
            updateStatus(id, status);
        }
        function search()
        {
            $.ajax({
                type: "POST",
                url: "api/productSearch.php",
                data: {
                    "page": page,
                    "number": number
                },
                dataType: "json",
                success:function(data) {
                    let html = ''
                    if(data.status){
                        let i = 1 + (page-1) * number;
                        let checkstatus = "";
                        total_page = data.total_page;
                        for (const [key, val] of Object.entries(data.data)) {
                            checkstatus = (val.status === '1') ? "checked" : "";
                            html += `<div class="main flex">`;
                            html +=     `<div class="list">${i}<input type="hidden" id="id" value="${val.id}"></div>`;
                            if(val.imgUrl) {
                                html +=     `<div class="img"><a href="../dist/images/${val.imgUrl}" data-fancybox="b2"><img src="../dist/images/${val.imgUrl}" alt="" style="max-width:70px"></a></div>`;
                            } else {
                                html +=     `<div class="img"><img src="" alt="" style="max-width:70px"></div>`;
                            }
                            html +=     `<div class="order"><input type="text" class="orderInput" data-id="${val.id}" value="${val.sort}"><span>${val.sort}</span></div>`;
                            html +=     `<div class="status">`;
                            html +=         `<span class="checkbox">`;
                            html +=             `<input class="statusBtn${val.id}" onchange="checkBox(${val.id})" value="${val.status}" type="checkbox" name="status" ${checkstatus} data-id="${val.id}">`;
                            html +=             `<label data-on="開" data-off="關"></label>`;
                            html +=         `</span>`;
                            html +=     `</div>`;
                            html +=     `<div class="editRow">`;
                            html +=         `<a href="product_modify.php?id=${val.id}&page=${page}&number=${number}" class="edit"><i class="fas fa-edit"></i>編輯</a>`;
                            html +=         '<a href="javascript:;" class="delete" onclick="deleteStatus('+val.id+', 2)" data-id="'+val.id+'"><i class="fas fa-trash-alt"></i>刪除</a>'
                            html +=     `</div>`;
                            html += `</div>`;
                            i++;
                        }
                    }
                    $(".total").html("共 "+data.total_number+" 筆 / "+data.total_page+" 頁");
                    $(".table_main").html(html)
                    $(".page_html").html(showPages());
                }
            });
        }
        function updateStatus(id, s)
        {
            $.ajax({
                type:"POST",
                url:"api/status.php",
                data:{
                    "id": id,
                    "api": api,
                    "status": s
                },
                dataType:"json",
                success:function(data){
                    if(data.status == '0') {
                        alert(data.msg);
                    }
                    search();
                }
            });
        }
        function deleteStatus(id, s)
        {
            var confirms = confirm("你確定要刪除這筆資料嗎?");
            if(confirms){
                $.ajax({
                    type:"POST",
                    url:"api/status.php",
                    data:{
                        "id": id,
                        "api": api,
                        "status": s
                    },
                    dataType:"json",
                    success:function(data){
                        if(data.status == '0') {
                            alert(data.msg);
                        }
                        search();
                    }
                });
            }
        }
    </script>
</body>
</html>