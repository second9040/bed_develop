<template lang="pug">
  section#bed.section
    swiper.banner_swiper(
        :loop='true' 
        :modules='modules' 
        :pagination="{ el: '.swiper-pagination', clickable: true }"
        :slides-per-view='1' 
        :space-between='10' 
        :autoplay='{ delay: 10000, disableOnInteraction: false }'
        :navigation='{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }'
    )
      swiper-slide.swiper-slide(v-for='(banner, index) in banners' :key='index')
        .position-relative
          .banner_container.position-relative(v-if="banner.youtube_id_pc" style="max-width: 1400px; margin: 0 auto;")
            .video-wrapper(:id="`youtube-player-${index}`" :style="'position: relative; padding-top: ' + video_padding_top()")
              iframe(
                :src="`https://www.youtube.com/embed/${getVideoId(banner)}?rel=0&autoplay=0&mute=1&playsinline=1&enablejsapi=1`"
                frameborder="0"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
              )
          .banner_container.position-relative(v-else style="max-width: 100%;")
            img.banner-slide(:src='getImagePath(banner.img_pc, banner.img_mo)' :alt='banner.name')
            //- img.slide_text(v-if="banner.img_text" :src='getImagePath(banner.img_text, banner.img_mo)' :alt='banner.name')
            .text_div.position-absolute
              h1 {{ banner.title }}
              h3 {{ banner.desc }}
              button.banner_btn.button.btn.btn-primary(
                  v-if="banner.btn_text"
                  type="button"
              ) {{ banner.btn_text}}

      .swiper-pagination(:style="pagination_bottom()")
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
        {
          youtube_id_pc: "KXyCuBcg65I",
          youtube_id_mo: "XRvggWLHX4E",
          name: "video_251204",
          title: ".",
          desc: ".",
          btn_link: "",
        },
        {
          img_pc: "/assets/images/index/banner_kari01_pc.png",
          img_mo: "/assets/images/index/banner_kari01_mo.png",
          name: "banner_kari01",
          title: ".",
          desc: ".",
          // btn_text: "了解更多",
          btn_link: "",
        },
        {
          img_pc: "/assets/images/index/banner_kari02_pc.png",
          img_mo: "/assets/images/index/banner_kari02_mo.png",
          name: "banner_kari02",
          title: "",
          desc: "",
          btn_text: "",
          btn_link: "",
        },
        {
          img_pc: "/assets/images/index/banner_kari03_pc.png",
          img_mo: "/assets/images/index/banner_kari03_mo.png",
          // img_text: "/assets/images/index/banner_kari03_pc_text.png",
          name: "banner_kari03",
          title: "",
          desc: "",
        },
      ],
    };
  },
  computed: {},
  mounted() {},
  methods: {
    getImagePath(img_pc, img_mo) {
      if (window.innerWidth > 567) {
        return require(`@/${img_pc}`);
      } else {
        return require(`@/${img_mo}`);
      }
    },
    getVideoId(banner) {
      if (window.innerWidth > 567) {
        return banner.youtube_id_pc;
      } else {
        return banner.youtube_id_mo;
      }
    },

    video_padding_top() {
      if (window.innerWidth > 567) {
        return "56.25%";
      } else {
        return "177.78%";
      }
    },
    pagination_bottom() {
      if (window.innerWidth > 567) {
        return "bottom: 60px;";
      } else {
        return "";
      }
    },
  },
};
</script>

<style scoped>
@import "/assets/scss/index/bed_banner.scss";
</style>
<style lang="css">
#bed.section {
  .video-wrapper {
    position: relative;
    width: 100%;
    background: #000;
    overflow: hidden;

    iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 0; /* 確保沒有邊框影響 */
      pointer-events: auto; /* 確保可以點擊 */
    }
  }

  /* 確保 banner_container 有固定結構 */
  .banner_container {
    height: 0;
    padding-bottom: 56.25%; /* 保持 16:9 比例 */
    position: relative; /* 確保 iframe 可以絕對定位於此 */
  }

  .video-wrapper {
    /* 移除原本的 padding-bottom */
    padding-bottom: 0;
    /* 讓 video-wrapper 佔滿 banner_container */
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #000;
  }

  .video-wrapper iframe {
    /* 保持不變 */
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
}
</style>
