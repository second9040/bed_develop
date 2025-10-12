<template lang="pug">
  #product_list_page.product_list_page.other_page
    .container
      // shop  area start
      //- .shop_section.shop_reverse
      .main_section
        .container
          .breadcrumb_content
            ul
              li(@click="goto('home')")
                a(href='javascript: void(0)') 首頁
              li 所有商品
              li {{ main_cat_ch }}
                span.font-bold(v-if="main_cat_ch == '床墊'") 分類
          .row
            menu-aside(
              :asideMenu="aside_menu"
              :selectedMenuText="main_cat_ch"
              :isOpen="isOpen"
              :getImagePath="getImagePath"
              @toggle="toggle"
              @select="selectMenu"
            )
            .col-lg-9.col-md-12
              .divider_for_h2
                h2.selected_item_h2.text-center(v-if="show_list") {{ show_list.cat_ch }}

              // shop wrapper start
              .shop_banner
                .banner_field(v-if="banner && Array.isArray(banner)")
                  swiper.banner_swiper(
                      :loop='true' 
                      :modules='modules' 
                      :pagination="{ el: '.swiper-pagination', clickable: true }"
                      :slides-per-view='1' 
                      :space-between='10' 
                      :autoplay='{ delay: 5000, disableOnInteraction: false }'
                      :navigation='{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }'
                  )
                    swiper-slide.swiper-slide(v-for='(b, index) in banner' :key='index')
                      .position-relative
                        .banner_container.position-relative
                          img.banner-slide(:src='getImagePath(b)')

                    .swiper-pagination
                    .swiper-button-next
                    .swiper-button-prev

                img.banner-slide(
                  v-else
                  :src="getImagePath(banner)"
                  alt="product_banner"
                )
              // shop toolbar end
              h3.selected_text(v-if="show_list.cat_title != '軟硬度'") {{ show_list.text }}
              .tabs(v-if="show_list.tabs")
                button.tab(
                  v-for="t in show_list.tabs"
                  :key="t.key"
                  type="button"
                  :class="{ active: t.isActive }"
                  @click="changeHighlightTab({ main_cat: main_cat_en ,cat: show_list.cat, sub_cat: t.key })"
                ) {{ t.label }}

              //- .product_count(v-if="selected && selected.tabs && selected.tabs.length && products_obj") 共 {{ products_obj.length }} 樣商品
              .product_count(v-if="products_obj") 共 {{ products_obj.length }} 樣商品

              .row.shop_wrapper
                .single_product(v-for="item in products_obj")
                  img.hot_item_img(:src='getImagePath(item.img)'  :alt="item.name")
                  .px-3.pb-4
                    h4 {{ item.name }}
                    p.price NT$ {{ addComma(item.price) }} 起
                    p {{ item.desc }}
                    .hardness_degree_div.d-flex(v-if="item.hardness_degree")
                      .text_circle 軟
                      .mx-1.d-flex.align-items-center
                        .degree_item(
                          v-for="count in 7"
                          :class="{ 'active': item.hardness_degree == count }"
                        )
                        //- p.m-0 硬度: {{ item.hardness_degree }}
                      .text_circle 硬

                    button.button.btn.btn-outline-primary(type="button" @click="viewMore(item)") 了解更多
              
              //- #pagination.pagination_style.pagination.justify-content-center
              //-   ul.d-flex
              //-     li
              //-       a(href='#')  &lt;&lt; 
              //-     li
              //-       a(href='#') 1
              //-     li
              //-       a.current(href='#') 2
              //-     li
              //-       a(href='#') 3
              //-     li
              //-       a(href='#') 4
              //-     li
              //-       a(href='#') 5
              //-     li
              //-       a(href='#') &gt;&gt;
              // shop toolbar end
              // shop wrapper end
      // shop  area end

</template>

