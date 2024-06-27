<script setup>
defineProps({});
</script>

<template lang="pug">
  .index-page 
    index-header
    main.main
      bed-banner
      bed-know-you-best
      hot-items(
        :screenWidth="screenWidth"
        @view-more="viewMore"
      )
      qa-view(
        @view-more="viewMore"
      )
      bed-size(
        @view-more="viewMore"
      )
      bed-good-service
      good-comment(
        :screenWidth="screenWidth"
        @view-more="viewMore"
      )
      bed-knowledge(
        :screenWidth="screenWidth"
      )
    index-footer
    
    // Scroll Top
    a#scroll-top.scroll-top.d-flex.align-items-center.justify-content-center(href="#")
      i.bi.bi-chevron-up

    // Preloader
    //- #preloader
</template>
<script>
const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace("@", "..");
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};

import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/swiper-bundle.css";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

// import required modules
import { Autoplay, Navigation, Pagination } from "swiper/modules";

import indexHeader from "@/components/index/indexHeader.vue";
import bedBanner from "@/components/index/bedBanner.vue";
import bedKnowYouBest from "@/components/index/bedKnowYouBest.vue";
import hotItems from "@/components/index/hotItems.vue";
import qaView from "@/components/index/qaView.vue";
import bedSize from "@/components/index/bedSize.vue";
import bedGoodService from "@/components/index/bedGoodService.vue";
import goodComment from "@/components/index/goodComment.vue";
import bedKnowledge from "@/components/index/bedKnowledge.vue";
import indexFooter from "@/components/index/indexFooter.vue";

export default {
  name: "IndexView",
  components: {
    Swiper,
    SwiperSlide,

    indexHeader,
    bedBanner,
    bedKnowYouBest,
    hotItems,
    qaView,
    bedSize,
    bedGoodService,
    goodComment,
    bedKnowledge,
    indexFooter,
  },
  data() {
    return {
      screenWidth: 0,
      modules: [Autoplay, Navigation, Pagination],
    };
  },
  mounted() {
    this.checkSwiperLoaded();

    this.loadExternalScript('/public/js/index/bs_main.js')
      .catch(err => {
        console.error('Failed to load external script:', err);
      });
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.updateBannerHeight);
  },
  methods: {
    loadExternalScript(src) {
      return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = src;
        script.onload = () => resolve();
        script.onerror = () => reject(new Error(`Failed to load script ${src}`));
        document.head.appendChild(script);
      });
    },
    checkSwiperLoaded() {
      const swiperElement = this.$el.querySelector(".banner_swiper");
      if (swiperElement && swiperElement.swiper) {
        this.updateBannerHeight();
        window.addEventListener("resize", this.updateBannerHeight);
      } else {
        // 如果Swiper還未加載完成,稍後再次檢查
        setTimeout(this.checkSwiperLoaded, 100);
      }
    },
    updateBannerHeight() {
      const banner_slide = document.querySelectorAll(".banner-slide");
      const bannerContainers = document.querySelectorAll(".banner_container");
      const screenWidth = window.innerWidth;
      const screenHeight = window.innerHeight;
      let bannerContainerHeight = 600;

      this.screenWidth = screenWidth;
      if (screenWidth > 900) {
        bannerContainerHeight =
          screenWidth * 0.5 > 640 ? screenHeight * 0.8 : screenWidth * 0.5;
      }
      bannerContainers.forEach((container) => {
        container.style.height = `${bannerContainerHeight}px`;
      });

      // 根據 bannerContainer 高度調整圖片呈現位置
      banner_slide.forEach((container) => {
        let topPos = 0;
        let topLeft = 0;

        if (screenWidth > 1700) {
          topPos = bannerContainerHeight * -0.2 - screenWidth * 0.05;
        } else if (screenWidth > 1400) {
          topPos = bannerContainerHeight * -0.15;
        } else if (screenWidth > 900) {
          topPos = bannerContainerHeight * -0.05;
        } else {
          const maxWidth = 900;
          const minWidth = 320;
          const maxLeft = 0;
          const minLeft = -300;

          // screenWidth 越小, left 負的愈多
          let leftVal =
            ((screenWidth - minWidth) / (maxWidth - minWidth)) * (maxLeft - minLeft) +
            minLeft;
          container.style.left = `${leftVal}px`;
        }
        container.style.top = `${topPos}px`;
      });
      console.log(`h: ${bannerContainerHeight}, w: ${screenWidth}`);
    },
    getImagePath(img) {
      return require(`@/${img}`);
    },
    viewMore(hot_item) {
      console.log(hot_item);
    },
  },
};
</script>
<style scoped>
.greetings h1,
.greetings h3 {
  text-align: center;
}

@media (min-width: 1024px) {
  .greetings h1,
  .greetings h3 {
    text-align: left;
  }
}

.testimonial-item {
  max-width: 600px;
  margin: 0 auto;
}
.testimonial-img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  margin-right: 15px;
}
.stars {
  margin-top: 5px;
}
.stars i {
  color: #f39c12;
}
.quote-icon-left,
.quote-icon-right {
  color: #f39c12;
  font-size: 24px;
}
</style>
<style lang="scss">
@import "@/assets/css/base.scss";
@import "@/assets/css/index.scss";
@import '@/assets/scss/common.scss';
</style>
