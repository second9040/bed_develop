<template lang="pug">
  .col-lg-9.col-md-12.product_detail_comment
    .title_div.position-relative
      h4 製床所床墊好評不斷
      .swiper_pagination
        i.bi.bi-chevron-left(@click="showSlide(-1)")
        i.bi.bi-chevron-right(@click="showSlide(1)")

    swiper.good_comment_swiper(
      :loop='true' 
      :modules='modules' 
      :pagination="{ el: '.swiper-pagination', clickable: true }"
      :slides-per-view="calcSlideToShow()" 
      :space-between='35' 
      :autoplay='{ delay: 5000, disableOnInteraction: false }'
      :navigation='{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }'
    )
      swiper-slide.swiper-slide(v-for='(item, index) in item.good_comment_obj' :key='index')
        .comment-item
          .d-flex
            img.comment-photo.flex-shrink-0(:src='getImagePath(item.img)' :alt='item.name')
            div
              h3 {{ item.name }}
              h4 {{ item.title }}
              .stars
                i.bi.bi-star-fill(v-for='n in 5' :key='n')
          .position-relative
            i.bi.bi-quote.quote-icon-left
            .position-relative.comment-container.d-flex
              p
                .comment-text(:class="'comment_index_' + index") 
                  | {{ item.comment }}
                  i.bi.bi-quote.quote-icon-right.short(v-if="textView(item.comment, index) == 'short'")
              div.position-relative(style="width: 50px;" v-if=" textView(item.comment, index) == 'long'")
                i.bi.bi-quote.quote-icon-right.long
      .swiper-button-next.d-none
      .swiper-button-prev.d-none

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
  name: "goodComment",
  components: {
    Swiper,
    SwiperSlide,
  },
  props: {
    item: {
      type: Object,
    },
  },
  data() {
    return {
      modules: [Autoplay, Navigation, Pagination],
      screenWidth: 0,
    };
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.updateSwiperSetting)
  },
  mounted() {
    this.updateSwiperSetting()
    window.addEventListener('resize', this.updateSwiperSetting)
  },
  methods: {
    updateSwiperSetting() {
      this.screenWidth =  window.innerWidth
    },
    getImagePath(img) {
      return require(`@/${img}`);
    },
    viewMore(item) {
      this.$emit("view-more", item);
    },
    calcSlideToShow() {
      if (this.screenWidth > 1199) {
        return 3;
      }
      if (this.screenWidth > 767) {
        return 2;
      }
      return 1;
    },
    textView(text, index) {
      let div = document.querySelector(`.comment_index_${index}`);
      if (div) {
        if (div.scrollHeight > div.clientHeight) {
          return "long";
        }
        return "short";
      }
      return "short";
    },
    showSlide(action) {
      let btnName = action == 1 ? "next" : "prev";
      document.querySelector(`.product_detail_comment .swiper-button-${btnName} `).click();
    },
  },
};
</script>

<style scoped>
@import '/assets/scss/product/detail/good_comment.scss';
</style>
