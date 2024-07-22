<template lang="pug">
  #cartView.cartView.other_page
    .container
      .main_section
        .container
          .breadcrumb_content
            ul
              li(@click="goto('home')")
                a(href='javascript: void(0)') 首頁
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

</template>

<script>
import { mapState, mapActions } from "vuex";

import productInfo from "@/components/cart/step2/productInfo.vue";
import orderInfo from "@/components/cart/step2/orderInfo.vue";

import checkProductInfo from "@/components/cart/step3/productInfo.vue";
import checkOrderInfo from "@/components/cart/step3/orderInfo.vue";

export default {
  name: "cart_info",
  components: {
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
    goto(page, hash = null) {
      this.$router.push({
        name: page,
        hash: hash,
      });
    },
  },
  mounted() {
  },
};
</script>

<style scoped>
@import "/assets/scss/common.scss";
@import "/assets/scss/cart/cart.scss";
</style>