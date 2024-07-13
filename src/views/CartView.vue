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
                    .step.step3(:class="{'active': step == 3}")
                  .step-labels.position-relative
                    .label.label1.done 購物車
                    .label.label2.active 填寫資訊
                    .label.label3 訂單完成

            .step2(v-if="step == 2")
              product-info
              order-info(@place-order="placeOrder")
            .step3(v-else)
              .step3_thanks 感謝訂購，我們將會有專人在3個工作天內與您聯繫，確認訂購資料和細節，也可以先加入我們的LINE，與客服人員聯繫。
              .info_container.d-flex
                check-product-info
                check-order-info
              .action_div
                button.btn-chatbed.button.btn.btn-outline-primary(
                  @click="emptyCart"
                ) LINE聊聊
                button.goBack.button.btn.btn-primary(@click="goBack") 繼續逛逛

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

import checkProductInfo from "@/components/cart/step3/productInfo.vue";
import checkOrderInfo from "@/components/cart/step3/orderInfo.vue";

export default {
  name: "cart_info",
  components: {
    indexHeader,
    indexFooter,

    cartAside,

    productInfo,
    orderInfo,
    checkProductInfo,
    checkOrderInfo,
  },
  data() {
    return {
      step: 2,
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
    placeOrder() {
      this.step = 3;
      window.scrollTo({
        top: 0
      })
    },
    goBack() {
      this.$router.go(-1);
      window.scrollTo({
        top: 0
      })
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
<style lang="scss" scoped>
.step3 {
  .action_div {
      display: flex;
      justify-content: center;
      margin: 0px auto;
      width: 60%;
  
      @media (max-width: 767px) {
        display: block;
      }
  
      button {
        width: 300px;
        border-radius: 25px;
        transition: .3s;
  
        &:hover {
          color: #fff;
          border: solid 1px;
        }
  
        @media (max-width: 767px) {
          width: 100%;
          margin-bottom: 20px;
          padding: 10px;
        }
      }
  
      .btn-chatbed {
        cursor: pointer;
        color: #fff;
        background: #06C755;
        border-color: #06C755 !important;
        margin-right: 30px;
  
        &:hover,
        &:focus:hover {
          background: #00FF68 !important;
          border-color: #00FF68 !important;
        }
  
        &.mobile {
          display: none;
        }
  
        @media (max-width: 1199px) {
          &.pc {
            display: none;
          }
  
          &.mobile {
            display: block;
            width: 100%;
            text-align: center;
  
            font-size: 14px;
            padding: 10px;
            margin: 0;
            transition: 0.3s;
  
          }
        }
  
        & .line_icon {
          width: 20px;
          margin-top: -3px;
          margin-right: 5px;
        }
      }
  
      .goBack {
        border: solid 1px var(--color3-green);
  
        &:hover {
          opacity: 0.8;
          background-color: var(--color2-green);
        }
  
      }
    }
}


</style>