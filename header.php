<?php
  $nav_lists = [
    "1" => [
        'link' => 'about.html',
        'name' => '製床所時光機',
        'show' => 'block',
        'lists' => '',
    ],
    "2" => [
        "link" => 'customize.html',
        "name" => '職人客製',
        "show" => 'block',
        "lists" => '',
    ],
    "3" => [
        "link" => 'limited.html',
        "name" => '限時優惠',
        "show" => 'block',
        "lists" => '',
    ],
    "4" => [
        "link" => 'products.html',
        "name" => '好眠商品',
        "show" => 'block',
        "lists" => [
            [
                "listName" => '床墊',
                "listMainId" => 0,
            ],
            [
                "listName" => '床架/床頭櫃',
                "listMainId" => 1,
            ],
            [
                "listName" => '衣櫃',
                "listMainId" => 2,
            ],
        ]
    ],
    "5" => [
        "link" => 'contactUs.html',
        "name" => '御柴客服',
        "show" => 'block',
        "lists" => '',
    ]
  ];


  $page_id = '';
  switch($this_page){
      case 'main_page':
        $page_id = 0;
        break;
      case 'about_page':
        $page_id = 1;
        break;
      case 'customize_page':
        $page_id = 2;
        break;
      case 'limited_page':
        $page_id = 3;
        break;
      case 'products_page':
        $page_id = 4;
        break;
      case 'contact_page':
        $page_id = 5;
        break;
      default:
        $page_id = 0;
        break;
  }
?>

<header>
  <div class="container">
      <div class="logo"><a href="index.html"><img src="images/top_logo.png"></a></div>
      <div id="nav_hamberger">
          <div class="ham_bar"></div>
      </div>
      <nav>
          <ul>
            <?php
              foreach ($nav_lists as $list) {
                  echo '<li style="display: ' . $list['show'] . ';">';
                  if ($list['lists'] != '') {
                      echo '<div class="second_lists">' . $list['name'] . '<ul class="secList_box">';
                      foreach ($list['lists'] as $sec_list) {
                          echo '<li><a href="' . $list['link'] . '?product_id=' . $sec_list['listMainId'] . '">' . $sec_list['listName'] . '</a></li>';
                      }
                      echo '</ul></div>';
                  } else {
                      echo '<a href="' . $list['link'] . '">' . $list['name'] . '</a>';
                  }
                  echo '</li>';
              }
            ?>
          </ul>
      </nav>
      <div class="blackBoard"></div>
  </div>
</header>
<script>
  <?php if ($page_id != 0) { ?>
    document.querySelector('header nav > ul > li:nth-child(<?php echo $page_id; ?>)').classList.add('active');
  <?php } ?>
  $('#nav_hamberger ,.blackBoard').on('click',function(){
      $('.ham_bar, header nav, .blackBoard').toggleClass('active');
  })
  $('.second_lists').on('click', function(){
      $(this).toggleClass('active')
  })
</script>