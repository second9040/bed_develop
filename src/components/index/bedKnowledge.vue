<template lang="pug">
div
  section#knowledge.knowledge.section
    h2.text-center(data-aos='fade-up') 床墊小知識
    .title_desc.text-center(data-aos='fade-up') 還有許多眉眉角角等你來探索
    .container.bed_knowledge_div(data-aos='fade-up')
      swiper#bed_knowledge_swiper.bed_knowledge_swiper(
        :loop='true' 
        :modules='modules' 
        :pagination="{ el: '.swiper-pagination', clickable: true }"
        :slides-per-view="calcSlideToShow('bed_knowledge')" 
        :space-between='35' 
        :autoplay='{ delay: 5000, disableOnInteraction: false }'
        :navigation='{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }'
      )
        swiper-slide.swiper-slide(
          v-for='(item, index) in knowledge_obj'
          :key='index'
        )
          .knowledge_item
            img(:src='getImagePath(item.img)' :alt='item.title')
            .text_div(
              :class="{'odd': index % 2 == 1, 'even': index % 2 == 0}"
              @click="goto(item.link)"
            )
              h4 {{ item.title }}
              p.desc {{ truncateText(item.desc) }}

        .swiper-button-prev
        .swiper-button-next
        .swiper-pagination

  // 和我們聊聊      
  section#contact_us.contact_us.section.d-flex
    .content_div
      h2 和我們聊聊
      p 有任何疑問都可以與我們聊聊，讓專業的製床所為你服務
      button.btn.button.btn-primary(type="button") 用LINE聊聊
      
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
  name: "bedKnowledge",
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
      knowledge_obj: [
        {
          title: "床墊汰換多久一次較適合？",
          desc: "床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑 床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑",
          img: "assets/images/index/blogimg.jpg",
          link: "#",
        },
        {
          title: "床墊汰換多久一次較適合？",
          desc: "床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑 床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑",
          img: "assets/images/index/blogimg.jpg",
          link: "#",
        },
        {
          title: "床墊汰換多久一次較適合？",
          desc: "床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑 床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑",
          img: "assets/images/index/blogimg.jpg",
          link: "#",
        },
        {
          title: "床墊汰換多久一次較適合？",
          desc: "床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑 床墊是我們日常生活中不可或缺的部分，它們直接關係到我們的睡眠質量和整體健康。然而， 對於何時該汰換床墊這個問題，許多人可能感到困惑",
          img: "assets/images/index/blogimg.jpg",
          link: "#",
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
    calcSlideToShow() {
      if (this.screenWidth > 991) {
        return 3;
      }
      if (this.screenWidth > 767) {
        return 2;
      }
      return 1;
    },
    truncateText(text) {
      if (text.length > 60) {
        return text.slice(0, 60) + '...more';
      }
      return text;
    },
    goto(link) {
     window.location.href = link;
    },
  },
};
</script>

<style scoped>
@import "@/assets/css/index/bed_knowledge.scss";
</style>
