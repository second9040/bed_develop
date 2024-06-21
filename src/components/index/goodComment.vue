<template lang="pug">
  section#good_comment.section
    .container
      h2.text-center(data-aos='fade-up') 床墊小知識
      .title_desc.text-center(data-aos='fade-up') 還有許多眉眉角角等你來探索

        .tab-content
          swiper.hot_item_swiper(
            :loop='true' 
            :modules='modules' 
            :pagination="{ el: '.swiper-pagination', clickable: true }"
            :slides-per-view="calcSlideToShow()" 
            :space-between='35' 
            :autoplay='{ delay: 5000, disableOnInteraction: false }'
            :navigation='{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }'
          )
            swiper-slide.swiper-slide(
              v-for="(item, key) in good_comment_obj" :key="key"
            )
              .hot_item_div
                img.hot_item_img(:src='getImagePath(item.img)'  :alt="item.name")
                .px-3.pb-4
                  h4 {{ item.name }}
                  p {{ item.desc }}
                  .hardness_degree_div.d-flex
                    .text_circle 軟
                    .mx-1.d-flex.align-items-center
                      .degree_item(
                        v-for="count in 7"
                        :class="{ 'active': item.hardness_degree == count }"
                      )
                      //- p.m-0 硬度: {{ item.hardness_degree }}
                    .text_circle 硬
                  button.button.btn.btn-outline-primary(type="button" @click="viewMore(item)") 了解更多
            .swiper-pagination
            .swiper-button-next
            .swiper-button-prev
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
  name: "goodComment",
  components: {
    Swiper,
    SwiperSlide,
  },
  props: {
    screenWidth: {
      type: Number
    }
  },
  data() {
    return {
      modules: [Autoplay, Navigation, Pagination],
      good_comment_obj: [
        {
            name: "Z小姐",
        },
        {
            name: "李小姐",
        },
        {
            name: "A先生",
        },
      ]
    }
  },
  mounted() {
  },
  methods: {
    getImagePath(img) {
      return require(`@/${img}`);
    },
    viewMore(item) {
      this.$emit('view-more', item);
    },
    calcSlideToShow() {
        if (this.screenWidth > 768) {
            return 2;
        }
        return 1;
    },
  }
};
</script>

<style scoped>
@import "@/assets/css/index/good_comment.scss";
</style>
