<template lang="pug">
  #product_detail.product_detail.other_page
    .page-header
      index-header
    .container
      // shop  area start
      //- .shop_section.shop_reverse
      .main_section
        .container
          .breadcrumb_content
            ul
              li
                a(href='/') 首頁
              li 所有商品
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

    .page-footer
      index-footer    
    cart-view
    
    // Scroll Top
    a#scroll-top.scroll-top.d-flex.align-items-center.justify-content-center(href="#")
      i.bi.bi-chevron-up

</template>

<script>
const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace('@', '..')
    return new URL(handlePath, import.meta.url).href
  } catch (err) {
    console.warn(err)
  }
}

import Multiselect from 'vue-multiselect'

import indexHeader from '@/components/index/indexHeader.vue'
import indexFooter from '@/components/index/indexFooter.vue'

import cartView from '@/components/cartView.vue'

import swiperPart from '@/components/product_detail/swiperPart.vue'
import briefDesc from '@/components/product_detail/briefDesc.vue'
import tabIntro from '@/components/product_detail/tabIntro.vue'
import goodComment from '@/components/product_detail/goodComment.vue'

export default {
  name: 'ProductDetail',
  components: {
    indexHeader,
    indexFooter,

    cartView,

    Multiselect,

    swiperPart,
    briefDesc,
    tabIntro,
    goodComment,
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
          'assets/images/product/item1.jpg',
          'assets/images/product/item2.jpg',
          'assets/images/product/item1.jpg',
          'assets/images/product/item2.jpg',
          'assets/images/product/item1.jpg',
          'assets/images/product/item2.jpg',
        ],
        name: '波浪舒眠床墊',
        price: 11899,
        desc: [
          '太空科技調節溫度，保持身體恆溫，減少睡眠中48%聚熱',
          '德國KIKOO Tech Pro® 透氣科技，涼爽舒適 12 個小時',
          '9 區設計，能完美貼合支撐身體曲線，舒緩腰痠背痛',
          '涼感舒適不悶熱，最適合台灣氣候',
          '吸震抗干擾，淺眠不被翻身打擾',
          'SGS CertiPUR-US等多重認證，無毒無甲醛',
        ],
        size_obj: [
          '106 x 188 x 25 cm',
          '152 x 188 x 25 cm',
          '182 x 188 x 25 cm',
          '182 x 212 x 25 cm',
        ],
        hardness_degree: 4,
        tab_content: [
          {
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
            img: 'assets/images/product/item2.jpg',
          },
          {
            tab: '床墊結構',
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
            img: 'assets/images/product/item1.jpg',
          },
          {
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
            img: 'assets/images/product/item2.jpg',
          },
        ],
        deliverService: {
          img: [
            'assets/images/product/item3.jpg',
            'assets/images/product/item3.jpg',
            'assets/images/product/item3.jpg',
          ],
          desc: '床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。',
        },
      },
    }
  },
  methods: {
    loadExternalScript(src) {
      return new Promise((resolve, reject) => {
        const script = document.createElement('script')
        script.src = src
        script.onload = () => resolve()
        script.onerror = () => reject(new Error(`Failed to load script ${src}`))
        document.head.appendChild(script)
      })
    },
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
    getImagePath(img) {
      return require(`@/${img}`)
    },
    addComma(num) {
      return String(num).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ',')
    },
    viewMore(item) {
      console.log(item)
      this.$router.push({
        name: 'product_detail',
        params: {
          product_id: item.product_id,
        },
      })
    },
  },
  mounted() {
    this.loadExternalScript('/public/js/index/bs_main.js').catch((err) => {
      console.error('Failed to load external script:', err)
    })

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
@import '@/assets/scss/common.scss';
@import '@/assets/css/product_temp/style.css';
@import '@/assets/scss/product/product.scss';
@import '@/assets/scss/product/product_list.scss';
</style>
