<template lang="pug">
  header#header.header.fixed-top
    .container.d-flex.align-items-center
      a.logo(href="/")
        img.logo_header(src="../../assets/images/logo_header.png")

      nav#navmenu.navmenu
        ul
          li(@click="goTo('product_list')")
            a(href="") 床墊
          li(@click="goTo('product_list')")
            a(href="") 床架/床頭櫃
          li(@click="goTo('product_list')")
            a(href="") 其他配件
          li(@click="goTo('about')")
            a(href="") 關於我們
          li(@click="goTo('latestDiscount')")
            a(href="") 限時優惠
          li(@click="goTo('bed_knowledge')")
            a(href="") 床墊知識
          li(@click="goTo('good_comment')")
            a(href="") 好評分享
          li(@click="goTo('experience_site')")
            a(href="") 體驗據點
        i.mobile-nav-toggle.d-xl-none.bi.bi-list
        .cart_div.mobile(@click="showCart(1)")
          img.cart_icon(src="../../assets/images/cart_icon.png")
          .cart_items_count(
            :class="number_style()"
          ) {{ cart_item_total }}

      .d-flex.align-items-center.position-relative.justify-content-end
        .cart_div.pc(@click="showCart(1)")
          img.cart_icon(src="../../assets/images/cart_icon.png")
          .cart_items_count(
            :class="number_style()"
          ) {{ cart_item_total }}

        a.btn-chatbed.pc(href="https://line.me/ti/p/~@121povpz" target="_blank")
          img.line_icon(src="../../assets/images/line_icon.png")
          span 聊聊床墊
</template>
<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/swiper-bundle.css";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

// import required modules
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import { mapState, mapActions } from 'vuex';

const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace("@", "../..");
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};

export default {
  name: "indexHeader",
  components: {
    Swiper,
    SwiperSlide,
  },
  props: {
    modules: {
      type: Array,
    },
    screenWidth: {
      type: Number,
    },
  },
  data() {
    return {
      cart_items_count: 0,
    };
  },
  computed: {
    ...mapState([
      'cart_item_total'
    ]),
  },
  mounted() {
    this.checkSwiperLoaded();
    this.loadExternalScript('/assets/js/index/bs_main.js')
      .catch(err => {
        console.error('Failed to load external script:', err);
      });
  },
  methods: {
    ...mapActions(['toggleCart']),
    loadExternalScript(src) {
      return new Promise((resolve, reject) => {
        const script = document.createElement('script');
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
    goTo(page_name) {
      console.log(page_name)
      console.log("?")
      this.$router.push({
        name: page_name
      })
    },
  },
};
</script>

<style>
@import "/assets/scss/index_header.scss";
</style>