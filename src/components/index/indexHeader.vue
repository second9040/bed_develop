<template lang="pug">
  header#header.header.fixed-top
    .container.d-flex.align-items-center
      a.logo(@click="goto('home')")
        img.logo_header(src="/assets/images/logo_header.png")

      nav#navmenu.navmenu
        ul
          li(@click="goto('product_list')")
            a(href="javascript: void(0)") 床墊
          li(@click="goto('product_list')")
            a(href="javascript: void(0)#") 床架/床頭櫃
          li(@click="goto('product_list')")
            a(href="javascript: void(0)") 其他配件
          li(@click="goto('about')")
            a(href="javascript: void(0)") 關於我們
          li(@click="goto('latestDiscount')")
            a(href="javascript: void(0)") 限時優惠
          li(@click="goto('bed_knowledge')")
            a(href="javascript: void(0)") 床墊知識
          li(@click="goto('home', '#good_comment')")
            a(href="javascript: void(0)") 好評分享
          li(@click="goto('experience_site')")
            a(href="javascript: void(0)") 體驗據點
        i.mobile-nav-toggle.d-xl-none.bi.bi-list
        .cart_div.mobile(@click="showCart(1)")
          img.cart_icon(src="/assets/images/cart_icon.png")
          .cart_items_count(
            :class="number_style()"
          ) {{ cart_item_total }}

      .d-flex.align-items-center.position-relative.justify-content-end
        .cart_div.pc(@click="showCart(1)")
          img.cart_icon(src="/assets/images/cart_icon.png")
          .cart_items_count(
            :class="number_style()"
          ) {{ cart_item_total }}

        a.btn-chatbed.pc(href="https://line.me/ti/p/~@121povpz" target="_blank")
          img.line_icon(src="/assets/images/line_icon.png")
          span 聊聊床墊
</template>
<script>
import { mapState, mapActions } from "vuex";

export default {
  name: "indexHeader",
  data() {
    return {};
  },
  computed: {
    ...mapState(["cart_item_total"]),
  },
  mounted() {
    this.checkSwiperLoaded();
    let check_url = location.href.includes("bed_develop") ? "/bed_develop" : "";
    this.loadExternalScript(check_url + "/js/index/bs_main.js").catch((err) => {
      console.error("Failed to load external script:", err);
    });
  },
  methods: {
    ...mapActions(["toggleCart"]),
    loadExternalScript(src) {
      return new Promise((resolve, reject) => {
        const script = document.createElement("script");
        script.src = src;
        script.onload = () => resolve();
        script.onerror = () => reject(new Error(`Failed to load script ${src}`));
        document.head.appendChild(script);
      });
    },
    showCart(action) {
      this.toggleCart(action);
    },
    checkSwiperLoaded() {
      this.$emit("check-swiper-loaded");
    },
    number_style() {
      let count = this.cart_item_total;
      if (count > 9 && count <= 99) return "last_than_99";
      if (count > 99 && count <= 999) return "last_than_999";
      if (count > 999) return "last_than_9999";
    },
    goto(page, hash = null) {
      this.$router.push({
        name: page,
        hash: hash
      });
    },
  },
};
</script>

<style>
@import "/assets/scss/index_header.scss";
</style>
