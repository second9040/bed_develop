<template lang="pug">
  section#hot_items.section
    .container
      h2.text-center(data-aos='fade-up') 製床所熱銷商品
      .title_desc.text-center(data-aos='fade-up') 台灣職人手作，品質保證、高CP值首選

      .hot_items_tabs(data-aos='fade-up')
        ul.nav.justify-content-center
          li.nav-item(
            v-for="(tab, index) in hot_items_tabs" 
            :key="index" 
            @click="activeTab = index + 1"
            :class="{ active: activeTab === index + 1 }"
          ) {{ tab.name }}
          
          hr.tab_bottom_line.mt-0

        .tab-content
          swiper.hot_item_swiper(
            :loop='true' 
            :modules='modules' 
            :pagination="{ el: '.swiper-pagination', clickable: true }"
            :slides-per-view="calcSlideToShow('hot_item')" 
            :space-between='35' 
            :autoplay='{ delay: 5000, disableOnInteraction: false }'
            :navigation='{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }'
          )
            swiper-slide.swiper-slide(
              v-for="(item, key) in hot_items['item_' + activeTab]" :key="key"
            )
              .hot_item_div
                img.hot_item_img(:src='getImagePath(item.img)'  :alt="item.name")
                .px-3.pb-4
                  h4 {{ item.name }}
                  p.price NT$ {{ addComma(item.price) }} 起
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
  name: "hotItems",
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
      hot_items_tabs: [
        { name: "床墊", type: 1 },
        { name: "床架/床頭櫃", type: 2 },
        { name: "其他配件", type: 3 },
      ],
      activeTab: 1,
      hot_items: {
        item_1: [
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 7800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 4,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 7800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 3,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 7800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 4,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 7800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 3,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 75800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 2,
          },
        ],
        item_2: [
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 27800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 4,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 37800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 3,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 7800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 2,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 17800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 1,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 7800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 4,
          },
        ],
        item_3: [
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 3330,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 7,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 7800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 6,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 4,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 47800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 5,
          },
          {
            img: "assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 7800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 2,
          },
        ],
      },
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
    click_show_qa(index) {
      this.show_qa = this.show_qa == index ? 0 : index;
    },
    calcSlideToShow(swiperName) {
      if (swiperName == "hot_item") {
        if (this.screenWidth > 1199) {
          return 4;
        }
        if (this.screenWidth > 991) {
          return 3;
        }
        if (this.screenWidth > 768) {
          return 2;
        }
        return 1;
      }
    },
    addComma(num) {
      return String(num).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    },
  }
};
</script>

<style scoped>
@import "@/assets/css/index/hot_items.scss";
</style>
