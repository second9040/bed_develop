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
            img.banner-slide(:src='getImagePath(banner.img_pc, banner.img_mo)' :alt='banner.name')
            //- img.slide_text(v-if="banner.img_text" :src='getImagePath(banner.img_text, banner.img_mo)' :alt='banner.name')
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

    a.w-100.btn-chatbed.mobile(href="https://lin.ee/MO8qYZ9" target="_blank")
      img.line_icon(src="/assets/images/line_icon.png")
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
    let check_url = location.href.includes("bed_develop") ? "/bed_develop/" : "/..";
    const handlePath = imgPath.replace("@", "../.." + check_url);
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
  props: {},
  data() {
    return {
      modules: [Autoplay, Navigation, Pagination],
      banners: [
        // {
        //   img_pc: "/assets/images/index/banner_kari01_pc.jpg",
        //   img_mo: "/assets/images/index/banner_kari01_mo.jpg",
        //   name: "banner_kari01",
        //   title: ".",
        //   desc: ".",
        //   btn_text: "了解更多",
        //   btn_link: "",
        // },
        {
          img_pc: "/assets/images/index/banner_kari02_pc.jpg",
          img_mo: "/assets/images/index/banner_kari02_mo.jpg",
          name: "banner_kari02",
          title: "",
          desc: "",
          btn_text: "",
          btn_link: "",
        },
        {
          img_pc: "/assets/images/index/banner_kari03_pc.jpg",
          img_mo: "/assets/images/index/banner_kari03_mo.jpg",
          // img_text: "/assets/images/index/banner_kari03_pc_text.png",
          name: "banner_kari03",
          title: "",
          desc: "",
        },
      ],
    };
  },
  mounted() {},
  methods: {
    getImagePath(img_pc, img_mo) {
      if (window.innerWidth > 567) {
        return require(`@/${img_pc}`);
      } else {
        return require(`@/${img_mo}`);
      }
    },
  },
};
</script>

<style scoped>
@import "/assets/scss/index/bed_banner.scss";
</style>
