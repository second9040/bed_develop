<template lang="pug">
  #latestDiscount.latestDiscount.other_page
    .page-header
      index-header
    .container
      .main_section
        .container
          .breadcrumb_content
            ul
              li
                a(href='/') 首頁
              li 即時優惠
          .row
            .col-md-12
              h2.page_title 即時優惠

              .discount_content_div
                .discount_item(
                  v-for="(discount, index) in discount_list"
                  @click="showDetail(discount)"
                )
                  .img_container
                    img(:src='getImagePath(discount.img)' :alt='discount.title')
                  .text_div
                    h4 {{ discount.title }}
                    p.desc(v-html="truncateText(discount.desc)")

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
    .page-footer
      index-footer    
    cart-aside

    // Scroll Top
    a#scroll-top.scroll-top.d-flex.align-items-center.justify-content-center(href="#")
      i.bi.bi-chevron-up
</template>

<script>
import { mapState, mapActions } from "vuex";

import indexHeader from "@/components/index/indexHeader.vue";
import indexFooter from "@/components/index/indexFooter.vue";
import cartAside from "@/components/cartAside.vue";

const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace("@", "..");
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};

export default {
  name: "latestDiscount",
  components: {
    indexHeader,
    indexFooter,

    cartAside,
  },
  data() {
    return {
      discount_obj: null,
    };
  },
  computed: {
    ...mapState(["clickShowCart", "showCartAside", "cart_items"]),
  },
  methods: {
    ...mapActions([
      "toggleCart",
      "countItem",
      "removeItem",
      "validateAmount",
      "changeCartItemAmount",
      "emptyCart",
    ]),
    getImagePath(img) {
      console.log(img)
      return require(`@/${img}`);
    },
    truncateText(text) {
      if (text.length > 60) {
        return text.slice(0, 60) + '...more';
      }
      return text;
    },
    showDetail(obj) {
      this.$router.push({
        name: 'discount_detail',
        params: {
          discount_id: obj.discount_id,
        },
        query: {
          discount_obj: JSON.stringify(obj)
        }
      })
    },
  },
  mounted() {
    if (history.state.discount_obj) {
      this.discount_obj = JSON.parse(history.state.discount_obj)
    } else {
      this.$router.push({
        name: 'latestDiscount'
      })
    }
  },
};
</script>

<style scoped>
@import "@/assets/scss/common.scss";
@import "@/assets/scss/latestDiscount/latestDiscount.scss";
</style>