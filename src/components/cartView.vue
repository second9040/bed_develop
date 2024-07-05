<template lang="pug">
  #cartView.cartView(v-if="clickShowCart" )
    .modal-overlay(@click="showCart(0)")
    .modal-content(:class="{ 'is-visible': showCartView }")
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
              src="../assets/images/trash_can.png"
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
            img.cart_icon(src="../assets/images/cart_icon.png")
            | 前往結帳

</template>

<script>
const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace('@', '..')
    return new URL(handlePath, import.meta.url).href
  } catch (err) {
    console.warn(err)
  }
}

import { mapState, mapActions } from 'vuex'

export default {
  name: 'cartView',
  data() {
    return {
      waitAmoment: false,
      cart_price_total: 0,
      cart_items: [
        {
          img: 'assets/images/index/hot_item_1.png',
          title: '波浪舒眠床墊',
          desc: '單人加大 (106 x 188 x 25 cm) ',
          amount: 1,
          price: 11899,
        },
        {
          img: 'assets/images/index/hot_item_1.png',
          title:
            '波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊',
          desc: '單人加大 (106 x 188 x 25 cm) 單人加大單人加大單人加大單人加大',
          amount: 10,
          price: 11899,
        },
        {
          img: 'assets/images/index/hot_item_1.png',
          title: '波浪舒眠床墊3',
          desc: '單人加大 (106 x 188 x 25 cm) ',
          amount: 1,
          price: 11899,
        },
        {
          img: 'assets/images/index/hot_item_1.png',
          title:
            '4波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊',
          desc: '單人加大 (106 x 188 x 25 cm) 單人加大單人加大單人加大單人加大',
          amount: 10,
          price: 11899,
        },
        {
          img: 'assets/images/index/hot_item_1.png',
          title: '5波浪舒眠床墊',
          desc: '單人加大 (106 x 188 x 25 cm) ',
          amount: 1,
          price: 11899,
        },
        {
          img: 'assets/images/index/hot_item_1.png',
          title:
            '6波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊',
          desc: '單人加大 (106 x 188 x 25 cm) 單人加大單人加大單人加大單人加大',
          amount: 10,
          price: 11899,
        },
      ],
    }
  },
  computed: {
    ...mapState(['clickShowCart', 'showCartView']),
  },
  methods: {
    ...mapActions(['toggleCart', 'countItem']),
    showCart(action) {
      this.toggleCart(action)
    },
    addComma(num) {
      return String(num).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ',')
    },
    getImagePath(img) {
      return require(`@/${img}`)
    },
    removeItem(index) {
      this.countItem(-1 * this.cart_items[index].amount)
      this.cart_items.splice(index, 1)
    },
    go_to_pay() {
      console.log(1)
    },
  },
  mounted() {
    this.$store.commit('resetCart')
    this.cart_items.forEach((item) => {
      this.countItem(item.amount)
      this.cart_price_total += item.amount * item.price
    })
  },
}
</script>
<style></style>

<style scoped>
@import '@/assets/scss/cart.scss';
</style>
