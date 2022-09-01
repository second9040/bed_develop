<?php
    include "include/mate.php";
    $db->query("SELECT * FROM `{$db->prefix}_contact`");
    if (!empty($db->get())) {
        $data = $db->get();
    }

    if(isset($_COOKIE['contact_status'])) {
        $status = $_COOKIE['contact_status'];
        setcookie("status", '', time() - 3600);
    } else {
        //預設10筆
        $status = 2;
    }

    if(isset($_COOKIE['contact_date'])) {
        $d     = explode(",", $_COOKIE['contact_date']);
        $start = (String)$d[0];
        $end   = (String)$d[1];
        setcookie("date", '', time() - 3600);
    } else {
        //預設本月
        $start = date("Y-m-01");
        $end   = date("Y-m-d");
    }
    $date  = [$start, $end];

    if(isset($_COOKIE['contact_page'])) {
        $page = $_COOKIE['contact_page'];
        setcookie("page", '', time() - 3600);
    } else {
        //預設第1頁
        $page = 1;
    }

    if(isset($_COOKIE['contact_number'])) {
        $number = $_COOKIE['contact_number'];
        setcookie("number", '', time() - 3600);
    } else {
        //預設10筆
        $number = 10;
    }
?>
<!-- <link rel="stylesheet" href="dist/daterangepicker/daterangepicker.min.css">
<script src="dist/daterangepicker/moment.min.js"></script>
<script src="dist/daterangepicker/daterangepicker.min.js"></script> -->
<body>
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?>
    <div class="wrap">
        <div class="titleRow">
            <span>聯絡我們</span>
            <b>查看訊息</b>
        </div>
        <div class="searchWrap">
            <div class="searchTitle">搜尋</div>
            <div class="searchBox">
                <div class="box">
                    <span>時間範圍:</span>
                    <!-- <input class="dateprick" type="text"> -->
                    <input class="contactDate" type="date" id="date1" value="<?php echo $start; ?>"> 至 
                    <input class="contactDate" type="date" id="date2" value="<?php echo $end; ?>">
                </div>
                <div class="box">
                    <span>狀<b></b>態 : </span>
                    <select id="status" class="searchorder" style="max-width:184px;">
                        <option value="2">全部</option>
                        <option value="1">已讀</option>
                        <option value="0">未讀</option>
                    </select>
                </div>
                <div class="box">
                    <button class="btn">搜尋</button>
                </div>
            </div>
        </div>
        <div class="listTable">
            <div class="listHead">聯絡我們列表</div>
            <div class="listBodyWrap">
                <div class="addWrap">
                    <select name="" id="" class="pageSearch" style="margin-top:-15px">
                        <option value="10">每頁10資料</option>
                        <option value="25">每頁25資料</option>
                        <option value="50">每頁50資料</option>
                    </select>
                </div>
                <div class="contactTable">
                    <div class="header main flex">
                        <div class="list">項次</div>
                        <div class="name">留言者姓名</div>
                        <div class="tel">留言者電話</div>
                        <div class="time">留言時間</div>
                        <div class="list">狀態</div>
                        <div class="view">查看內容</div>
                    </div>
                    <div class="table_main"></div>
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
        let date = <?php echo json_encode($date);?>;
        let page = parseInt(<?php echo json_encode($page);?>);
        let number = parseInt(<?php echo json_encode($number);?>);
        let total_page = 1;
        let old_status = $('#status').val();
        setFunction(contactSearch);
        contactSearch();
        
        $(".btn").click(function() {
            if(old_status != $("#status").val()) page = 1
            contactSearch();
        });

        $(document).on('change', '#date1', () => {
            date[0] = $('#date1').val();
        });

        $(document).on('change', '#date2', () => {
            date[1] = $('#date2').val();
        });

        // $(".dateprick").daterangepicker({
        //     locale: {
        //         applyLabel: "確定",
        //         cancelLabel: "取消",
        //         fromLabel: "開始日期",
        //         toLabel: "結束日期",
        //         customRangeLabel: "自訂日期區間",
        //         daysOfWeek: ["日", "一", "二", "三", "四", "五", "六"],
        //         monthNames: ["1月", "2月", "3月", "4月", "5月", "6月","7月", "8月", "9月", "10月", "11月", "12月"],
        //         firstDay: 1,
        //         separator: "   -   ",
        //         // cancelLabel: "清除",
        //         format: "YYYY-MM-DD",

        //     },
        //     ranges: {
        //         "今天": [moment(), moment()],
        //         "昨天": [moment().subtract(1, "days"), moment().subtract(1, "days")],
        //         "過去 7 天": [moment().subtract(6, "days"), moment()],
        //         "過去 30 天": [moment().subtract(29, "days"), moment()],
        //         "本月": [moment().startOf("month"), moment().endOf("month")],
        //         "上個月": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
        //     },
        //     opens: "right", // 日曆靠左
        //     alwaysShowCalendars: true,
        //     startDate: <?php echo json_encode($start);?>,
        //     endDate: <?php echo json_encode($end);?>,
        //     },
        //     function(start, end) {
        //         page = 1
        //         date = [start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD')]
        //     }
        // );

        function contactSearch() {
            let status = $('#status').val();
            console.log(date);
            total_page = 1;
            $.ajax({
            url: 'api/contactSearch.php',
            type: 'POST',
            dataType: "json",
            data: {
                "status": status,
                "date": date,
                "page": page,
                "number": number,
            },
            success: (data) => {
                let html = "";
                total_page = data.total_page;
                //有資料有表格
                if(data.status === 1) {
                    let i = 1
                    let status = ""
                    for (const [key, val] of Object.entries(data.data)) {
                        status = (val.status=='1') ? "已讀" : "未讀";
                        html += '<div class="main flex">'
                        html +=     '<div class="list">'+i+'</div>'
                        html +=     '<div class="name">'+val.name+'</div>'
                        html +=     '<div class="tel">'+val.tel+'</div>'
                        html +=     '<div class="time">'+val.datetime+'</div>'
                        html +=     '<div class="list">'+status+'</div>'
                        html +=     '<div class="editRow" style="flex:0 0 12%;">'
                        html +=         '<a href="contact_view.php?id='+val.id+'&date='+date+'&status='+status+'&page='+page+'&number='+number+'" class="edit" onclick="updateStatus('+val.id+')"><i class="fas fa-envelope-open-text" style="margin-right:5px;"></i>查看內容</a>'
                        // html +=         '<a href="javascript:;" class="delete"><i class="fas fa-trash-alt"  style="margin-right:5px;"></i>刪除訊息</a>'
                        html +=     '</div>'
                        html += '</div>'
                        i++
                    }
                }
                $(".total").html("共 "+data.total_number+" 筆 / "+data.total_page+" 頁");
                $(".table_main").html(html)
                $(".page_html").html(showPages());
            }
            });
        }

        function updateStatus(id)
        {
            $.ajax({
                type:"POST",
                url:"api/status.php",
                data:{
                    "id": id,
                    "api": "contact",
                    "status": "1"
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
    </script>
</body>
</html>
