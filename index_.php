<?php
    require_once __DIR__."/php/DB.class.php";
    $imgPath = "./uploads";
    $db = new DB();
    $name = empty($_SESSION["{$db->prefix}_username"]) ? $_SESSION["{$db->prefix}_account"] : $_SESSION["{$db->prefix}_username"];
    $title = "";
    $db->query("SELECT * FROM `{$db->prefix}_web_setting`");
    $res = $db->first();
    if (!empty($res)) {
        $title = $res['title'];
    }
    $bubbleImg = [
        "1" => "",
        "2" => "",
        "3" => "",
        "4" => ""
    ];
    $db->query("SELECT `id`, `imgUrl` FROM `{$db->prefix}_bubble`");
    $res = $db->get();
    if (!empty($res)) {
        foreach ($res as $k => $v) {
            if(empty($v['imgUrl'])) continue;
            $bubbleImg[$v['id']] = "{$imgPath}/{$v['imgUrl']}";
        }
    }
    // $db->query("SELECT * FROM `{$db->prefix}_logo`");
    // if (!empty($db->first())) {
    //     $logo = $db->first();
    // }  
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - 首頁</title>
    <script src="js/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/layout.css?011003">
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.css">  
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">    
    <script src="https://unpkg.com/swiper@8/swiper-bundle.js"> </script>  
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"> </script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js.map"> </script>
</head>
<body>
    <header></header>
    <main>
        <div class="banner" id="idx_banner">
            <div class="logo"><img src="images/banner_logo.png" alt="製床所御品"></div>
            <div class="banner_bubbles">
                <!-- <div class="bubble_item_style bb_item_1"><img src="images/banner/bb_bed1.png"></img></div>
                <div class="bubble_item_style bb_item_2"><img src="images/banner/bb_bed2.png"></img></div>
                <div class="bubble_item_style bb_item_3"><img src="images/banner/bb_bed3.png"></img></div>
                <div class="bubble_item_style bb_item_4"><img src="images/banner/bb_bed4.png"></img></div> -->
                <div class="bubble_item_style bb_item_1"><img src="<?php echo $bubbleImg["1"]; ?>"></img></div>
                <div class="bubble_item_style bb_item_2"><img src="<?php echo $bubbleImg["4"]; ?>"></img></div>
                <div class="bubble_item_style bb_item_3"><img src="<?php echo $bubbleImg["2"]; ?>"></img></div>
                <div class="bubble_item_style bb_item_4"><img src="<?php echo $bubbleImg["3"]; ?>"></img></div>
            </div>
            <div class="banner_cloud"><img src="images/banner/index_cloud.png"></div>
            <div id="particles-js"></div>
        </div>
        <section class="clearfix">
            <div id="women_box">
                <div class="women_img"></div>
                <div class="contentBox">
                    <div class="title">製床所御品</div>
                    <div class="content">
                        <p>秉持匠心手作精神，一針一線專注細節<br>
                            製床所相信床墊擁有獨一無二的靈魂，<br>
                            織就無數美好的夜晚，<br>
                            就像被施展了魔法，生活平凡的小確幸
                            <!-- 美好，是可以創造的 -->
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <article id="mainPage_article">
            <section id="feature">
                <div class="title">獨家特色</div>
                <div class="scrollBox">
                    <div class="scrollBox_order">
                        <ul class="scrollItem">
                            <li class="listItem" data-item="1">
                                <div class="feature_img"><img src="images/feature_01.png" alt="指定合作廠商"></div>
                                <div class="feature_title">指定合作廠商</div>
                            </li>
                            <li class="listItem" data-item="2">
                                <div class="feature_img"><img src="images/feature_02.png" alt="客製化設計"></div>
                                <div class="feature_title">客製化設計</div>
                            </li>
                            <li class="listItem" data-item="3">
                                <div class="feature_img"><img src="images/feature_03.png" alt="職人手作"></div>
                                <div class="feature_title">職人手作</div>
                            </li>
                            <li class="listItem" data-item="4">
                                <div class="feature_img"><img src="images/feature_04.png" alt="運送、舊床回收"></div>
                                <div class="feature_title">運送、舊床回收</div>
                            </li>
                            <li class="listItem" data-item="5">
                                <div class="feature_img"><img src="images/feature_05.png" alt="專人線上諮詢"></div>
                                <div class="feature_title">專人線上諮詢</div>
                            </li>
                        </ul>
                    </div>
                    <div class="scrollController">
                        <div class="btn_left"></div>
                        <div class="btn_right"></div>
                    </div>
                </div>
            </section>
            <section id="customized"></section>
            <section id="newsBox" class="clearfix">
                <div class="title_left">
                    <div class="title">限時優惠 / <span class="text_en">News</span></div>
                </div>
                <div class="limitedSwiperContainer">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <img class="swiper-slide" onclick="goPage('limited.html', 1)" src="images/limited_item_rect_01.jpg?0222" alt="">
                            <img class="swiper-slide" onclick="goPage('limited.html', 2)" src="images/limited_item_rect_02.jpg?0222" alt="">
                            <img class="swiper-slide" onclick="goPage('limited.html', 3)" src="images/limited_item_rect_03.jpg?0222" alt="">
                            <img class="swiper-slide" onclick="goPage('limited.html', 4)" src="images/limited_item_rect_04.jpg?0222" alt="">
                            <img class="swiper-slide" onclick="goPage('limited.html', 5)" src="images/limited_item_rect_05.jpg?0222" alt="">
                        </div>
                        <!-- <div class="swiper-pagination"></div> -->
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev">
                        </div>
                        <div class="swiper-button-next">
                            <!-- <i class="fa-solid fa-angle-right"></i> -->
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="products">
                <div class="container">
                    <div class="title">好眠商品 / Product</div>
                    <div class="scrollBox">
                        <div class="scrollBox_order">
                            <ul id="limit_products" class="scrollItem">
                                <li class="listItem" data-item="1" onclick="goPage('products.html?product_id=0')" ><div></div></li>
                                <li class="listItem" data-item="2" onclick="goPage('products.html?product_id=0')" ><div></div></li>
                                <li class="listItem" data-item="3" onclick="goPage('products.html?product_id=0')" ><div></div></li>
                                <li class="listItem" data-item="4" onclick="goPage('products.html?product_id=0')" ><div></div></li>
                                <li class="listItem" data-item="5" onclick="goPage('products.html?product_id=0')" ><div></div></li>
                                <li class="listItem" data-item="6" onclick="goPage('products.html?product_id=0')" ><div></div></li>
                                <li class="listItem" data-item="7" onclick="goPage('products.html?product_id=0')" ><div></div></li>
                                <li class="listItem" data-item="8" onclick="goPage('products.html?product_id=0')" ><div></div></li>
                            </ul>
                        </div>
                        <div class="scrollController">
                            <div class="btn_left"></div>
                            <div class="btn_right"></div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
    <footer></footer>
