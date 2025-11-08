<template lang="pug">
  .col-lg-4.col-md-12
    .swipers_container
      swiper.main_swiper(
        ref="mainSwiper"
        :loop='true'
        :modules='modules'
        slides-per-view="1"
        :space-between='35'
        :autoplay='{ delay: delay, disableOnInteraction: false }'
        :navigation='{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }'
        @swiper="onSwiper"
      )
        swiper-slide.swiper-slide(
          v-for='(item, index) in item.img'
          :key='index'
        )
          // 判斷是不是 YouTube ID（沒有副檔名）
          template(v-if="!item.match(/\.jpg|\.png|\.jpeg|\.webp|\.gif/i)")
            .video-wrapper
              iframe(
                :src="`https://www.youtube.com/embed/${item}?rel=0&autoplay=1&mute=1&loop=1&playlist=${item}`"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
              )

          // 否則就是圖片
          img(v-else :src='getImagePath(item)' :alt="'產品圖' + (index + 1)")
        
        .swiper-button-prev
        .swiper-button-next
      
      swiper.small_swiper(
        ref="smallSwiper"
        :loop='true'
        :modules='modules'
        :slides-per-view="calcSlideToShow()"
        :space-between='calcSlideSpace()'
        :autoplay='{ delay: delay, disableOnInteraction: false }'
        :navigation='{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }'
        @click="smallSwiperClick"
      )
        swiper-slide.swiper-slide(
        v-for='(img, index) in item.img'
        :key='index'
        )
          // 判斷是不是 YouTube ID（沒有副檔名）
          template(v-if="!img.match(/\.jpg|\.png|\.jpeg|\.webp|\.gif/i)")
            .video-wrapper
              iframe(
                :src="`https://www.youtube.com/embed/${img}?rel=0&autoplay=1&mute=1&loop=1&playlist=${img}`"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
              )

          // 否則就是圖片
          img(v-else :src='getImagePath(img)' :alt="'產品圖' + (index + 1)")
      
        .swiper-button-prev
          .d-flex.align-item-center.justify-content-center
            i.bi.bi-chevron-left

        .swiper-button-next
          .d-flex.align-item-center.justify-content-center
            i.bi.bi-chevron-right
        
</template>

<script>
const require = (imgPath) => {
  try {
    let check_url = location.href.includes("bed_develop") ? "/bed_develop/" : "/..";
    const handlePath = imgPath.replace("@", "../.." + check_url);
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

export default {
  name: "SwiperPart",
  components: {
    Swiper,
    SwiperSlide,
  },
  data() {
    return {
      screenWidth: 0,
      select_amount: 1,
      mainSwiper: null,
      modules: [Autoplay, Navigation, Pagination],
      delay: this.item.swiperDelay || 5000,
    };
  },
  props: {
    item: {
      type: Object,
    },
  },
  methods: {
    getImagePath(img) {
      return require(`@/${img}`);
    },
    calcSlideToShow() {
      if (this.screenWidth > 1199) {
        return 5;
      }
      return 3;
    },
    calcSlideSpace() {
      // if (this.screenWidth > 576) {
      //   return 30
      // }
      return 10;
    },
    updateSwiperSetting() {
      const screenWidth = window.innerWidth;

      this.screenWidth = screenWidth;

      if (screenWidth < 1200) {
        let slideImg = document.querySelector(".small_swiper img");
        let slideImgHeight = 0;
        if (slideImg) {
          slideImgHeight = slideImg.offsetHeight;
        } else {
          return;
        }

        if (slideImgHeight) {
          document.querySelector(".small_swiper .swiper-button-prev").style.height = `${
            slideImgHeight + 5
          }px`;
          document.querySelector(".small_swiper .swiper-button-next").style.height = `${
            slideImgHeight + 5
          }px`;
        } else {
          // 沒取到高度表示 swiper 還沒加載完成
          setTimeout(() => {
            this.updateSwiperSetting();
          }, 100);
        }
      }
    },
    smallSwiperClick(slide) {
      this.mainSwiper.slideTo(slide.clickedIndex);
    },
    onSwiper(swiper) {
      this.mainSwiper = swiper;
    },
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.updateSwiperSetting);
  },
  mounted() {
    this.updateSwiperSetting();
    window.addEventListener("resize", this.updateSwiperSetting);
  },
};
</script>

<style scoped>
@import "/assets/scss/common.scss";
@import "/assets/css/product_temp/style.css";
@import "/assets/scss/product/product.scss";
@import "/assets/scss/product/product_list.scss";
@import "/assets/scss/product/detail/swiper_and_brief_desc.scss";

.video-wrapper {
  position: relative;
  width: 100%;
  padding-bottom: 100%; /* 🟢 強制容器為 1:1 */
  overflow: hidden;
  border-radius: 12px;
  background: #000; /* 避免未載入時閃白 */
}

.video-wrapper iframe {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 177.78%; /* 🟢 16 / 9 = 1.7778，這樣能剛好填滿1:1容器 */
  height: 100%;
  transform: translate(-50%, -50%);
}
</style>
