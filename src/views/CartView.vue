<template lang="pug">
  #cartView.cartView.other_page
    .page-header
      index-header
    .container
      .main_section
        .container
          .breadcrumb_content
            ul
              li
                a(href='/') 首頁
              li 購物車
          .row
            .col-md-12
              h2.page_title 購物車
              .progress_bar_div
                .progress-container
                  .progress
                    .progress-bar
                  .step-container
                    .step.step1.done
                    .step.step2.active
                    .step.step3
                  .step-labels.position-relative
                    .label.label1.done 購物車
                    .label.label2.active 填寫資訊
                    .label.label3 訂單完成

            product-info
            order-info
          


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

import productInfo from "@/components/cart/step2/productInfo.vue";
import orderInfo from "@/components/cart/step2/orderInfo.vue";

export default {
  name: "cart_info",
  components: {
    indexHeader,
    indexFooter,

    cartAside,

    productInfo,
    orderInfo,
  },
  data() {
    return {};
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
    loadExternalScript(src) {
      return new Promise((resolve, reject) => {
        const script = document.createElement("script");
        script.src = src;
        script.onload = () => resolve();
        script.onerror = () => reject(new Error(`Failed to load script ${src}`));
        document.head.appendChild(script);
      });
    },
  },
  mounted() {
  },
};
</script>

<style scoped>
@import "@/assets/scss/common.scss";
@import "@/assets/scss/cart/cart.scss";
</style>
