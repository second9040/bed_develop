<template lang="pug">
  #product_detail.product_detail.other_page
    .container
      // shop  area start
      //- .shop_section.shop_reverse
      .main_section
        .container
          .breadcrumb_content
            ul
              li(@click="goto('home')")
                a(href='javascript: void(0)') 首頁
              li(@click="goto('product_list')")
                a(href='javascript: void(0)') 所有商品
              li 所有床墊
          .row
            .col-lg-3.col-md-12
              h2.selected_item_h2.text-center(v-if="selected_item") {{ selected_item.name }}
              multiselect.w-100.mobile(
                v-model="selected_item"
                :options="widget_list_obj"
                :multiple="false"
                :allowEmpty="false"
                group-values="sub"
                group-label="name"
                :group-select="false"
                placeholder=""
                track-by="id"
                label="name"
                tagPlaceholder=""
                selectedLabel=""
                selectLabel=""
                selectGroupLabel=""
                deselectLabel=""
                @select="selectSubCategoryBySelect"
              )
                template(v-slot:noResult)
                  span 查無選項
              //- li(v-if="selected_item") {{ selected_item.name }}
              // sidebar widget start
              aside.sidebar_widget.pc
                .widget_inner
                  .widget_list.widget_categories
                    h2 所有床墊
                    ul
                      li.widget_sub_categories(
                        v-for="(item, index) in widget_list_obj"
                        @click="toggleCategory(item.id)"
                      )
                        a(href='javascript:void(0)') {{ item.name }}
                        ul.widget_dropdown_categories.collapse(
                          :id="item.id"
                          :class="{'show': checkShow(item.id)}"
                        )
                          li(v-for="(item2, index2) in item.sub")
                            a(
                              :href="item2.link"
                              :class="{'selected': selected_sub_cat == item2.id}"
                              @click="selectSubCategory($event, item2)"
                            ) {{ item2.name }}

            swiper-part(:item="item")
            brief-desc(:item="item")

          .row
            .col-lg-3.col-md-12
            tab-intro(:item="item")

          .row
            .col-lg-3.col-md-12
            good-comment(:item="item")

          .row
            .col-lg-3.col-md-12
            common-qa(:item="item")

</template>

<script>
import Multiselect from 'vue-multiselect'

import swiperPart from '@/components/product_detail/swiperPart.vue'
import briefDesc from '@/components/product_detail/briefDesc.vue'
import tabIntro from '@/components/product_detail/tabIntro.vue'
import goodComment from '@/components/product_detail/goodComment.vue'
import commonQa from '@/components/product_detail/commonQa.vue'

export default {
  name: 'ProductDetail',
  components: {
    Multiselect,

    swiperPart,
    briefDesc,
    tabIntro,
    goodComment,
    commonQa,
  },
  data() {
    return {
      show_category_list: [],
      widget_list_obj: [
        {
          name: '床墊',
          id: 'bed',
          sub: [
            {
              name: '所有床墊',
              link: 'javascript: void(0)',
              id: 'all',
            },
            {
              name: '家庭用床墊',
              link: 'javascript: void(0)',
              id: 'family',
            },
            {
              name: '租屋用床墊',
              link: 'javascript: void(0)',
              id: 'rent',
            },
            {
              name: '嫁妝用床墊',
              link: 'javascript: void(0)',
              id: 'marriage',
            },
          ],
        },
        {
          name: '床架/床頭櫃',
          id: 'bedFrame',
          sub: [
            {
              name: '所有床墊',
              link: 'javascript: void(0)',
              id: 'all2',
            },
            {
              name: '家庭用床墊',
              link: 'javascript: void(0)',
              id: 'family2',
            },
          ],
        },
        {
          name: '其他配件',
          id: 'others',
          sub: [
            {
              name: '所有床墊',
              link: 'javascript: void(0)',
              id: 'all3',
            },
            {
              name: '家庭用床墊',
              link: 'javascript: void(0)',
              id: 'family3',
            },
          ],
        },
      ],
      selected_sub_cat: '',
      selected_item: null,
      item: {
        img: [
          '/assets/images/product/item1.jpg',
          '/assets/images/product/item2.jpg',
          '/assets/images/product/item3.jpg',
          '/assets/images/product/item4.jpg',
          '/assets/images/product/item5.jpg',
          '/assets/images/product/item6.jpg',
        ],
        name: '波浪舒眠床墊',
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
          {size: '單人3*6.2尺(91*188cm)', ori_price: 7800, discount_price: 5800}, 
          {size: '單人加大3.5*6.2尺(106*188cm)', ori_price: 7980, discount_price: 5980 },
          {size: '標準雙人5*6.2尺(152*188cm)', ori_price: 10800, discount_price: 8800 },
          {size: '雙人加大6*6.2尺(182*188cm)', ori_price: 14800, discount_price: 13800 },
          {size: 'King size6*7尺(182*212cm)', ori_price: 18800, discount_price: 16800 },
        ],
        hardness_degree: 6,
        tab_content: [
          {
            name: 'feature',
            tab: '商品特色',
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
            name: 'size',
            tab: '床墊尺寸',
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
  },
  methods: {
    checkShow(id) {
      return this.show_category_list.includes(id)
    },
    toggleCategory(id) {
      if (this.show_category_list.includes(id)) {
        this.show_category_list = this.show_category_list.filter(function (
          item
        ) {
          return item !== id
        })
      } else {
        this.show_category_list.push(id)
      }
    },
    selectSubCategory(event, item) {
      event.stopPropagation() // 阻止事件冒泡到父元素
      this.selected_sub_cat = item.id
      this.selected_item = item
    },
    selectSubCategoryBySelect(item) {
      this.selected_sub_cat = item.id
    },
    addComma(num) {
      return String(num).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ',')
    },
    viewMore(item) {
      this.$router.push({
        name: 'product_detail',
        params: {
          product_id: item.product_id,
        },
      })
    },
    goto(page, hash = null) {
      this.$router.push({
        name: page,
        hash: hash,
      });
    },
  },
  mounted() {
    this.show_category_list.push(this.widget_list_obj[0].id)
    this.selected_sub_cat = this.widget_list_obj[0].sub[0].id
    this.selected_item = this.widget_list_obj[0].sub[0]
  },
}
</script>
<style>
@import 'vue-multiselect/dist/vue-multiselect.css';
</style>

<style scoped>
@import '/assets/scss/common.scss';
@import '/assets/css/product_temp/style.css';
@import '/assets/scss/product/product.scss';
@import '/assets/scss/product/product_list.scss';
</style>
