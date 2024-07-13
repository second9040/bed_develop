<template lang="pug">
.div
  .cart_item_col_name
    h4.item 品項
    h4.price 價錢
    h4.amount 數量
    h4.total 總額
  .cart_item_div(v-for="(item, index) in cart_items")
    .item
      img.item_img(:src="getImagePath(item.img)")
      .content
        h4 {{ item.title }}
        p {{ item.desc }}
      
    .price.d-flex.align-items-center NT${{ addComma(item.price) }}
    .amount.d-flex.align-items-center
      .number-input-container
        input.number-input(
          type="number" 
          min=1
          max=999999
          v-model="item.amount"
          @input="validateAmount(index)"
        )
        span.increment(
          @click="changeCartItemAmount({action: 1, index: index})"
          :class="{'disabled': item.amount == 99}"
        )
          i.bi.bi-chevron-up
        span.decrement(
          @click="changeCartItemAmount({action: -1, index: index})"
          :class="{'disabled': item.amount == 1}"
        )
          i.bi.bi-chevron-down
    .total.d-flex.align-items-center
      p NT${{ addComma(item.amount * item.price) }}
      .trash_can
        img(
          src="../../../assets/images/trash_can.png"
          @click="removeItem(index)"
        )
  .action_div
    button.emptyCart.button.btn.btn-outline-primary(
      @click="emptyCart"
    ) 清空購物車
    button.goBack.button.btn.btn-primary(@click="goBack") 繼續購物

</template>

<script>
const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace("@", "../../..");
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};
import { mapState, mapActions } from 'vuex'

export default {
  name: 'product_info',
  components: {
  },
  data() {
    return {

    }
  },
  computed: {
    ...mapState(['clickShowCart', 'showCartAside', 'cart_items']),
  },
  methods: {
    ...mapActions(['toggleCart', 'countItem', 'removeItem', 'validateAmount', 'changeCartItemAmount', 'emptyCart']),
    getImagePath(img) {
      return require(`@/${img}`);
    },
    addComma(num) {
      return String(num).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    },
    goBack() {
      this.$router.go(-1);
    },
  },

  mounted() {
  },

}
</script>

<style scoped>
@import '@/assets/scss/common.scss';
@import '@/assets/scss/cart/cart.scss';
@import '@/assets/scss/cart/step2/product_info.scss';
</style>
