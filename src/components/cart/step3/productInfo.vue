<template lang="pug">
.step3_product_info
  .left
    h5 訂單明細
    .cart_item_col_name
      h6.item 品項
      h6.price 價錢
      h6.amount 數量
      h6.total 總額
    .cart_item_div(v-for="(item, index) in cart_items")
      .item
        img.item_img(:src="getImagePath(item.img)")
        .content
          h4 {{ item.title }}
          p {{ item.desc }}
        
      .price.d-flex.align-items-center NT${{ addComma(item.price) }}
      .amount.d-flex.align-items-center x{{ item.amount }}
      .total.d-flex.align-items-center
        p NT${{ addComma(item.amount * item.price) }}
    .sum_div  
      .price
        p 小計
        p.bold NT${{ addComma(cart_price_total) }}
      .delivery_fee
        p 運費
        p.bold {{ delivery_fee ? delivery_fee : '免費' }}
    .divider
    .sum_div  
      .total
        p.bold 總計
        p.price_red.bold NT${{ addComma(cart_price_total + delivery_fee) }}

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
      delivery_fee: 0,
    }
  },
  computed: {
    ...mapState(['clickShowCart', 'showCartAside', 'cart_items', 'cart_price_total']),
  },
  methods: {
    ...mapActions(['toggleCart', 'countItem', 'removeItem', 'validateAmount', 'changeCartItemAmount', 'emptyCart']),
    getImagePath(img) {
      return require(`@/${img}`);
    },
    addComma(num) {
      return String(num).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    },
  },

  mounted() {
  },

}
</script>

<style scoped>
@import '@/assets/scss/common.scss';
@import '@/assets/scss/cart/cart.scss';
@import '@/assets/scss/cart/step3/product_info.scss';
</style>
