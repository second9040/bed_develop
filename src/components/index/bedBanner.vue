<template lang="pug">
  section#bed.section
    swiper.banner_swiper(
        :loop='true' 
        :modules='modules' 
        :pagination="{ el: '.swiper-pagination', clickable: true }"
        :slides-per-view='1' 
        :space-between='10' 
        :autoplay='{ delay: 5000, disableOnInteraction: false }'
        :navigation='{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }'
    )
      swiper-slide.swiper-slide(v-for='(banner, index) in banners' :key='index')
        .position-relative
          .banner_container.position-relative
            img.banner-slide(:src='getImagePath(banner.img)' :alt='banner.name')
            .text_div.position-absolute
              h1 {{ banner.title }}
              h3 {{ banner.desc }}
              button.banner_btn.button.btn.btn-primary(
                  v-if="banner.btn_text"
                  type="button"
              ) {{ banner.btn_text}}

      .swiper-pagination
      .swiper-button-next
      .swiper-button-prev

    a.w-100.btn-chatbed.mobile(href="https://line.me/ti/p/~@121povpz" target="_blank")
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
      const mode = location.href.includes('bed_develop') ? "test_build" : "";
      let host = location.host;
      const handlePath = mode == "test_build" ? imgPath.replace("@//", host + '/bed_develop/') : imgPath.replace("@", host);
      return new URL(handlePath, import.meta.url).href;
  } catch (err) {
      console.warn(err);
  }
};

export default {
  name: "bedBanner",
  components: {
    Swiper,
    SwiperSlide,
  },
  props: {
  },
  data() {
    return {
      modules: [Autoplay, Navigation, Pagination],
      banners: [
        {
          img: "/assets/images/index/banner_kari01.jpg?1",
          name: "banner_kari01",
          title: "擁有最適合你的床",
          desc: "交給床墊魔法師",
          btn_text: "馬上了解",
          btn_link: "",
        },
        {
          img: "/assets/images/index/hero-bg.jpg",
          name: "hero",
          title: "擁有最適合你的床2",
          desc: "交給床墊魔法師2",
          btn_text: "馬上了解",
          btn_link: "",
        },
        {
          img: "/assets/images/index/banner_kari01.jpg",
          name: "banner_kari01",
          title: "擁有最適合你的床3",
          desc: "交給床墊魔法師3",
        },
      ],
    };
  },
  mounted() {
  },
  methods: {
    getImagePath(img) {
      return require(`@/${img}`);
    },
  }
}
</script>

<style scoped>
@import "/assets/scss/index/bed_banner.scss";
@import "/assets/scss/index_header.scss";
</style>