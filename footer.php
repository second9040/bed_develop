<footer>
    <div class="container clearfix">
        <div class="logo"><img src="images/straight_logo.png"></div>
        <div id="footer_information">
            <div id="company_list">
                <ul>
                    <li class="company_name">製床所御品</li>
                    <li>台中市北區忠明路234號</li>
                    <li>E-mail&nbsp;:&nbsp;<a href="mailto:">jerry113520@gmail.com</a></li>
                    <li>連絡電話&nbsp;:&nbsp;<a href="TEL:04-23201861">04-23201861</a></li>
                    <li>FB粉絲頁&nbsp;:&nbsp;<a href="https://www.facebook.com/wonderfulMattres" target="_blank">04-23201861</a></li>
                </ul>
            </div>
            <div id="social_contact_us">
                <ul class="clearfix">
                    <li><a href="https://www.facebook.com/wonderfulMattres" target="_blank"><img src="images/icon/fb_icon.png" title="製床所 FB" alt="製床所 FB"></a></li>
                    <li><a href="https://lin.ee/KwKuDdB" target="_blank"><img src="images/icon/line_icon.png" title="製床所 line" alt="製床所 line"></a></li>
                    <li><a href="https://instagram.com/wonderfulmattress?igshid=YWJhMjlhZTc=" target="_blank"><img src="images/icon/ig_icon.png" title="製床所 ig" alt="製床所 ig"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="fast_link_popBox">
        <ul id="fast_link_popList">
            <li class="pop_fb"><a href="https://www.facebook.com/wonderfulMattres" target="_blank"><img src="images/icon/fb_icon_circle.png" title="製床所 FB" alt="製床所 FB"></a></li>
            <li class="pop_line"><a href="https://lin.ee/KwKuDdB" target="_blank"><img src="images/icon/line_icon_circle.png" title="製床所 line" alt="製床所 line"></a></li>
            <li class="pop_ig"><a href="https://instagram.com/wonderfulmattress?igshid=YWJhMjlhZTc=" target="_blank"><img src="images/icon/ig_icon_circle.png" title="製床所 ig" alt="製床所 ig"></a></li>
        </ul>
        <div id="fast_link_pop" class="click_me"><img src="images/icon/click_me.png"></div>
        <div id="fast_link_pop" class="click_me_text"><img src="images/icon/click_me_text.png"></div>
        <div id="go_top"></div>
    </div>
</footer>
<script>
  $('#go_top').on('click',function() {
    $('html, body').animate({
      scrollTop: 0
    },1500)
  })
  // fast link pops
  $('#fast_link_pop').on('click', function() {
    $('#fast_link_popBox').toggleClass('active')
  })
      
  // 監聽螢幕尺寸
  $(window).resize(function(){
    if($(window).width() > 768) {
      $('.ham_bar, header nav, .blackBoard, .second_lists').removeClass('active');
    }
  })

  // go top icon show / hide
  $(document).ready(function() {
    $(window).scroll( function() {
      let scrollY = window.scrollY;
      if (scrollY > 300) {
        $('#fast_link_popBox').addClass('show')
      } else {
        $('#fast_link_popBox').removeClass('show active')
      }
    })
  })
</script>