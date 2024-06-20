<template lang="pug">
  header#header.header.d-flex.align-items-center.fixed-top
    a.logo(href="index.html")
      h1.sitename 製床所御品
    //- a.logo.d-flex.align-items-center.me-auto.me-xl-0(href="index.html")
    //-   h1.sitename 製床所御品

    nav#navmenu.navmenu
      ul
        li
          a(href="index.html#bed") 床墊
        li
          a(href="index.html#hot_items") 床架/床頭櫃
        li
          a(href="index.html#hot_items") 其他配件
        li
          a(href="index.html#pricing") 關於我們
        li
          a(href="index.html#team") 限時優惠
        li
          a(href="index.html#how_select") 床墊知識
          //- Uncomment the dropdown menu if needed
          // li.dropdown
          //   a(href="#")
          //     span Dropdown
          //     i.bi.bi-chevron-down.toggle-dropdown
          //   ul
          //     li
          //       a(href="#") Dropdown 1
          //     li.dropdown
          //       a(href="#")
          //         span Deep Dropdown
          //         i.bi.bi-chevron-down.toggle-dropdown
          //       ul
          //         li
          //           a(href="#") Deep Dropdown 1
          //         li
          //           a(href="#") Deep Dropdown 2
          //         li
          //           a(href="#") Deep Dropdown 3
          //         li
          //           a(href="#") Deep Dropdown 4
          //         li
          //           a(href="#") Deep Dropdown 5
          //     li
          //       a(href="#") Dropdown 2
          //     li
          //       a(href="#") Dropdown 3
          //     li
          //       a(href="#") Dropdown 4
        li
          a(href="index.html#contact") 好評分享
        li
          a(href="index.html#contact") 體驗據點
      i.mobile-nav-toggle.d-xl-none.bi.bi-list
      .cart_div.mobile
        img.cart_icon(src="../../assets/images/cart_icon.png")
        .cart_items_count(
          :class="number_style()"
        ) {{ cart_items_count }}

    .d-flex.align-items-center.position-relative.justify-content-end
      .cart_div.pc
        img.cart_icon(src="../../assets/images/cart_icon.png")
        .cart_items_count(
          :class="number_style()"
        ) {{ cart_items_count }}

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

const require = (imgPath) => {
  try {
      const handlePath = imgPath.replace("@", "../..");
      return new URL(handlePath, import.meta.url).href;
  } catch (err) {
      console.warn(err);
  }
};

export default {
  name: "hotItems",
  components: {
    Swiper,
    SwiperSlide,
  },
  props: {
    modules: {
      type: Array
    },
    screenWidth: {
      type: Number
    },
  },
  data() {
    return {
      cart_items_count: 0,
    };
  },
  mounted() {
    this.checkSwiperLoaded();
  },
  methods: {
    checkSwiperLoaded() {
      this.$emit('check-swiper-loaded');
    },
    number_style() {
      let count = this.cart_items_count;
      if (count > 9 && count <= 99) return "last_than_99";
      if (count > 99 && count <= 999) return "last_than_999";
      if (count > 999) return "last_than_9999";
    },
  }
}
</script>
