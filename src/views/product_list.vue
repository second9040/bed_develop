<template lang="pug">
  #product_list_page.product_list_page.other_page
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

            .col-lg-9.col-md-12
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

              // shop wrapper start
              .shop_banner
                img(src="../assets/images/product/list/banner.jpg" alt="product_banner")
              // shop toolbar end
              .row.shop_wrapper
                .single_product(v-for="item in products_obj")
                  img.hot_item_img(:src='getImagePath(item.img)'  :alt="item.name")
                  .px-3.pb-4
                    h4 {{ item.name }}
                    p.price NT$ {{ addComma(item.price) }} 起
                    p {{ item.desc }}
                    .hardness_degree_div.d-flex
                      .text_circle 軟
                      .mx-1.d-flex.align-items-center
                        .degree_item(
                          v-for="count in 7"
                          :class="{ 'active': item.hardness_degree == count }"
                        )
                        //- p.m-0 硬度: {{ item.hardness_degree }}
                      .text_circle 硬

                    button.button.btn.btn-outline-primary(type="button" @click="viewMore(item)") 了解更多
              
              #pagination.pagination_style.pagination.justify-content-center
                ul.d-flex
                  li
                    a(href='#')  &lt;&lt; 
                  li
                    a(href='#') 1
                  li
                    a.current(href='#') 2
                  li
                    a(href='#') 3
                  li
                    a(href='#') 4
                  li
                    a(href='#') 5
                  li
                    a(href='#') &gt;&gt;
              // shop toolbar end
              // shop wrapper end
      // shop  area end

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

import $ from 'jquery'
import Multiselect from 'vue-multiselect'

export default {
  name: 'product_list',
  components: {
    Multiselect,
  },
  data() {
    return {
      screenWidth: 0,
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
      products_obj: [
        {
          product_id: 1,
          img: 'assets/images/index/hot_item_1.png',
          name: '波浪舒眠床墊',
          price: 7800,
          desc: '適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...',
          hardness_degree: 2,
        },
        {
          product_id: 2,
          img: 'assets/images/index/hot_item_1.png',
          name: '波浪舒眠床墊',
          price: 7800,
          desc: '適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...',
          hardness_degree: 4,
        },
        {
          product_id: 3,
          img: 'assets/images/index/hot_item_1.png',
          name: '波浪舒眠床墊',
          price: 7800,
          desc: '適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...',
          hardness_degree: 3,
        },
        {
          product_id: 4,
          img: 'assets/images/index/hot_item_1.png',
          name: '波浪舒眠床墊',
          price: 7800,
          desc: '適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...',
          hardness_degree: 4,
        },
        {
          product_id: 5,
          img: 'assets/images/index/hot_item_1.png',
          name: '波浪舒眠床墊',
          price: 7800,
          desc: '適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...',
          hardness_degree: 3,
        },
        {
          product_id: 6,
          img: 'assets/images/index/hot_item_1.png',
          name: '波浪舒眠床墊',
          price: 75800,
          desc: '適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...',
          hardness_degree: 2,
        },
      ],
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
    getImagePath(img) {
      return require(`@/${img}`)
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
@import '@/assets/scss/common.scss';
@import '@/assets/scss/product/product.scss';
@import '@/assets/scss/product/product_list.scss';
@import '@/assets/css/product_temp/style.css';
</style>
