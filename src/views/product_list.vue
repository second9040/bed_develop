<template lang="pug">
  #product_list_page.product_list_page.other_page
    .page-header
      index-header
    .container
        
      // offcanvas menu area start
      .body_overlay
      .offcanvas_menu
        .container
          .row
            .col-12
              .offcanvas_menu_wrapper
                .canvas_close
                  a(href='javascript:void(0)')
                    i.ion-android-close
                #menu.text-left
                  ul.offcanvas_main_menu
                    li.menu-item-has-children.active
                      a(href='#') Home
                    li.menu-item-has-children
                      a(href='shop.html') Shop
                    li.menu-item-has-children
                      a(href='product-details.html')  Product Details
                    li
                      a(href='#') sale
                    li.menu-item-has-children
                      a(href='#') pages 
                      ul.sub-menu
                        li
                          a(href='cart.html') cart
                        li
                          a(href='checkout.html') Checkout
                    li.menu-item-has-children
                      a(href='#') blog
                      ul.sub-menu
                        li
                          a(href='blog.html') blog
                        li
                          a(href='blog-details.html') blog details
                    li
                      a(href='#') buy
      // offcanvas menu area end
      // mini cart
      .mini_cart
        .cart_gallery
          .cart_close
            .cart_text
              h3 cart
            .mini_cart_close
              a(href='javascript:void(0)')
                i.icon-close.icons
          .cart_item
            .cart_img
              a(href='#')
                img(src='/public/images/product_temp/product/product1.jpg' alt='')
            .cart_info
              a(href='#') Primis In Faucibus
              p
                | 1 x 
                span  $65.00 
            .cart_remove
              a(href='#')
                i.icon-close.icons
          .cart_item
            .cart_img
              a(href='#')
                img(src='/public/images/product_temp/product/product2.jpg' alt='')
            .cart_info
              a(href='#') Letraset Sheets
              p
                | 1 x 
                span  $60.00 
            .cart_remove
              a(href='#')
                i.icon-close.icons
        .mini_cart_table
          .cart_table_border
            .cart_total
              span Sub total:
              span.price $125.00
            .cart_total.mt-10
              span total:
              span.price $125.00
        .mini_cart_footer
          .cart_button
            a(href='cart.html')
              i.fa.fa-shopping-cart
              |  View cart
          .cart_button
            a(href='checkout.html')
              i.fa.fa-sign-in
              |  Checkout
      // mini cart end
      // header area start

      // shop  area start
      //- .shop_section.shop_reverse
      .main_section
        .container
          .row
            .col-lg-3.col-md-12
              .breadcrumb_content
                ul
                  li
                    a(href='/') 首頁
                  li 所有商品
                  li 所有床墊
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
              .shop_banner.d-flex.align-items-center
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
      // newsletter section start
    .page-footer
      index-footer
    
    // Scroll Top
    a#scroll-top.scroll-top.d-flex.align-items-center.justify-content-center(href="#")
      i.bi.bi-chevron-up
    // modal area start
    #modal_box.modal.fade(tabindex='-1' role='dialog' aria-hidden='true')
        .modal-dialog.modal-dialog-centered(role='document')
          .modal-content
            button.close(type='button' data-dismiss='modal' aria-label='Close')
              span(aria-hidden='true')
                i.ion-android-close
            .modal_body
              .container
                .row
                  .col-lg-6.col-md-6.col-sm-12
                    .modal_zoom_gallery
                      .product_zoom_thumb
                        img(src='/public/images/product_temp/product/big-product/product1.png' alt='')
                  .col-lg-6.col-md-6.col-sm-12
                    .modal_right
                      .modal_title.mb-10
                        h2 Donec Ac Tempus
                      .modal_price.mb-10
                        span.new_price $64.99
                        span.old_price $78.99
                      .modal_description.mb-15
                        p
                          | Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui,
                      .variants_selects
                        .variants_size
                          h2 size
                          select.select_option
                            option(selected='' value='1') s
                            option(value='1') m
                            option(value='1') l
                            option(value='1') xl
                            option(value='1') xxl
                        .variants_color
                          h2 color
                          select.select_option
                            option(selected='' value='1') purple
                            option(value='1') violet
                            option(value='1') black
                            option(value='1') pink
                            option(value='1') orange
                        .modal_add_to_cart
                          form(action='#')
                            input(min='1' max='100' step='2' value='1' type='number')
                            button(type='submit') add to cart
                      .modal_social
                        h2 Share this product
                        ul
                          li.facebook
                            a(href='#')
                              i.fa.fa-facebook
                          li.twitter
                            a(href='#')
                              i.fa.fa-twitter
                          li.pinterest
                            a(href='#')
                              i.fa.fa-pinterest
                          li.google-plus
                            a(href='#')
                              i.fa.fa-google-plus
                          li.linkedin
                            a(href='#')
                              i.fa.fa-linkedin

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

import indexHeader from '@/components/index/indexHeader.vue'
import indexFooter from '@/components/index/indexFooter.vue'

export default {
  name: 'product_list',
  components: {
    indexHeader,
    indexFooter,

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
          img: 'assets/images/index/hot_item_1.png',
          name: '波浪舒眠床墊',
          price: 7800,
          desc: '適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...',
          hardness_degree: 2,
        },
        {
          img: 'assets/images/index/hot_item_1.png',
          name: '波浪舒眠床墊',
          price: 7800,
          desc: '適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...',
          hardness_degree: 4,
        },
        {
          img: 'assets/images/index/hot_item_1.png',
          name: '波浪舒眠床墊',
          price: 7800,
          desc: '適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...',
          hardness_degree: 3,
        },
        {
          img: 'assets/images/index/hot_item_1.png',
          name: '波浪舒眠床墊',
          price: 7800,
          desc: '適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...',
          hardness_degree: 4,
        },
        {
          img: 'assets/images/index/hot_item_1.png',
          name: '波浪舒眠床墊',
          price: 7800,
          desc: '適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...',
          hardness_degree: 3,
        },
        {
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
    viewMore(item) {},
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
@import '@/assets/scss/product/product.scss';
@import '@/assets/scss/product/product_list.scss';
@import '@/assets/css/product_temp/style.css';
</style>
