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
              li {{ selected_menu_text }}
                span.font-bold(v-if="selected_menu_text == '床墊'") 分類
          .row
            menu-aside(
              :asideMenu="asideMenu"
              :selectedMenuText="selected_menu_text"
              :isOpen="isOpen"
              :isActive="isActive"
              :getImagePath="getImagePath"
              @toggle="toggle"
              @select="selectMenu"
            )
            .col-lg-9.col-md-12
              .divider_for_h2
                h2.selected_item_h2.text-center(v-if="selected") {{ selected.title }}

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
              h3.selected_text(v-if="selected.title != '軟硬度'") {{ selected.text }}
              .tabs(v-if="selected.tabs")
                button.tab(
                  v-for="t in selected.tabs"
                  :key="t.key"
                  type="button"
                  :class="{ active: activeTab === t.key }"
                  @click="activeTab = t.key"
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

    currentItem() {
      if (!this.selected.itemKey) return null;
      const sec = this.asideMenu.find((s) => s.key === this.selected.section);
      return sec?.items.find((i) => i.key === this.selected.itemKey) || null;
    },
  },
  watch: {
    // header 選單觸發
    selected_menu_obj() {
      let obj = this.selected_menu_obj;
      this.secTitle = obj.title;
      localStorage.setItem("secTitle", this.secTitle);
      this.products_obj = menuStore[this.secTitle].products_obj;

      this.selected_menu_text = menuStore[obj.title].text;
      this.asideMenu = menuStore[obj.title].asideMenu;

      let highlightItem = this.asideMenu[obj.key].items[obj.index];
      highlightItem.title = this.asideMenu[obj.key].title;
      this.selected = highlightItem;

      if (highlightItem.tabs) {
        this.activeTab = highlightItem.tabs[0].key;
      }
      // 軟硬度的格式跟別人不一樣＝＝
      if (this.selected.title == "軟硬度") {
        this.activeTab = this.selected.key;
      }
      this.banner = this.asideMenu[obj.key].banner || this.asideMenu[obj.key].banners;
    },
  },
  data() {
    return {
      modules: [Autoplay, Navigation, Pagination],

      secTitle: "mattresses", // 預設床墊
      selected_menu_text: "",

      openMap: {
        hardness: true,
        users: true,
        structure: true,
      },
      // 當前選中的清單項目（用於高亮）
      selected: { key: "", text: "", itemKey: "" },

      asideMenu: null,
      activeTab: "",

      banner: null,

      expandedCat: null, // 一次只能顯示一個分類
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
          category: this.secTitle,
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
    toggleSubCat(name, event) {
      event.stopPropagation();
      if (this.expandedCat === name) {
        this.expandedCat = null;
      } else {
        this.expandedCat = name;
      }
    },
    toggle(key) {
      this.openMap[key] = !this.openMap[key];
    },
    isOpen(key) {
      return !!this.openMap[key];
    },
    isActive(key, item) {
      return this.selected.text === item.text;
    },
    selectMenu(obj) {
      // 設定選取的 aside item 高亮
      if (isNaN(obj.key)) {
        // mounted 預設選擇的話 key 是數字
        // 不過直接點選的話 key 是英文 ex: hardness
        // 所以要找對應的 index
        this.asideMenu.forEach((element, idx) => {
          if (element.key === obj.key) {
            obj.key = idx;
          }
        });
      }
      let highlightItem = this.asideMenu[obj.key].items[obj.index];
      highlightItem.title = this.asideMenu[obj.key].title;
      this.selected = highlightItem;

      // tab 高亮
      if (highlightItem.tabs) {
        this.activeTab = highlightItem.tabs[0].key;
      }

      // 軟硬度的格式跟別人不一樣＝＝
      if (this.selected.title == "軟硬度") {
        this.activeTab = this.selected.key;
      }
      this.banner = this.asideMenu[obj.key].banner || this.asideMenu[obj.key].banners;

      // 把選擇的項目存到 vuex 裡
      this.selectedMenu({
        title: this.secTitle,
        key: obj.key,
        index: obj.index,
      });
    },
  },
  mounted() {
    const item = localStorage.getItem("selected_menu_obj");
    if (item) {
      this.selectedMenu(JSON.parse(item)); // 呼叫 Vuex action
      localStorage.removeItem("selectedItem"); // 用完就清掉
    }

    if (this.selected_menu_obj && this.selected_menu_obj.title) {
      // 從 header 傳來的
      let o = this.selected_menu_obj;
      this.secTitle = o.title;
      this.selected_menu_text = menuStore[o.title].text;
      this.asideMenu = menuStore[o.title].asideMenu;
      this.products_obj = menuStore[o.title].products_obj;
      this.selectMenu({
        title: o.title,
        key: o.key,
        index: o.index,
      });

      this.banner = this.asideMenu[o.key].banner || this.asideMenu[o.key].banners;
    } else {
      // 沒有的話可能是同頁重整，使用預設值
      this.secTitle = location.href.split("product_list_")[1];
      this.selected_menu_text = menuStore[this.secTitle].text;
      this.asideMenu = menuStore[this.secTitle].asideMenu;
      this.products_obj = menuStore[this.secTitle].products_obj;
      this.selectMenu({
        title: this.secTitle,
        index: 0,
        key: 0,
      });

      this.banner = this.asideMenu[0].banner || this.asideMenu[0].banners;
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
