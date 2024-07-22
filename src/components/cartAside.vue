<template lang="pug">
  #cartAside.cartAside(v-if="clickShowCart" )
    .modal-overlay(@click="showCart(0)")
    .modal-content(:class="{ 'is-visible': showCartAside }")
      .cart
        .cart-header
          h2 購物車
          button.close-btn(@click="showCart(0)") &times;
        .bottom-line
        .cart-body
          .cart-item.position-relative(v-for="(item, index) in cart_items")
            img.item_img(:src="getImagePath(item.img)")
            .content
              h6 {{ item.title }}
              p {{ item.desc }}
              .amount {{ item.amount }} x {{ addComma(item.price) }}
            img.trash_can(
              src="/assets/images/trash_can.png"
              @click="removeItem(index)"
            )

        .cart-footer
          .sum 
            p 小計:
            p NT$ {{ addComma(cart_price_total) }}
          button.button.btn.btn-primary.w-100(
            type="button"
            @click="go_to_pay"
          )
            img.cart_icon(src="/assets/images/cart_icon.png")
            | 前往結帳

</template>

<script>
const require = (imgPath) => {
  try {
    let check_url = location.href.includes("bed_develop") ? "/bed_develop/" : "/..";
    const handlePath = imgPath.replace("@", "../.." + check_url);
    return new URL(handlePath, import.meta.url).href
  } catch (err) {
    console.warn(err)
  }
}

import { mapState, mapActions } from 'vuex'

export default {
  name: 'cartAside',
  data() {
    return {
      waitAmoment: false,
    }
  },
  computed: {
    ...mapState(['clickShowCart', 'showCartAside', 'cart_items', 'cart_price_total']),
  },
  methods: {
    ...mapActions(['toggleCart', 'countItem', 'removeItem', 'updateCart']),
    showCart(action) {
      this.toggleCart(action)
    },
    addComma(num) {
      return String(num).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ',')
    },
    getImagePath(img) {
      return require(`@/${img}`)
    },
    go_to_pay() {
      // 配合動畫效果，這邊等待的數字要跟 cart_aside.scss 的 transition 數字一起改
      this.toggleCart(0)
      setTimeout(() => {
        this.$router.push({
          name: 'cart'
        })
      }, 700);
    },
  },
  mounted() {
    this.updateCart();
  },
}
</script>
<style></style>

<style scoped>
@import '/assets/scss/cart_aside.scss';
</style>
