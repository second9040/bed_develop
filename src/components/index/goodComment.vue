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
          src="/assets/images/index/bg_cloud2.png"
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
    screenWidth: {
      type: Number,
    },
  },
  data() {
    return {
      modules: [Autoplay, Navigation, Pagination],
      good_comment_obj: [
        {
          name: "wang ella",
          comment: "家中床墊老舊太軟，睡覺身體一直受到影響，每天都肌肉酸痛，甚至壓迫神經，每天腿脹，終於下定決心更換床墊，網路上的床墊琳瑯滿目，也有便宜的，仍然讓我下不了決心，決定還是要試躺才比較好。<br>台中很多家居店，我先選擇了評價好的製床所想來一探究竟，老闆為人誠懇，很耐心的的講解床墊的構造及材質，再加上試躺後，還有客製化的選擇，更硬一些的高碳鋼更能符合我的需求，價格也很實惠，於是毫不猶豫的訂購，從此可以睡一個好覺了。",
          img: "/assets/images/index/photo_test1.png",
        },
        {
          name: "林秋成",
          comment: "價格公道 床好躺 睡好睡滿就是這裡啦",
          img: "/assets/images/index/photo_test2.png",
        },
        {
          name: "Alex heish",
          comment: "老闆很有耐心，很詳細介紹🤭🤭",
          img: "/assets/images/index/photo_test3.png",
        },
        {
          name: "許碩志",
          comment: "二次回購，信用實在，優良店家",
          img: "/assets/images/index/photo_test4.png",
        },
      ],
      knowledge_obj: [
        {
          title: "床墊汰換多久一次較適合？",
          desc: "床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑 床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑",
          img: "/assets/images/index/blogimg.jpg",
        },
        {
          title: "床墊汰換多久一次較適合？",
          desc: "床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑 床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑",
          img: "/assets/images/index/blogimg.jpg",
        },
        {
          title: "床墊汰換多久一次較適合？",
          desc: "床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑 床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑",
          img: "/assets/images/index/blogimg.jpg",
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
@import "/assets/scss/index/good_comment.scss";
</style>
