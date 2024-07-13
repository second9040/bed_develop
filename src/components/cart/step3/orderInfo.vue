<template lang="pug">
div.order_info_container
  .step3_order_info
    h5.card-title 訂單資訊
    .order_info
      .list
        h6 訂單時間
        span 2024 / 06 / 17 15:25
      .list
        h6 訂購人
        span 柴御品
      .list
        h6 聯絡電話
        span 04-23201861
      .list
        h6 地址
        span 台中市北區忠明路234號
      .list
        h6 運送方式
        span 【中彰投】宅配到府免運
      .list
        h6 付款方式
        span 銀行轉帳
      .list
        h6 訂單金額
        span {{ cart_price_total }}
      .bank_info
        h6 製床所銀行匯款資訊
        div
          p 銀行：808玉山銀行
          p 帳號：1366979011502
      .list
        h6 備註
        span 請電聯，床墊送到時需從後門進入
    

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
import Multiselect from 'vue-multiselect';

export default {
  name: 'order_info',
  components: {
    Multiselect,
  },
  data() {
    return {
      selectedCity: null,
      selectedDelivery: '[中彰投] 宅配到府免運',
      selectedPayment: null,
      deliveryOptions: ['[中彰投] 宅配到府免運'],
      paymentOptions: ['銀行轉帳', '貨到付款', '信用卡'],
      delivery_fee: 0,

    }
  },
  computed: {
    ...mapState(['clickShowCart', 'showCartAside', 'cart_items', 'tw_city_name', 'cart_price_total']),
  },
  methods: {
    ...mapActions(['toggleCart', 'countItem', 'removeItem', 'validateAmount', 'changeCartItemAmount', 'emptyCart']),
    getImagePath(img) {
      return require(`@/${img}`);
    },
    addComma(num) {
      return String(num).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    },
    placeOrder() {
      this.$emit('place-order');
    },
  },

  mounted() {
    // let twzipcode = new TWzipcode();
  },

}
</script>

<style>
@import 'vue-multiselect/dist/vue-multiselect.css';
</style>
<style scoped>
@import '@/assets/scss/common.scss';
@import '@/assets/scss/cart/cart.scss';
@import '@/assets/scss/cart/step3/order_info.scss';
</style>
<style lang="scss">
.cart_order_info {
  .multiselect {
    &__tags {
      border-radius: 0;
    }
    &__single {
      padding-left: 15px;
      font-size: 14px;
    }
    &__input {
      font-size: 14px;
      margin-bottom: 0;
      padding-left: 15px;
      vertical-align: center;
    }
    &__placeholder {
      color: var(--color1-blue);
      margin-bottom: 0;
      padding-top: 0;
      font-size: 14px;
      padding-left: 15px;
    }
    &__select {
      height: 20px;
      width: 20px;
      padding: 0;
      top: 15px;
      right: 5px;
    }
    &__content-wrapper {
      li span {
        padding-left: 12px;
      }
    }
    &--active {
      & .multiselect__select {
        top: 10px;
        right: 13px;
      }
    }
  }
}
  
</style>