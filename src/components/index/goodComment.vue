<template lang="pug">
  div
    section#good_comment.section.position-relative
      .container
        .row
          .col-4.left.position-relative(data-aos='fade-up')
            h2 好評分享
            h6.mt-3 製床所的專業幫許多人找到他們的專屬床墊，改善睡眠品質，google更是5星好評！
            .good_comment_300
              .text_300 300+
              .star ★★★★★
          .col-8(data-aos='fade-up' data-aos-delay='200')
            swiper.good_comment_swiper(
              :loop='true' 
              :modules='modules' 
              :pagination="{ el: '.swiper-pagination', clickable: true }"
              :slides-per-view="calcSlideToShow('good_comment')" 
              :space-between='35' 
              :autoplay='{ delay: 5000, disableOnInteraction: false }'
              :navigation='{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }'
            )
              swiper-slide.swiper-slide(v-for='(item, index) in good_comment_obj' :key='index')
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

              .swiper-pagination
      .bg_cloud_div.d-flex
        img(
          v-for="repeat in 4"
          src="../../assets/images/index/cus_bg.png"
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
      type: Number,
    },
  },
  data() {
    return {
      modules: [Autoplay, Navigation, Pagination],
      good_comment_obj: [
        {
          name: "Z小姐",
          comment: "老闆很專業而且很實在，不會一直推銷最貴的商品，仔細講解商品優異處，介紹符合訴求的商品，會讓客人親自體驗再選擇適合自己的，超有誠意的銷售。",
          img: "assets/images/index/photo_test1.png",
        },
        {
          name: "李小姐",
          comment: "非常感謝店長介紹很詳細，貨比三家當天就決定還是要去這邊買，不會一直推銷最貴的床，很好溝通也會仔細聽你的訴求。 ",
          img: "assets/images/index/photo_test2.png",
        },
        {
          name: "A先生",
          comment: "老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄 老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄",
          img: "assets/images/index/photo_test3.png",
        },
      ],
      knowledge_obj: [
        {
          title: "床墊汰換多久一次較適合？",
          desc: "床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑 床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑",
          img: "assets/images/index/blogimg.jpg",
        },
        {
          title: "床墊汰換多久一次較適合？",
          desc: "床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑 床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑",
          img: "assets/images/index/blogimg.jpg",
        },
        {
          title: "床墊汰換多久一次較適合？",
          desc: "床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑 床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑",
          img: "assets/images/index/blogimg.jpg",
        },
      ]
    };
  },
  mounted() {
  },
  methods: {
    getImagePath(img) {
      return require(`@/${img}`);
    },
    viewMore(item) {
      this.$emit("view-more", item);
    },
    calcSlideToShow() {
      if (this.screenWidth > 1199) {
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
  },
};
</script>

<style scoped>
@import "@/assets/css/index/good_comment.scss";
</style>
