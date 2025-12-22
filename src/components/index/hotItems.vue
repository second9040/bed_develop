<template lang="pug">
  section#hot_items.section
    .container
      h2.text-center(data-aos='fade-up') 製床所2024熱銷商品
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
import { mapState, mapActions } from "vuex";
import menuStore from "@/store/menuStore.js";
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
  name: "hotItems",
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
      hot_items_tabs: [
        { name: "床墊", type: 1 },
        { name: "臥室傢俱", type: 2 },
        { name: "寢具", type: 3 },
      ],
      activeTab: 1,
      hot_items: {
        item_1: [
          {
            img: "/assets/images/product/bed/1/card.jpg",
            name: "淺波舒眠床墊-1cm乳膠",
            price: 6800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 4,
            product_id: 1,
            main_cat_en: "mattresses",
            product_type: "hard_spring",
            product_hash: 1,
            cat: "hardness",
            sub_cat: "hard_and_sticky",
          },
          {
            img: "/assets/images/product/bed/2/card.jpg",
            name: "綿雲舒壓床墊-1cm乳膠",
            price: 6800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 3,
            product_id: 2,
            main_cat_en: "mattresses",
            product_type: "pocket_spring",
            product_hash: 1,
            cat: "hardness",
            sub_cat: "soft",
          },
          {
            img: "/assets/images/product/bed/3/card.jpg",
            name: "綿Q托付床墊-2.54cm乳膠",
            price: 9000,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 4,
            product_id: 3,
            main_cat_en: "mattresses",
            product_type: "elastic_spring",
            product_hash: 1,
            cat: "hardness",
            sub_cat: "medium_hardness",
          },
          {
            img: "/assets/images/product/bed/4/card.jpg",
            name: "涼感魔力彈韌床墊-2.54cm乳膠",
            price: 13800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 3,
            product_id: 4,
            main_cat_en: "mattresses",
            product_type: "titanium_spring",
            product_hash: 1,
            cat: "hardness",
            sub_cat: "soft_with_support",
          },
          // {
          //   img: "/assets/images/product/bed/1/card.jpg",
          //   name: "淺波舒眠床墊",
          //   price: 6800,
          //   desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
          //   hardness_degree: 4,
          //   product_id: 1,
          //   main_cat_en: "mattresses",
          //   product_type: "hard_spring",
          //   product_hash: 1,
          //   cat: "hardness",
          //   sub_cat: "hard_and_sticky",
          // },
        ],
        item_2: [
          {
            img: "/assets/images/product/bed_set/1/card.jpg",
            name: "原廠油壓式掀床-有框版",
            price: 6800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 4,
            main_cat_en: "bedframe",
            product_type: "lifted_storage_bed",
            product_hash: 1,
            cat: "bedstead",
            sub_cat: "hydraulic_bed_lift",
          },
          {
            img: "/assets/images/product/bed_set/2/card.jpg",
            name: "雙拼木心板床架-有抽屜",
            price: 4000,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 3,
            main_cat_en: "bedframe",
            product_type: "cabinet_storage_bed",
            product_hash: 1,
            cat: "bedstead",
            sub_cat: "Japanese_style_wooden_leg_bed_frame",
          },
          {
            img: "/assets/images/product/bed_set/11/card.jpg",
            name: "羊絨雲朵皮革床組",
            price: 19800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 2,
            main_cat_en: "bedframe",
            product_type: "leather_bed",
            product_hash: 2,
            cat: "bed_set",
            sub_cat: "leather_solid_wood_steel_structure_bed_set",
          },
          {
            img: "/assets/images/index/hot_item_1.png",
            name: "義式皮革式床組(抽屜)",
            price: 15800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 1,
            main_cat_en: "bedframe",
            product_type: "leather_storage_bed",
            product_hash: 1,
            cat: "bed_set",
            sub_cat: "leather_solid_wood_steel_structure_bed_set",
          },
          // {
          //   img: "/assets/images/product/bed_set/1/card.jpg",
          //   name: "原廠油壓式掀床-有框版",
          //   price: 6800,
          //   desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
          //   hardness_degree: 4,
          //   main_cat_en: "bedframe",
          //   product_type: "lifted_storage_bed",
          //   product_hash: 1,
          //   cat: "bedframe",
          //   sub_cat: "bedstead",
          // },
        ],
        item_3: [
          {
            img: "/assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 3330,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 7,
            main_cat_en: "mattresses",
          },
          {
            img: "/assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 7800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 6,
            main_cat_en: "mattresses",
          },
          {
            img: "/assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 4,
            main_cat_en: "mattresses",
          },
          {
            img: "/assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 47800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 5,
            main_cat_en: "mattresses",
          },
          {
            img: "/assets/images/index/hot_item_1.png",
            name: "波浪舒眠床墊",
            price: 7800,
            desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
            hardness_degree: 2,
            main_cat_en: "mattresses",
          },
        ],
      },
    };
  },
  mounted() {},
  methods: {
    ...mapActions(["toggleCart", "selectedMenu"]),
    getImagePath(img) {
      return require(`@/${img}`);
    },
    viewMore(item) {
      this.selectedMenu({
        main_cat: item.main_cat_en,
        cat: item.cat,
        sub_cat: item.sub_cat,
      });

      // 把之前設定過的 aside 高亮都取消
      menuStore[item.main_cat_en].aside_menu.forEach((cat) => {
        cat.items.forEach((sub) => {
          sub.isActive = false;
        });
      });

      this.$router.push({
        name: "product_detail",
        params: {
          category: item.main_cat_en,
          product_type: item.product_type,
          product_hash: item.product_hash,
        },
      });
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
  },
};
</script>

<style scoped>
@import "/assets/scss/index/hot_items.scss";
</style>
