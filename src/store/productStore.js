// src/store/productStore.js
export default {
  bed1: {
    img: [
      '/assets/images/product/bed/1/1.jpg',
      '/assets/images/product/bed/1/2.jpg',
      '/assets/images/product/bed/1/3.jpg',
      '/assets/images/product/bed/1/4.jpg',
      '/assets/images/product/bed/1/5.jpg',
      '/assets/images/product/bed/1/6.jpg',
    ],
    name: '國民熱銷舒眠床墊',
    desc: [
      '🔹 高支撐 × 高穩定 × 高耐用',
      '專為偏好硬床睡感而設計，整體床體扎實穩重，有效承托脊椎，釋放腰背壓力，帶來真正的放鬆感受。',
      '🔹 高碳鋼 Bonnell 彈簧 × SGS 耐壓認證',
      '選用高碳鋼材質製成，具備穩定的彈性及優良的耐壓性，不易變形。經過超過 10,000 次的翻身模擬壓測，無論睡多久，依然穩如初見。',
      '🔹 S-Grid 串聯撐壓結構™',
      '密度升級使彈簧數量比傳統增加20%，床體重量達到100公斤，實現更均勻的支撐力分布，避免局部陷落，開啟真正的「睡眠勿擾模式」。',
      '🔹 雙層抗干擾張力棉襯',
      '搭載兩倍厚度的干擾張力棉襯，強化吸壓回彈性，有效降低翻身時的干擾感，延長床墊的使用壽命，並提升舒適度與耐磨性。',
      '🔹 進口棉質表布 × 高透氣蓬鬆層',
      '觸感柔軟、透氣且快乾，能夠保持肌膚乾爽舒適，彷彿置身於自然的空氣中。',
      '🔹 360° M字型床緣加固設計',
      '即使坐在床邊也不會塌陷或傾斜，穩定性全面升級，安全感更是倍增。'
    ],
    size_obj: [
      { size: '單人3*6.2尺(91*188cm)', ori_price: 7800, discount_price: 5800 },
      { size: '單人加大3.5*6.2尺(106*188cm)', ori_price: 7980, discount_price: 5980 },
      { size: '標準雙人5*6.2尺(152*188cm)', ori_price: 10800, discount_price: 8800 },
      { size: '雙人加大6*6.2尺(182*188cm)', ori_price: 14800, discount_price: 13800 },
      { size: 'King size6*7尺(182*212cm)', ori_price: 18800, discount_price: 16800 },
    ],
    hardness_degree: 6,
    image_intro: [
      '/assets/images/product/bed/1/structure.jpg',
      '/assets/images/product/bed/1/feature.jpg',
      '/assets/images/product/bed/1/size.jpg'
    ],
    tab_behavior: 'scroll',
    tab_content: [
      {
        name: 'structure',
        tab: '床墊結構',
        main: '連結式床墊，使用高碳鋼硬彈簧與厚實的內襯，充分支撐身體不容易凹陷，高耐用不易壞。',
        mainImg: '/assets/images/product/tab2-main.jpg',
        feature: [
          {
            title: '棉質表布',
            desc: '大部分的衣服材質（70%化學纖維+30%棉紗）',
            img: '/assets/images/product/tab2-feature1.jpg',
          },
          {
            title: '高碳鋼硬彈簧',
            desc: '使用中鋼彈簧、鋼線串聯，躺下去能平均分散重量，讓脊椎平直伸展、支撐身體不易凹陷，使之較為穩固。',
            img: '/assets/images/product/tab2-feature2.jpg',
          },
          {
            title: '厚實內襯',
            desc: '緩衝與彈簧的接觸，該添加的材料都有添加，做的很扎實很有支撐力。',
            img: '/assets/images/product/tab2-feature3.jpg',
          },
          {
            title: '強化邊框',
            desc: '床沿四邊做支撐加墊，讓上下床更有支撐力，使邊緣不易變形。',
            img: '/assets/images/product/tab2-feature4.jpg',
          },
        ],
        bottom: {
          title: '100%台灣職人手作',
          desc: '製床所長期以來的經驗與堅持，為不同需求喜好打造專屬床墊。<br><br>高碳鋼Q床使用非常多且粗的彈簧，擁有扎實Q彈的支撐力，平價並且非常耐用，不必擔心使用年限的問題，CP值高，推薦給喜歡硬床的你！',
          img: '/assets/images/product/tab2-bottom.jpg',
        },
      },
      {
        name: 'feature',
        tab: '床墊特色',
        main: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
        secondary: [
          {
            title: '提升深層睡眠30%',
            desc: 'Lunio 乳膠床墊通過了“AASM美國睡眠中心”的嚴格測試，比一般床墊能確實提升深層睡眠30%，一晚達到5次以上的深度睡眠週期。',
          },
          {
            title: '舒適恆溫表布',
            desc: 'Outlast Space Tech®智慧溫控技術，感應體溫並調節，讓身體維持恆溫的舒適感，睡眠時不受冷熱干擾。',
          },
          {
            title: '零重力的輕盈涼感',
            desc: '零重力的冷凝支撐層，透氣性提高30倍，提供零重力般的輕盈涼感，翻身也不易受到干擾。',
          },
          {
            title: '德國科技，持久清涼',
            desc: '鋁來減少多餘床墊的熱量，讓床墊持續保持涼爽。',
          },
        ],
        img: '/assets/images/product/item2.jpg',
      },
      {
        name: 'size',
        tab: '尺寸說明',
        main: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
        secondary: [
          {
            title: '提升深層睡眠30%',
            desc: 'Lunio 乳膠床墊通過了“AASM美國睡眠中心”的嚴格測試，比一般床墊能確實提升深層睡眠30%，一晚達到5次以上的深度睡眠週期。',
          },
          {
            title: '舒適恆溫表布',
            desc: 'Outlast Space Tech®智慧溫控技術，感應體溫並調節，讓身體維持恆溫的舒適感，睡眠時不受冷熱干擾。',
          },
          {
            title: '零重力的輕盈涼感',
            desc: '零重力的冷凝支撐層，透氣性提高30倍，提供零重力般的輕盈涼感，翻身也不易受到干擾。',
          },
          {
            title: '德國科技，持久清涼',
            desc: '鋁來減少多餘床墊的熱量，讓床墊持續保持涼爽。',
          },
        ],
        img: '/assets/images/product/item2.jpg',
      },
    ],
    deliverService: {
      img: [
        '/assets/images/product/item3.jpg',
        '/assets/images/product/item3.jpg',
        '/assets/images/product/item3.jpg',
      ],
      desc: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
    },
    good_comment_obj: [
      {
        name: 'Z小姐',
        comment:
          '老闆很專業而且很實在，不會一直推銷最貴的商品，仔細講解商品優異處，介紹符合訴求的商品，會讓客人親自體驗再選擇適合自己的，超有誠意的銷售。',
        img: '/assets/images/index/photo_test1.png',
      },
      {
        name: 'A先生',
        comment:
          '老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄 老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄',
        img: '/assets/images/index/photo_test3.png',
      },
      {
        name: '李小姐',
        comment:
          '非常感謝店長介紹很詳細，貨比三家當天就決定還是要去這邊買，不會一直推銷最貴的床，很好溝通也會仔細聽你的訴求。 ',
        img: '/assets/images/index/photo_test2.png',
      },
      {
        name: 'A先生',
        comment:
          '老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄 老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄',
        img: '/assets/images/index/photo_test3.png',
      },
    ],
    qa_obj: [
      {
        question: '訂購多久後會幫我配送？',
        ans: '下單後支付完訂金，<span class="font-bold">約7-10個工作日後配送，</span>如遇特殊尺寸需較長製作時間。<span class="font-bold">詳情可點擊下方來聊聊與客服團隊線上聯繫</span>。',
      },
      {
        question: '買了新床墊，舊床可以幫忙回收嗎? ',
        ans: `<span class="font-bold">舊床回收有2種方式 (免付費&付費)，方式如下</span><br>
        1.<span class="font-bold"> 免付費</span>：您可預約政府清潔隊，協助將您的舊床搬到指定回收地方放置<br>
        2.<span class="font-bold">需收清運費</span>($700~1500)：由御品協助清運至合法回收廠商，將依舊床尺寸酌收清運費`,
      },
      {
        question: '床墊保固時間多久呢?',
        ans: '請點擊查看保固內容<span class="font-bold">「製床所10年保固計畫」，詳情可至購買須知查看 </span>',
      },
    ],

  },
  bed2: {
        img: [
          '/assets/images/product/bed/2/1.jpg',
          '/assets/images/product/bed/2/2.jpg',
          '/assets/images/product/bed/2/3.jpg',
          '/assets/images/product/bed/2/4.jpg',
          '/assets/images/product/bed/2/5.jpg',
          '/assets/images/product/bed/2/6.jpg',
        ],
    name: '綿雲舒壓床墊',
        desc: [
          '🔹 獨立支撐 × 靜音分壓 × 長效回彈',
          '專為重視睡眠品質打造，內部結構穩定扎實，有效平均釋壓、維持脊椎自然曲線，給予全身星空漂浮感。',
          '🔹 獨立筒 Pocket Spring 彈簧 × SGS 韌性測試',
          '每顆彈簧使用高強度無紡布包裝、單點受壓不互擾，通過超過10,000次彈跳模擬與側壓測試，展現優異支撐穩定性與耐久力。',
          '🔹 H-Flow 精密分區支撐系™',
          '依照人體工學區分不同彈簧張力，頭肩、腰臀、腿足各得其所，減少錯位與僵硬感，全面升級深層釋壓體驗。',
          '🔹 雙層減震吸壓棉襯',
          '選用雙層強回彈吸壓材質，有效吸收翻身震動，緩解伴侶干擾，同時增強床體整體結構壽命與舒適度。',
          '🔹 1cm 天然乳膠升級柔彈觸感，貼合每一處壓力點',
          '躺感柔彈升級，天然乳膠層自然貼合身體曲線、平均分散壓力，有效舒緩肩頸與臀部的肌肉壓力。一覺醒來放鬆又不痠痛。',
          '🔹 進口天絲棉 X高透氣，給肌膚深呼吸的自由',
          '升級親膚涼感天絲棉布，吸濕排汗優於一般棉布，冬暖夏涼恆溫滑順觸感，讓你從身到心都能好好放鬆深層入眠。',
          '🔹 360° 高密度M型床緣強化結構',
          '使用高密度M型護邊設計，從邊到角皆能穩穩支撐，久坐不傾、不陷，讓你每一寸落座都安心。'
        ],
        size_obj: [
          {size: '單人3*6.2尺(91*188cm)', ori_price: 8800, discount_price: 6800}, 
          {size: '單人加大3.5*6.2尺(106*188cm)', ori_price: 8980, discount_price: 6980 },
          {size: '標準雙人5*6.2尺(152*188cm)', ori_price: 11800, discount_price: 9800 },
          {size: '雙人加大6*6.2尺(182*188cm)', ori_price: 16800, discount_price: 14800 },
        ],
        hardness_degree: 6,
        image_intro: [
          '/assets/images/product/bed/2/structure.jpg',
          '/assets/images/product/bed/2/feature.jpg',
          '/assets/images/product/bed/2/size.jpg'
        ],
        tab_content: [
          {
            name: 'structure',
            tab: '床墊結構',
            main: '連結式床墊，使用高碳鋼硬彈簧與厚實的內襯，充分支撐身體不容易凹陷，高耐用不易壞。',
            mainImg: '/assets/images/product/tab2-main.jpg',
            feature: [
              {
                title: '棉質表布',
                desc: '大部分的衣服材質（70%化學纖維+30%棉紗）',
                img: '/assets/images/product/tab2-feature1.jpg',
              },
              {
                title: '高碳鋼硬彈簧',
                desc: '使用中鋼彈簧、鋼線串聯，躺下去能平均分散重量，讓脊椎平直伸展、支撐身體不易凹陷，使之較為穩固。',
                img: '/assets/images/product/tab2-feature2.jpg',
              },
              {
                title: '厚實內襯',
                desc: '緩衝與彈簧的接觸，該添加的材料都有添加，做的很扎實很有支撐力。',
                img: '/assets/images/product/tab2-feature3.jpg',
              },
              {
                title: '強化邊框',
                desc: '床沿四邊做支撐加墊，讓上下床更有支撐力，使邊緣不易變形。',
                img: '/assets/images/product/tab2-feature4.jpg',
              },
            ],
            bottom: {
              title: '100%台灣職人手作',
              desc: '製床所長期以來的經驗與堅持，為不同需求喜好打造專屬床墊。<br><br>高碳鋼Q床使用非常多且粗的彈簧，擁有扎實Q彈的支撐力，平價並且非常耐用，不必擔心使用年限的問題，CP值高，推薦給喜歡硬床的你！',
              img: '/assets/images/product/tab2-bottom.jpg',
            },
          },
          {
            name: 'feature',
            tab: '床墊特色',
            main: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
            secondary: [
              {
                title: '提升深層睡眠30%',
                desc: 'Lunio 乳膠床墊通過了“AASM美國睡眠中心”的嚴格測試，比一般床墊能確實提升深層睡眠30%，一晚達到5次以上的深度睡眠週期。',
              },
              {
                title: '舒適恆溫表布',
                desc: 'Outlast Space Tech®智慧溫控技術，感應體溫並調節，讓身體維持恆溫的舒適感，睡眠時不受冷熱干擾。',
              },
              {
                title: '零重力的輕盈涼感',
                desc: '零重力的冷凝支撐層，透氣性提高30倍，提供零重力般的輕盈涼感，翻身也不易受到干擾。',
              },
              {
                title: '德國科技，持久清涼',
                desc: '鋁來減少多餘床墊的熱量，讓床墊持續保持涼爽。',
              },
            ],
            img: '/assets/images/product/item2.jpg',
          },
          {
            name: 'size',
            tab: '尺寸說明',
            main: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
            secondary: [
              {
                title: '提升深層睡眠30%',
                desc: 'Lunio 乳膠床墊通過了“AASM美國睡眠中心”的嚴格測試，比一般床墊能確實提升深層睡眠30%，一晚達到5次以上的深度睡眠週期。',
              },
              {
                title: '舒適恆溫表布',
                desc: 'Outlast Space Tech®智慧溫控技術，感應體溫並調節，讓身體維持恆溫的舒適感，睡眠時不受冷熱干擾。',
              },
              {
                title: '零重力的輕盈涼感',
                desc: '零重力的冷凝支撐層，透氣性提高30倍，提供零重力般的輕盈涼感，翻身也不易受到干擾。',
              },
              {
                title: '德國科技，持久清涼',
                desc: '鋁來減少多餘床墊的熱量，讓床墊持續保持涼爽。',
              },
            ],
            img: '/assets/images/product/item2.jpg',
          },
        ],
        deliverService: {
          img: [
            '/assets/images/product/item3.jpg',
            '/assets/images/product/item3.jpg',
            '/assets/images/product/item3.jpg',
          ],
          desc: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
        },
        good_comment_obj: [
          {
            name: 'Z小姐',
            comment:
              '老闆很專業而且很實在，不會一直推銷最貴的商品，仔細講解商品優異處，介紹符合訴求的商品，會讓客人親自體驗再選擇適合自己的，超有誠意的銷售。',
            img: '/assets/images/index/photo_test1.png',
          },
          {
            name: 'A先生',
            comment:
              '老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄 老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄',
            img: '/assets/images/index/photo_test3.png',
          },
          {
            name: '李小姐',
            comment:
              '非常感謝店長介紹很詳細，貨比三家當天就決定還是要去這邊買，不會一直推銷最貴的床，很好溝通也會仔細聽你的訴求。 ',
            img: '/assets/images/index/photo_test2.png',
          },
          {
            name: 'A先生',
            comment:
              '老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄 老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄',
            img: '/assets/images/index/photo_test3.png',
          },
        ],
        qa_obj: [
          {
            question: '訂購多久後會幫我配送？',
            ans: '有的，可以參考我們的高碳鋼Q床，其中使用了專利研發的吸震材料，讓硬床也可以一夜好眠。也可以針對近一步需求，下方聊聊，打造你的靈魂床墊。',
          },
          {
            question: '舊床可以幫忙回收嗎？',
            ans: '當然有的，製床所可為你的出租套房，打造設計感統一，耐用且高CP值的出租床組。',
          },
          {
            question: '表布和內層可以拆開來洗嗎？',
            ans: '市售獨立筒床墊因結構方式容易讓彈簧分離，支撐力會因使用年限受限，可能因為結構分離，失去支撐力，使你腰痠背痛，歡迎下方聊聊，針對喜歡的軟硬與需求，打造你的靈魂床墊。',
          },
        ],
      
  },
  bed3: {
    img: [
      '/assets/images/product/bed/3/1.jpg',
      '/assets/images/product/bed/3/2.jpg',
      '/assets/images/product/bed/3/3.jpg',
      '/assets/images/product/bed/3/4.jpg',
      '/assets/images/product/bed/3/5.jpg',
      '/assets/images/product/bed/3/6.jpg',
    ],
    name: '夢幻舒服床墊',
    desc: [
      '🔹 獨立支撐 × 高彈靜音 × 熟睡型',
      '夢幻舒眠床墊，結合高密度蜂巢彈簧、1 英吋天然乳膠與頂級天絲棉表層，打造三重舒眠防線。穩定支撐、無壓貼合、柔軟透氣，讓你一夜好眠不是奢求，而是日常。',
      '🔹 Alternating蜂巢式X密集支撐系統',
      '採用採六角形排列方式(蜂巢式)，密度較直列式結構提升約20%，且每顆彈簧獨立筒採4點接觸連結緊密，讓整體撐托更均勻、服貼，避免睡感塌陷，翻身不互擾。',
      '🔹 台灣中鋼X雙股彈簧X高彈細膩支撐',
      '獨家開發設計雙股彈簧，強化承重力支撐再升級，兼具高彈力且不塌陷。躺下與起身時不會有過強或過弱的回彈感。',
      '🔹 獨立筒 Pocket Spring 彈簧 × SGS 韌性測試',
      '每顆彈簧使用高強度無紡布包裝、單點受壓不互擾，通過超過10,000次彈跳模擬與側壓測試，展現優異支撐穩定性與耐久力。',
      '🔹人體工學分區承托X更精準',
      '高密度彈簧分佈能支撐人體多點部位，依照人體肩膀、腰部、臀部精準釋壓，撐托每一吋脊椎。躺下都能得到細膩承托感，',
      '🔹1 英吋天然乳膠層 × 雙層減震吸壓棉襯',
      '95%天然橡膠製成，具優異彈性能快速回彈、釋放壓力，兼且抗菌防蟎特性；搭配雙層吸震結構，有效減緩翻身震動，降低伴侶干擾，讓你一覺到天亮。',
      '🔹  進口天絲棉表布 × 四季恆溫透氣',
      '親膚天絲棉升級體感舒適，吸濕排汗、滑順柔軟，適應台灣氣候冬暖夏涼，讓肌膚自由呼吸，每晚都像被雲朵包覆般入睡。',
    ],
    size_obj: [
      { size: '單人3*6.2尺(91*188cm)', ori_price: 12800, discount_price: 10800 },
      { size: '單人加大3.5*6.2尺(106*188cm)', ori_price: 12980, discount_price: 10980 },
      { size: '標準雙人5*6.2尺(152*188cm)', ori_price: 17800, discount_price: 15800 },
      { size: '雙人加大6*6.2尺(182*188cm)', ori_price: 21800, discount_price: 19800 },
      { size: 'King size6*7尺(182*212cm)', ori_price: 25800, discount_price: 23800 },
    ],
    hardness_degree: 3,
    image_intro: [
      '/assets/images/product/bed/3/structure.jpg',
      '/assets/images/product/bed/3/feature.jpg',
      '/assets/images/product/bed/3/size.jpg'
    ],
    tab_content: [
      {
        name: 'structure',
        tab: '床墊結構',
        main: '連結式床墊，使用高碳鋼硬彈簧與厚實的內襯，充分支撐身體不容易凹陷，高耐用不易壞。',
        mainImg: '/assets/images/product/tab2-main.jpg',
        feature: [
          {
            title: '棉質表布',
            desc: '大部分的衣服材質（70%化學纖維+30%棉紗）',
            img: '/assets/images/product/tab2-feature1.jpg',
          },
          {
            title: '高碳鋼硬彈簧',
            desc: '使用中鋼彈簧、鋼線串聯，躺下去能平均分散重量，讓脊椎平直伸展、支撐身體不易凹陷，使之較為穩固。',
            img: '/assets/images/product/tab2-feature2.jpg',
          },
          {
            title: '厚實內襯',
            desc: '緩衝與彈簧的接觸，該添加的材料都有添加，做的很扎實很有支撐力。',
            img: '/assets/images/product/tab2-feature3.jpg',
          },
          {
            title: '強化邊框',
            desc: '床沿四邊做支撐加墊，讓上下床更有支撐力，使邊緣不易變形。',
            img: '/assets/images/product/tab2-feature4.jpg',
          },
        ],
        bottom: {
          title: '100%台灣職人手作',
          desc: '製床所長期以來的經驗與堅持，為不同需求喜好打造專屬床墊。<br><br>高碳鋼Q床使用非常多且粗的彈簧，擁有扎實Q彈的支撐力，平價並且非常耐用，不必擔心使用年限的問題，CP值高，推薦給喜歡硬床的你！',
          img: '/assets/images/product/tab2-bottom.jpg',
        },
      },
      {
        name: 'feature',
        tab: '床墊特色',
        main: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
        secondary: [
          {
            title: '提升深層睡眠30%',
            desc: 'Lunio 乳膠床墊通過了“AASM美國睡眠中心”的嚴格測試，比一般床墊能確實提升深層睡眠30%，一晚達到5次以上的深度睡眠週期。',
          },
          {
            title: '舒適恆溫表布',
            desc: 'Outlast Space Tech®智慧溫控技術，感應體溫並調節，讓身體維持恆溫的舒適感，睡眠時不受冷熱干擾。',
          },
          {
            title: '零重力的輕盈涼感',
            desc: '零重力的冷凝支撐層，透氣性提高30倍，提供零重力般的輕盈涼感，翻身也不易受到干擾。',
          },
          {
            title: '德國科技，持久清涼',
            desc: '鋁來減少多餘床墊的熱量，讓床墊持續保持涼爽。',
          },
        ],
        img: '/assets/images/product/item2.jpg',
      },
      {
        name: 'size',
        tab: '尺寸說明',
        main: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
        secondary: [
          {
            title: '提升深層睡眠30%',
            desc: 'Lunio 乳膠床墊通過了“AASM美國睡眠中心”的嚴格測試，比一般床墊能確實提升深層睡眠30%，一晚達到5次以上的深度睡眠週期。',
          },
          {
            title: '舒適恆溫表布',
            desc: 'Outlast Space Tech®智慧溫控技術，感應體溫並調節，讓身體維持恆溫的舒適感，睡眠時不受冷熱干擾。',
          },
          {
            title: '零重力的輕盈涼感',
            desc: '零重力的冷凝支撐層，透氣性提高30倍，提供零重力般的輕盈涼感，翻身也不易受到干擾。',
          },
          {
            title: '德國科技，持久清涼',
            desc: '鋁來減少多餘床墊的熱量，讓床墊持續保持涼爽。',
          },
        ],
        img: '/assets/images/product/item2.jpg',
      },
    ],
    deliverService: {
      img: [
        '/assets/images/product/item3.jpg',
        '/assets/images/product/item3.jpg',
        '/assets/images/product/item3.jpg',
      ],
      desc: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
    },
    good_comment_obj: [
      {
        name: 'Z小姐',
        comment:
          '老闆很專業而且很實在，不會一直推銷最貴的商品，仔細講解商品優異處，介紹符合訴求的商品，會讓客人親自體驗再選擇適合自己的，超有誠意的銷售。',
        img: '/assets/images/index/photo_test1.png',
      },
      {
        name: 'A先生',
        comment:
          '老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄 老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄',
        img: '/assets/images/index/photo_test3.png',
      },
      {
        name: '李小姐',
        comment:
          '非常感謝店長介紹很詳細，貨比三家當天就決定還是要去這邊買，不會一直推銷最貴的床，很好溝通也會仔細聽你的訴求。 ',
        img: '/assets/images/index/photo_test2.png',
      },
      {
        name: 'A先生',
        comment:
          '老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄 老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄',
        img: '/assets/images/index/photo_test3.png',
      },
    ],
    qa_obj: [
      {
        question: '訂購多久後會幫我配送？',
        ans: '有的，可以參考我們的高碳鋼Q床，其中使用了專利研發的吸震材料，讓硬床也可以一夜好眠。也可以針對近一步需求，下方聊聊，打造你的靈魂床墊。',
      },
      {
        question: '舊床可以幫忙回收嗎？',
        ans: '當然有的，製床所可為你的出租套房，打造設計感統一，耐用且高CP值的出租床組。',
      },
      {
        question: '表布和內層可以拆開來洗嗎？',
        ans: '市售獨立筒床墊因結構方式容易讓彈簧分離，支撐力會因使用年限受限，可能因為結構分離，失去支撐力，使你腰痠背痛，歡迎下方聊聊，針對喜歡的軟硬與需求，打造你的靈魂床墊。',
      },
    ],

  },
  bed4: {
    img: [
      '/assets/images/product/bed/4/1.jpg',
      '/assets/images/product/bed/4/2.jpg',
      '/assets/images/product/bed/4/3.jpg',
      '/assets/images/product/bed/4/4.jpg',
      '/assets/images/product/bed/4/5.jpg',
      '/assets/images/product/bed/4/6.jpg',
    ],
    name: '魔力彈韌床墊',
    desc: [
      '🔹 飯店級奢華 × 高回彈X 航太睡眠',
      '選用含鈦合金打造的彈簧，怎麼翻、怎麼跳都不塌陷。外柔內剛、穩中帶彈，撐得住重壓，也接得住疲憊，打造如住飯店般的睡眠質感。',
      '🔹 含鈦彈簧核心｜航太科技首選，最高級的支撐',
      '採用航太科技鈦合金彈簧，回彈強度提升80%，堅韌輕盈，在75公斤垂直重複壓測，7萬次循環不變形；同時具備抗氧化與抗潮濕，比碳鋼系列彈簧更具續航力。',
      '🔹 1 吋(2.54CM)天然乳膠｜深入每一吋釋壓點',
      '層層呵護柔彈包覆更全面。有效分散肩頸與腰臀壓力，減少翻身次數，讓熟睡變成日常。',
      '🔹 S-Grid 串聯撐壓結構™｜含鈦彈簧，雙技術結合',
      '雙層升級，航太高科技的享受，S-Grid 串聯撐壓結構藉由網狀排列精準分配受力，減少單點壓迫。並搭配航太科技彈簧提彈性韌度，回彈靈敏，不管側睡還是平躺，每一寸服貼承托。',
      '🔹經得住考驗的床，跳了也不怕｜可乘載幸福的未來',
      '不管是年輕夫妻、還是有學齡前的小孩家庭，可以讓你們無憂無慮的安心使用，不怕跳的床墊，才是真的耐用!',
      '🔹 雙層彈力棉｜支撐與回彈雙進化',
      '緩衝跳動動作、延長床墊壽命，不僅耐睡，也耐用。',
      '🔹 天絲棉表布｜親膚透氣 × 睡感更升級',
      '使用高品質天絲棉表布，細緻觸感配上絕佳吸濕透氣能力，讓每一晚都如沐森林微風。',
      '適合四季使用，敏感肌也安心，打造你與肌膚都會愛上的潔淨睡眠環境。',
    ],
    size_obj: [
      { size: '單人3*6.2尺(91*188cm)', ori_price: 11800, discount_price: 9800 },
      { size: '單人加大3.5*6.2尺(106*188cm)', ori_price: 11980, discount_price: 9980 },
      { size: '標準雙人5*6.2尺(152*188cm)', ori_price: 17800, discount_price: 15800 },
      { size: '雙人加大6*6.2尺(182*188cm)', ori_price: 21800, discount_price: 19800 },
      { size: 'King size6*7尺(182*212cm)', ori_price: 24800, discount_price: 22800 },
    ],
    hardness_degree: 3,
    image_intro: [
      '/assets/images/product/bed/4/structure.jpg',
      '/assets/images/product/bed/4/feature.jpg',
      '/assets/images/product/bed/4/size.jpg'
    ],
    tab_content: [
      {
        name: 'structure',
        tab: '床墊結構',
        main: '連結式床墊，使用高碳鋼硬彈簧與厚實的內襯，充分支撐身體不容易凹陷，高耐用不易壞。',
        mainImg: '/assets/images/product/tab2-main.jpg',
        feature: [
          {
            title: '棉質表布',
            desc: '大部分的衣服材質（70%化學纖維+30%棉紗）',
            img: '/assets/images/product/tab2-feature1.jpg',
          },
          {
            title: '高碳鋼硬彈簧',
            desc: '使用中鋼彈簧、鋼線串聯，躺下去能平均分散重量，讓脊椎平直伸展、支撐身體不易凹陷，使之較為穩固。',
            img: '/assets/images/product/tab2-feature2.jpg',
          },
          {
            title: '厚實內襯',
            desc: '緩衝與彈簧的接觸，該添加的材料都有添加，做的很扎實很有支撐力。',
            img: '/assets/images/product/tab2-feature3.jpg',
          },
          {
            title: '強化邊框',
            desc: '床沿四邊做支撐加墊，讓上下床更有支撐力，使邊緣不易變形。',
            img: '/assets/images/product/tab2-feature4.jpg',
          },
        ],
        bottom: {
          title: '100%台灣職人手作',
          desc: '製床所長期以來的經驗與堅持，為不同需求喜好打造專屬床墊。<br><br>高碳鋼Q床使用非常多且粗的彈簧，擁有扎實Q彈的支撐力，平價並且非常耐用，不必擔心使用年限的問題，CP值高，推薦給喜歡硬床的你！',
          img: '/assets/images/product/tab2-bottom.jpg',
        },
      },
      {
        name: 'feature',
        tab: '床墊特色',
        main: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
        secondary: [
          {
            title: '提升深層睡眠30%',
            desc: 'Lunio 乳膠床墊通過了“AASM美國睡眠中心”的嚴格測試，比一般床墊能確實提升深層睡眠30%，一晚達到5次以上的深度睡眠週期。',
          },
          {
            title: '舒適恆溫表布',
            desc: 'Outlast Space Tech®智慧溫控技術，感應體溫並調節，讓身體維持恆溫的舒適感，睡眠時不受冷熱干擾。',
          },
          {
            title: '零重力的輕盈涼感',
            desc: '零重力的冷凝支撐層，透氣性提高30倍，提供零重力般的輕盈涼感，翻身也不易受到干擾。',
          },
          {
            title: '德國科技，持久清涼',
            desc: '鋁來減少多餘床墊的熱量，讓床墊持續保持涼爽。',
          },
        ],
        img: '/assets/images/product/item2.jpg',
      },
      {
        name: 'size',
        tab: '尺寸說明',
        main: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
        secondary: [
          {
            title: '提升深層睡眠30%',
            desc: 'Lunio 乳膠床墊通過了“AASM美國睡眠中心”的嚴格測試，比一般床墊能確實提升深層睡眠30%，一晚達到5次以上的深度睡眠週期。',
          },
          {
            title: '舒適恆溫表布',
            desc: 'Outlast Space Tech®智慧溫控技術，感應體溫並調節，讓身體維持恆溫的舒適感，睡眠時不受冷熱干擾。',
          },
          {
            title: '零重力的輕盈涼感',
            desc: '零重力的冷凝支撐層，透氣性提高30倍，提供零重力般的輕盈涼感，翻身也不易受到干擾。',
          },
          {
            title: '德國科技，持久清涼',
            desc: '鋁來減少多餘床墊的熱量，讓床墊持續保持涼爽。',
          },
        ],
        img: '/assets/images/product/item2.jpg',
      },
    ],
    deliverService: {
      img: [
        '/assets/images/product/item3.jpg',
        '/assets/images/product/item3.jpg',
        '/assets/images/product/item3.jpg',
      ],
      desc: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
    },
    good_comment_obj: [
      {
        name: 'Z小姐',
        comment:
          '老闆很專業而且很實在，不會一直推銷最貴的商品，仔細講解商品優異處，介紹符合訴求的商品，會讓客人親自體驗再選擇適合自己的，超有誠意的銷售。',
        img: '/assets/images/index/photo_test1.png',
      },
      {
        name: 'A先生',
        comment:
          '老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄 老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄',
        img: '/assets/images/index/photo_test3.png',
      },
      {
        name: '李小姐',
        comment:
          '非常感謝店長介紹很詳細，貨比三家當天就決定還是要去這邊買，不會一直推銷最貴的床，很好溝通也會仔細聽你的訴求。 ',
        img: '/assets/images/index/photo_test2.png',
      },
      {
        name: 'A先生',
        comment:
          '老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄 老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄',
        img: '/assets/images/index/photo_test3.png',
      },
    ],
    qa_obj: [
      {
        question: '訂購多久後會幫我配送？',
        ans: '有的，可以參考我們的高碳鋼Q床，其中使用了專利研發的吸震材料，讓硬床也可以一夜好眠。也可以針對近一步需求，下方聊聊，打造你的靈魂床墊。',
      },
      {
        question: '舊床可以幫忙回收嗎？',
        ans: '當然有的，製床所可為你的出租套房，打造設計感統一，耐用且高CP值的出租床組。',
      },
      {
        question: '表布和內層可以拆開來洗嗎？',
        ans: '市售獨立筒床墊因結構方式容易讓彈簧分離，支撐力會因使用年限受限，可能因為結構分離，失去支撐力，使你腰痠背痛，歡迎下方聊聊，針對喜歡的軟硬與需求，打造你的靈魂床墊。',
      },
    ],

  },
}
