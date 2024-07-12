<template lang="pug">
.div 
  .left.col-lg-9.col-md-12
    h4.order_info 訂購資訊
  .right.col-lg-3.col-md-12
  

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
  name: 'order_info',
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
  },

  mounted() {
  },

}
</script>

<style scoped>
@import '@/assets/scss/common.scss';
@import '@/assets/scss/cart/cart.scss';
@import '@/assets/scss/cart/step2/order_info.scss';
</style>
