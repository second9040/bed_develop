<template lang="pug">
  #latestDiscount.latestDiscount.other_page
    .page-header
      index-header
    .container(v-if="discount_obj")
      .main_section
        .container
          .breadcrumb_content
            ul
              li
                a(href='/') 首頁
              li
                a(href='/latestDiscount') 即時優惠
              li {{ discount_obj.title }}
          .row
            .col-md-12
              h2.page_title {{ discount_obj.title }}
              .detail_div 
                .left
                  .img_container 
                    img(:src="getImagePath(discount_obj.img)")
                .right
                  .desc(v-html="transformURL(discount_obj.desc)")
          
              button.buyNow.button.btn.btn-primary(
                type="button" 
                @click="buyNow(discount_obj)"
              ) 馬上搶購
                  

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
      console.log(img);
      return require(`@/${img}`);
    },
    transformURL(text) {
      const urlRegex = /https?:\/\/[^\s]+/g;
      const textWithLinks = text.replace(urlRegex, function (url) {
        return `<a href="${url}" target="_blank" style="color: #30526b; text-decoration: underline;">${url}</a>`;
      });
      return textWithLinks;
    },
    buyNow(obj) {

    },
  },
  mounted() {
    if (history.state.discount_obj) {
      this.discount_obj = JSON.parse(history.state.discount_obj);
    } else {
      this.$router.push({
        name: "latestDiscount",
      });
    }
  },
};
</script>

<style scoped>
@import "@/assets/scss/common.scss";
@import "@/assets/scss/latestDiscount/latestDiscount.scss";
</style>