</body>
<script src="js/particles.js"></script>
<script>
    let this_page = 'main_page';
    particlesJS.load('particles-js','json/particlesjs-config.json')
</script>
<script type="module" src="js/js_template.js?0202-02"></script>
<script type="module" src="js/template/customer_module.js"></script>
<script type="module" src="js/template/scrollBox.js?230110"></script>
<script>
    $(document).ready(function(){
        hot_product();
        limit_product();
    })
    $('#newsContent .btn_left').on('click', function(event){
        clickLeft();
    });
    $('#newsContent .btn_right').on('click', function(event){
        clickRight();
    });

    function clickLeft(){
        let _left = $('#newsContent .ulContainer ul').offset().left;
        console.log($('#newsContent .ulContainer ul').offset().left)
        if (_left > 0) {
            $('#newsContent .ulContainer ul').offset({left: _left - 200})
        }
    }
    function clickRight(){
        let _left = $('#newsContent .ulContainer ul').offset().left;
        console.log($('#newsContent .ulContainer ul').offset().left)

        if (_left < 500) {
            $('#newsContent .ulContainer ul').offset({left: _left + 200})
        }
    }
    function hot_product(){
        let list_temp = '';
        const hot_arrays = [
            {
                img: '10',
                name: '商品名稱1'
            },
            {
                img: '11',
                name: '商品名稱2'
            },
            {
                img: '12',
                name: '商品名稱3'
            },
            {
                img: '13',
                name: '商品名稱4'
            },
            {
                img: '14',
                name: '商品名稱5'
            },
        ];
        for( let i = 0; i < 5; i++){
            list_temp = `<a href="#"><span class="product_img"><img src="https://picsum.photos/200/200/?random=${i}"></span><span class="product_name">${hot_arrays[i].name}</span></a>`;
            $('#hot_products li > div').eq(i).html(list_temp)
        }
    }
    function limit_product(){
        let list_temp = '';
        const limit_arrays = [
            {
                img: './images/products/bed/bed_1.png',
                name: '波浪舒眠床墊'
            },
            {
                img: './images/products/bed/bed_2.png',
                name: '波浪極致舒眠床墊'
            },
            {
                img: './images/products/bed/bed_3.png',
                name: 'QQ 雲朵床墊'
            },
            {
                img: './images/products/bed/bed_4.png',
                name: '雲朵極致紓壓床墊'
            },
            {
                img: './images/products/bed/bed_5.png',
                name: '尊爵舒眠床墊'
            },
            {
                img: './images/products/bed/bed_6.png',
                name: '商業用床墊'
            },
            {
                img: './images/products/bed/bed_7.png',
                name: '商業用訂製床墊'
            },
            {
                img: './images/products/bed/bed_8.png',
                name: '雲朵獨立筒/波浪乳膠薄墊'
            },
        ];
        for( let i = 0; i < 8; i++){
            list_temp = `<a href="#"><span class="product_img"><img src="${limit_arrays[i].img}"></span><span class="product_name">${limit_arrays[i].name}</span></a>`;
            $('#limit_products li > div').eq(i).html(list_temp)
        }
    }

    function goPage (page, index) {
        window.location.href = `${page}`;
    }
