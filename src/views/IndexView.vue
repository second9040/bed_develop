<script setup>
defineProps({});
</script>

<template lang="pug">
  .index-page 
    main.main
      bed-banner
      feature-view(
        @view-more="viewMore"
      )
      hot-items(
        :screenWidth="screenWidth"
        @view-more="viewMore"
      )
      bed-know-you-best
      //- bed-size(
      //-   @view-more="viewMore"
      //- )
      bed-good-service
      good-comment(
        :screenWidth="screenWidth"
        @view-more="viewMore"
      )
      bed-knowledge(
        :screenWidth="screenWidth"
      )
      qa-view(
        @view-more="viewMore"
      )
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

import bedBanner from "@/components/index/bedBanner.vue";
import bedKnowYouBest from "@/components/index/bedKnowYouBest.vue";
import hotItems from "@/components/index/hotItems.vue";
import featureView from "@/components/index/featureView.vue";
import bedSize from "@/components/index/bedSize.vue";
import bedGoodService from "@/components/index/bedGoodService.vue";
import goodComment from "@/components/index/goodComment.vue";
import bedKnowledge from "@/components/index/bedKnowledge.vue";
import qaView from "@/components/index/qaView.vue";

export default {
  name: "IndexView",
  components: {
    Swiper,
    SwiperSlide,

    bedBanner,
    bedKnowYouBest,
    hotItems,
    featureView,
    bedSize,
    bedGoodService,
    goodComment,
    bedKnowledge,
    qaView,
  },
  data() {
    return {
      screenWidth: 0,
      modules: [Autoplay, Navigation, Pagination],
    };
  },
  mounted() {
    this.checkSwiperLoaded();
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.updateBannerHeight);
  },
  methods: {
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
      // let bannerContainerHeight = 600;

      // this.screenWidth = screenWidth;
      // if (screenWidth > 900) {
      //   bannerContainerHeight =
      //     screenWidth * 0.5 > 640 ? screenHeight * 0.8 : screenWidth * 0.5;
      // }

      let imageAspectRatio = 1200 / 500; // 圖片的原始比例 2.4

      if (screenWidth > 567) {
        imageAspectRatio = 1200 / 500; // 桌機版
      } else {
        imageAspectRatio = 480 / 801; // 手機版
      }
      // 理論高度
      let bannerContainerHeight = screenWidth / imageAspectRatio;

      // 如果算出來的高度超過螢幕高度，就改用螢幕高度
      if (bannerContainerHeight > screenHeight) {
        bannerContainerHeight = screenHeight;
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

          // // screenWidth 越小, left 負的愈多
          // let leftVal =
          //   ((screenWidth - minWidth) / (maxWidth - minWidth)) * (maxLeft - minLeft) +
          //   minLeft;
          // container.style.left = `${leftVal}px`;
        }
        // container.style.top = `${topPos}px`;
      });
      console.log(`h: ${bannerContainerHeight}, w: ${screenWidth}`);
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
<style>
@import "/assets/scss/base.scss";
@import "/assets/scss/index.scss";
@import '/assets/scss/common.scss';
</style>
