<template lang="pug">
div.container.cart_order_info
  .row
    .left.col-lg-8.col-md-12
      h4.order_info 訂購資訊
      form
        .row
          .form-group.col-md-6
            h6(for="name") 姓名
            input#name.form-control(type="text" placeholder="")
          .form-group.col-md-6
            h6(for="phone") 聯絡電話
            input#phone.form-control(type="text" placeholder="")

        .row
          .form-group.col-md-3.col-6
            h6(for="zipcode") 郵遞區號
            input#zipcode.form-control(type="text" placeholder="")
          .form-group.col-md-3.col-6
            h6(for="city") 縣市
            .citySelect
              multiselect(
                v-model="selectedCity"
                :options="tw_city_name"
                :multiple="false"
                :allowEmpty="false"
                placeholder="選擇縣市"
                tagPlaceholder=""
                selectedLabel=""
                selectLabel=""
                selectGroupLabel=""
                deselectLabel=""
              )
            //- .twzipcode

          .form-group.col-md-6
            h6(for="address") 地址
            input#address.form-control(type="text" placeholder="")

        .form-group
          h6 運送方式
          .deliverySelect
            multiselect(
              v-model="selectedDelivery"
              :options="deliveryOptions"
              :multiple="false"
              :allowEmpty="false"
              placeholder="選擇運送方式"
              tagPlaceholder=""
              selectedLabel=""
              selectLabel=""
              selectGroupLabel=""
              deselectLabel=""
            )
            .comment
              span 若為中彰投以外地區，請透過官方Line（LINE ID：
              a(href="https://line.me/ti/p/~@121povpz" target="_blank") @121povpz
              span ）聊聊詢問
            .comment 線上客服服務時間：週一 ~ 週日 10:00 ~ 22:00

        .form-group.paymentSelect
          h6 付款方式
          multiselect(
            v-model="selectedPayment"
            :options="paymentOptions"
            placeholder="選擇付款方式"
          )
          p.comment 結帳後將會提供本店銀行帳號，後續會有客服人員致電聯繫，確認訂單細節及配送流程。
          p.comment 若是選擇其他方式付款，或是任何其他需求可先在備註欄填寫，後續客服人員會向您確認備註事項。

        .remark.form-group.col-md-12
          h6(for="remark") 備註
          textarea.form-control(rows="4" placeholder="")
    .right.col-lg-4.col-md-12
      .card
        .card-body
          h5.card-title 訂單資訊
          .price
            p 小計
            p.bold NT${{ addComma(cart_price_total) }}
          .delivery_fee
            p 運費
            p.bold {{ delivery_fee ? delivery_fee : '免費' }}
          .divider
          .total
            p 總計
            p.price_red.bold NT${{ addComma(cart_price_total + delivery_fee) }}
          button.btn.btn-primary.order(type="button" @click="placeOrder") 下單購買

  

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
@import '@/assets/scss/cart/step2/order_info.scss';
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