<script>
const require = (imgPath) => {
  try {
    let check_url = location.href.includes("bed_develop") ? "/bed_develop/" : "";
    const handlePath = imgPath.replace("@", "../.." + check_url);
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};

import $ from "jquery";
import Multiselect from "vue-multiselect";
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
import menuAside from "@/components/menuAside.vue";

export default {
  name: "product_list",
  components: {
    Multiselect,
    Swiper,
    SwiperSlide,
    menuAside,
  },
  computed: {
    ...mapState(["selected_menu_obj"]),
  },
  watch: {
    // 在 product_list 點擊 header 選單時觸發
    selected_menu_obj() {},
    active_tab() {},
  },
  data() {
    return {
      modules: [Autoplay, Navigation, Pagination],

      main_cat_en: "", // ex. mattresses
      main_cat_ch: "", // ex. 床墊
      cat_en: "", // ex. hardness

      openMap: {
        hardness: true,
        users: true,
        structure: true,
        bedside_table_cabinet: true,
        bedstead: true,
        bed_set: true,
      },
      // 當前選中的清單項目
      show_list: { main_cat: "", cat: "", sub_cat: "" },

      aside_menu: null,
      active_tab: "",

      banner: null,

      products_obj: null,
    };
  },
  methods: {
    ...mapActions(["selectedMenu"]),

    getImagePath(img) {
      return require(`@/${img}`);
    },
    addComma(num) {
      return String(num).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    },
    viewMore(item) {
      this.$router.push({
        name: "product_detail",
        params: {
          category: this.main_cat_en,
          product_type: item.product_type,
          product_hash: item.product_hash,
        },
      });
      localStorage.setItem("product_id", item.product_id);
    },
    goto(page, hash = null) {
      this.$router.push({
        name: page,
        hash: hash,
      });
    },
    toggle(key) {
      this.openMap[key] = !this.openMap[key];
    },
    isOpen(key) {
      return !!this.openMap[key];
    },

    // 點擊側欄選單時觸發 (或 header 進來後設定高亮)
    selectMenu(obj) {
      this.cat_en = obj.cat;

      let index_cat = this.show_list.index_cat; // 軟硬度/使用族群/結構
      let index_sub_cat = this.show_list.index_sub_cat; // 選單的 index
      this.aside_menu.forEach((cat, idx) => {
        if (cat.key === obj.cat) {
          index_cat = idx;
          for (let i = 0; i < cat.items.length; i++) {
            if (cat.items[i].key === obj.sub_cat) {
              index_sub_cat = i;
              break;
            }
          }
        }
      });

      this.banner =
        this.aside_menu[index_cat].banner || this.aside_menu[index_cat].banners;

      // 雖然 obj 裡面有 main_cat, cat, sub_cat
      // 但這邊還需要取 中文名稱跟選擇的 sub_cat 的其他資訊 ex. tabs
      let highlightItem = { ...this.aside_menu[index_cat].items[index_sub_cat] };

      highlightItem.cat_ch = this.aside_menu[index_cat].title;
      highlightItem.key = this.aside_menu[index_cat].items[index_sub_cat].key;
      highlightItem.cat = obj.cat;
      highlightItem.sub_cat = obj.sub_cat;
      highlightItem.index_cat = index_cat;
      highlightItem.index_sub_cat = index_sub_cat;

      this.show_list = highlightItem;

      // aside 高亮
      this.aside_menu.forEach((cat, c_idx) => {
        cat.items.forEach((item, s_c_idx) => {
          // 每個項目都先清除 active 標記
          item.isActive = false;
          // 找到選中的那個項目 → 設為 true
          if (
            c_idx === index_cat &&
            s_c_idx === index_sub_cat &&
            !(
              this.main_cat_en == "mattresses" &&
              obj.cat == "hardness" &&
              obj.sub_cat == "all"
            ) // 除了 mattresses 軟硬度 的 all (格式跟大家不一樣！)
          ) {
            item.isActive = true;
          } else if (
            this.main_cat_en == "mattresses" &&
            obj.cat == "hardness" &&
            obj.sub_cat == "all"
          ) {
            this.show_list.text = "全部";
          }
        });
      });

      // 右側 tab 高亮設定
      if (this.aside_menu[index_cat].items[index_sub_cat].tabs) {
        if (this.main_cat_en == "mattresses" && obj.cat == "hardness") {
          this.aside_menu[index_cat].items[index_sub_cat].tabs.forEach((t) => {
            t.isActive = false;
            if (t.key === obj.sub_cat) {
              t.isActive = true;
            }
          });
        } else {
          this.changeHighlightTab({
            main_cat: obj.main_cat,
            cat: obj.cat,
            sub_cat: this.aside_menu[index_cat].items[index_sub_cat].tabs[0].key,
          });
        }
      }

      // 篩選商品
      let product_all = menuStore[this.main_cat_en].products_obj;

      // 根據 tag 篩選產品
      if (
        (this.main_cat_en == "mattresses" &&
          obj.cat == "hardness" &&
          obj.sub_cat != "all") ||
        obj.cat != "hardness"
      ) {
        product_all = product_all.filter((p) => p.tag_en.includes(obj.sub_cat));
      }
      this.products_obj = product_all;
    },
    changeHighlightTab(obj) {
      // 床墊軟硬度格式跟別人不一樣＝＝
      if (obj.main_cat == "mattresses" && obj.cat == "hardness") {
        this.selectMenu(obj);
      } else {
        this.aside_menu[this.show_list.index_cat].items[
          this.show_list.index_sub_cat
        ].tabs.forEach((t) => {
          t.isActive = false;
          if (t.key === obj.sub_cat) {
            t.isActive = true;
          }
        });

        // 篩選商品
        let product_all = menuStore[this.main_cat_en].products_obj;
        product_all = product_all.filter((p) => p.tag_en.includes(obj.sub_cat));
        this.products_obj = product_all;
      }
    },
  },
  mounted() {
    if (this.selected_menu_obj && this.selected_menu_obj.main_cat) {
      // 從 header 傳來的 vuex 狀態
      let obj = this.selected_menu_obj;

      this.main_cat_en = obj.main_cat; // ex. mattresses
      this.main_cat_ch = menuStore[obj.main_cat].text;
      this.cat_en = obj.cat; // ex. hardness
      this.aside_menu = menuStore[obj.main_cat].aside_menu;
      // 設定側欄高亮
      this.selectMenu({
        main_cat: obj.main_cat,
        cat: obj.cat,
        sub_cat: obj.sub_cat,
      });
    } else {
      // 沒有的話可能是同頁重整，使用預設值
      this.main_cat_en = location.href.split("product_list_")[1];
      this.main_cat_ch = menuStore[this.main_cat_en].text; // ex. 床墊
      this.aside_menu = menuStore[this.main_cat_en].aside_menu;
      this.cat_en = this.aside_menu[0].key; // ex. hardness

      let menu_o = {
        main_cat: this.main_cat_en,
        cat: this.aside_menu[0].key,
        sub_cat: this.aside_menu[0].items[0].key,
      };
      this.selectMenu(menu_o);
    }
  },
};
</script>
<style>
@import "vue-multiselect/dist/vue-multiselect.css";
</style>

<style scoped>
@import "/assets/scss/common.scss";
@import "/assets/scss/product/product.scss";
@import "/assets/scss/product/product_list.scss";
@import "/assets/css/product_temp/style.css";
</style>

<style lang="scss">
// swiper 有些樣式不能放在 scoped 裡面 (會吃不到)
#product_list_page {
  .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
    background: var(--color7-gray);
  }
}
</style>
