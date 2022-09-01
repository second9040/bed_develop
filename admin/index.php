<?php
    include "include/mate.php";
    $Y = date("Y");
    $M = date("m");
    $T = date("t");
    $db->query("SELECT `date`, `number`, date_format(`date`, '%Y') as YY, date_format(`date`, '%m') as MM, date_format(`date`, '%d') as DD FROM `{$db->prefix}_count` GROUP BY `date`");
    $res = $db->get();
    $total  = 0;
    $number = 0;
    $label  = [];
    $day    = [];
    for($i = 0; $i < $T; $i++) {
        $label[] = ($i+1)."日";
        $day[] = 0;
    }
    $month  = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    if(!empty($res)) {
        foreach ($res as $k => $v) {
            if($v["YY"] != $Y) continue;
            $month[$v["MM"]-1] += $v["number"];
            $total += $v["number"];
            if($v["MM"] == $M) {
                $number += $v["number"];
                $day[$v["DD"]-1] = $v["number"];
            }
        }
    }
    $BeginDate=date('Y-m-01', strtotime(date("Y-m-d")));
?>
<!-- <link rel="stylesheet" href="dist/daterangepicker/daterangepicker.min.css">
<script src="dist/daterangepicker/moment.min.js"></script>
<script src="dist/daterangepicker/daterangepicker.min.js"></script> -->
<body>
    <?php include "include/header.php";?>
    <?php include "include/menu.php";?>
    <div class="wrap">
        <h2 class="txtTitle">瀏覽人數分析</h2>
        <div class="contentBox">
            <div class="chart">
                <div class="chartTitle"><?php echo $Y;?>年瀏覽人數：<?php echo $total;?>人</div>
                <div class="chartBox">
                    <canvas id="myChart" width="400" height="120"></canvas>
                </div>
            </div>
            <div class="chart">

                <div class="chartTitle"><?php echo $Y;?>年<?php echo $M;?>月瀏覽人數：<?php echo $number;?>人
                    <!-- <input class="dateprick" type="text"> -->
                </div>
                <div class="chartBox">
                    <canvas id="month" width="400" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>
    <style>
        .daterangepicker.ltr .calendar.left{
            display: none;
        }
    </style>
    <script src="./dist/js/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var month = document.getElementById('month').getContext('2d');
        var chartMonth = {};
        var YY = <?php echo json_encode($Y);?>;
        var MM = <?php echo json_encode($M);?>;
        var label = <?php echo json_encode($label);?>;
        var month_number = <?php echo json_encode($month);?>;
        var day_number = <?php echo json_encode($day);?>;
        // day_chart()

        // function send(date={}) {
        //     $.ajax({
        //         type:"POST",
        //         url:"api/indexSearch.php",
        //         data:{
        //             date: date
        //         },
        //         dataType:"json",
        //         success:function(data){
        //             if(data.status){
        //                 label = data.label
        //                 day_number = data.day
        //                 // day_chart()
        //             }
        //         }
        //     })
        // }

        var chart = new Chart(ctx, {
	        type: 'line',
	        data: {
		        labels: ["01月", "02月", "03月", "04月", "05月", "06月", "07月", "08月", "09月", "10月", "11月", "12月"],
                datasets: [{
                    label: this.YY+"年-瀏覽人數",
                    backgroundColor: 'lightblue',
                    borderColor: 'royalblue',
                    data: this.month_number
                }]
	        },
	        options: {
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: '瀏覽人數'
                },
		        scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                        }
                    }],
			        xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: this.YY+'年'
                        }
			        }]
		        }
	        }
        });
        // function day_chart() {
            chartMonth  = new Chart(month, {
                type: 'line',
                data: {
                    labels: this.label,
                    datasets: [{
                        label: this.YY+"年"+this.MM+"月-瀏覽人數",
                        backgroundColor: '#a2ecf1',
                        borderColor: '#2baab1',
                        data: this.day_number
                    }]
                },
                options: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        text: '瀏覽人數'
                    },
                    scales: {
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                            }
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: this.YY+'年'
                            }
                        }]
                    }
                }
            });
        // }
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
        //     opens: "left", // 日曆靠左
        //         alwaysShowCalendars: true,
        //         minDate : "<?php echo $BeginDate;?>",
        //         maxDate : "<?php echo date('Y-m-d', strtotime("$BeginDate 1 month -1 day"));?>",
        //     },
        //     function(start, end) {
        //         send([start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD')])
        //     }

        // );
    </script>
    <?php include "include/footer.php";?>
</body>
</html>