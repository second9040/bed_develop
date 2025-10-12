<template lang="pug">
  #product_detail.product_detail.other_page
    .container
      // shop  area start
      //- .shop_section.shop_reverse
      .main_section
        .container
          .breadcrumb_content
            ul
              li(@click="goto('home')")
                a(href='javascript: void(0)') 首頁
              li
                router-link(:to="`/product_list_${secTitle}`") 所有商品
              li
                router-link(:to="`/product_list_${secTitle}`") {{ selected_menu_text }}
                span(v-if="selected_menu_text == '床墊'") 分類
              li
                router-link(:to="`/product_list_${secTitle}`") {{ showed_cat }}
              li {{ showed_sub_cat }}
              
          .row
            menu-aside(
              :asideMenu="aside_menu"
              :selectedMenuText="selected_menu_text"
              :isOpen="isOpen"
              :getImagePath="getImagePath"
              @toggle="toggle"
              @select="selectMenu"
            )

            swiper-part(v-if="item" :item="item")
            brief-desc(v-if="item" :item="item")

          .row
            .col-lg-3.col-md-12
            tab-intro(v-if="item" :item="item")

          .row
            .col-lg-3.col-md-12
            good-comment(v-if="item" :item="item")

          .row
            .col-lg-3.col-md-12
            common-qa(v-if="item" :item="item")

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

import Multiselect from "vue-multiselect";

import swiperPart from "@/components/product_detail/swiperPart.vue";
import briefDesc from "@/components/product_detail/briefDesc.vue";
import tabIntro from "@/components/product_detail/tabIntro.vue";
import goodComment from "@/components/product_detail/goodComment.vue";
import commonQa from "@/components/product_detail/commonQa.vue";
import productStore from "@/store/productStore.js";

import menuAside from "@/components/menuAside.vue";

import { mapState, mapActions } from "vuex";
import menuStore from "@/store/menuStore.js";
export default {
  name: "ProductDetail",
  components: {
    Multiselect,

    swiperPart,
    briefDesc,
    tabIntro,
    goodComment,
    commonQa,
    menuAside,
  },
  data() {
    return {
      secTitle: "mattresses", // 預設床墊
      aside_menu: null,
      selected_menu_text: "",

      openMap: {
        hardness: true,
        users: true,
        structure: true,
        bedside_table_cabinet: true,
        bedstead: true,
        bed_set: true,
      },
      // 當前選中的清單項目（用於高亮）
      selected: { key: "", text: "", itemKey: "" },
      showed_cat: "",
      showed_sub_cat: "",

      activeTab: "",

      selected_sub_cat: "",
      selected_item: null,
      // 之後接 API 這邊就整個直接放收到的東西 （可能根據產品 ID）

      item: null, // 修改內容要改 productStore.js
    };
  },
  computed: {
    ...mapState(["selected_menu_obj"]),
  },
  methods: {
    ...mapActions(["selectedMenu"]),

    toggle(key) {
      this.openMap[key] = !this.openMap[key];
    },
    getImagePath(img) {
      return require(`@/${img}`);
    },
    isOpen(key) {
      return !!this.openMap[key];
    },
    toggleCategory(id) {
      if (this.show_category_list.includes(id)) {
        this.show_category_list = this.show_category_list.filter(function (item) {
          return item !== id;
        });
      } else {
        this.show_category_list.push(id);
      }
    },
    addComma(num) {
      return String(num).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    },
    goto(page, path = null) {
      if (path) {
        this.$router.push(path);
      } else {
        this.$router.push({
          name: page,
        });
      }
    },

    selectMenu(obj) {
      // 把選擇的項目存到 vuex 裡
      this.selectedMenu({
        main_cat: this.secTitle,
        cat: obj.cat,
        sub_cat: obj.sub_cat,
      });

      this.$router.push({ path: `/product_list_${this.secTitle}` });
    },
    setAsideHighlight() {
      for (let c_idx = 0; c_idx < this.aside_menu.length; c_idx++) {
        const cat = this.aside_menu[c_idx];

        for (let s_c_idx = 0; s_c_idx < cat.items.length; s_c_idx++) {
          const item = cat.items[s_c_idx];
          if (this.item.tag_en.includes(item.key)) {
            this.aside_menu[c_idx].items[s_c_idx].isActive = true;

            // 設定麵包屑文字
            this.showed_cat = this.aside_menu[c_idx].title;
            this.showed_sub_cat = this.aside_menu[c_idx].items[s_c_idx].text;
            return;
          }
        }
      }
    },
  },
  mounted() {
    let url = location.href;
    let data_str = url.split("product_detail")[1];
    this.secTitle = data_str.split("/")[1];
    let product_type = data_str.split("/")[2];
    let product_hash = data_str.split("/")[3];

    if (!menuStore[this.secTitle]) {
      this.$router.push("/"); // 參數不完整就回首頁
      return;
    }
    this.selected_menu_text = menuStore[this.secTitle].text;
    this.aside_menu = menuStore[this.secTitle].aside_menu;
    this.item = productStore[`${product_type}_${product_hash}`];

    // id 亂打的話回到商品列表頁
    if (!this.item) {
      this.$router.push(`/product_list_${this.secTitle}`);
      return;
    }

    // 設定 aside 高亮
    for (let c_idx = 0; c_idx < this.aside_menu.length; c_idx++) {
      const cat = this.aside_menu[c_idx];

      for (let s_c_idx = 0; s_c_idx < cat.items.length; s_c_idx++) {
        const item = cat.items[s_c_idx];
        // 設定麵包屑文字
        if (this.aside_menu[c_idx].items[s_c_idx].isActive == true) {
          this.showed_cat = this.aside_menu[c_idx].title;
          this.showed_sub_cat = this.aside_menu[c_idx].items[s_c_idx].text;
          return;
        }
      }
    }

    if (!this.showed_cat && !this.showed_sub_cat) {
      this.setAsideHighlight();
    }

    // 有空再想一想使用者亂打id的話怎麼重新回到列表頁
  },
  watch: {
    // "$route.params.product_type": {
    //   immediate: true, // 初次載入時也觸發
    //   handler(newId) {
    //     let product_id = localStorage.getItem("product_id");
    //     if (newId && productStore[`${this.$route.params.category}${product_id}`]) {
    //       this.item = productStore[`${this.$route.params.category}${product_id}`];
    //       // 根據新商品重設選擇狀態
    //     } else {
    //       // fallback
    //       this.item = productStore[`${this.$route.params.category}1`]; // 預設商品
    //     }
    //     localStorage.removeItem("product_id");
    //   },
    // },
  },
};
</script>
<style>
@import "vue-multiselect/dist/vue-multiselect.css";
</style>

<style scoped>
@import "/assets/scss/common.scss";
@import "/assets/css/product_temp/style.css";
@import "/assets/scss/product/product.scss";
@import "/assets/scss/product/product_list.scss";
</style>