</script>
<script>
    let mySwiper = new Swiper('.swiper', {
        direction: 'horizontal', // 垂直切換選項
        loop: true, // 迴圈模式選項
        spaceBetween:  $('body').width() > 991 ? 45 : 25,
        slidesPerView: $('body').width() > 991 ? 2 : 1,
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 2000,
        },
        // 如果需要分頁器
        // pagination: {
        //     el: '.swiper-pagination',
        // },
    })
    setTimeout(() => {
        if ($('body').width > 1200 && $('.limitedSwiperContainer').height() - $('#customized').height() > 30) {
            $('#customized').height($('.limitedSwiperContainer').height() - 30);
        }
    }, 100);
</script>
</html>

<style>
.limitedSwiperContainer {
  position: relative;
  width: auto;
  background-color: #fff;
  margin: 0 auto 0;
}
.limitedSwiperContainer::after {
    position: absolute;
    display: block;
    content: "";
    width: 100%;
    height: 100%;
    top: 0;
    left: -50px;
    background-color: #fff;
    transform: skewX(-10deg);
}
.swiper {
  padding: 30px 50px;
  overflow: hidden;
  margin: 0 auto;
}
.swiper-wrapper {
  /* max-width: 300px; */
  bottom: 0px;
  padding: 0 10px;
}
img.swiper-slide {
}
@media (min-width: 768px) {
  .swiper {
    width: 50vw;
  }
}

@media (min-width: 991px) {
  .limitedSwiperContainer {
      margin-left: 480px;
      width: calc(100% - 480px);
      padding-right: 15px;
  }
  .swiper {
    width: 95%;
    max-width: 1600px;
  }
  .swiper-wrapper {
    max-width: 360px;
    display: flex;
    align-items: center;
  }
}
@media (min-width: 1200px) {
  .limitedSwiperContainer {

  }
  .swiper {
    border: none;
  }
  .swiper-wrapper {
    max-width: 360px;
  }
}
/*  蓋掉原生的按鈕樣式 */
.swiper-button-next:after,
.swiper-container-rtl .swiper-button-prev:after,
.swiper-button-prev:after, .swiper-container-rtl .swiper-button-next:after {
  content: none;
}

.swiper-button-prev,
.swiper-button-next {
  color: #2f5575;
  padding: 10px 2px;
  font-size: 45px;
  background: #fff;
  height: 100%;
  width: 60px;
  top: 0;
}

.swiper-button-prev {
  left: 0px;
}
.swiper-button-next {
  right: -10px;
}
.swiper-button-prev::before,
.swiper-button-next::before {
    background: #2f5575;
    transform: rotate(-45deg);
    top: 50%;
    position: absolute;
    display: block;
    content: "";
    width: 30px;
    height: 4px;
    right: 20px;
}
.swiper-button-prev::after,
.swiper-button-next::after {
    background: #2f5575;
    transform: rotate(45deg);
    top: calc(50% + 20px);
    position: absolute;
    display: block;
    content: "";
    width: 30px;
    height: 4px;
    left: 10px;
}
.swiper-button-next::before {
    right: 10px;
    transform: rotate(45deg);
}

.swiper-button-next::after {
    left: 20px;
    transform: rotate(-45deg);
}

</style>