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
              li(@click="goto('product_list')")
                a(href='javascript: void(0)') 所有商品
              li(@click="goto('product_list')")
                a(href='javascript: void(0)') {{ selected_menu_text }}
                span(v-if="selected_menu_text == '床墊'") 分類
              li(@click="goto('product_list')")
                a(href='javascript: void(0)') {{ selected.title }}
              li {{ selected.text }}
              
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

            swiper-part(:item="item")
            brief-desc(:item="item")

          .row
            .col-lg-3.col-md-12
            tab-intro(:item="item")

          .row
            .col-lg-3.col-md-12
            good-comment(:item="item")

          .row
            .col-lg-3.col-md-12
            common-qa(:item="item")

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
      firstLoad: true,
      secTitle: "bed", // 預設床墊
      asideMenu: null,
      selected_menu_text: "",

      openMap: {
        hardness: true,
        users: true,
        structure: true,
      },
      // 當前選中的清單項目（用於高亮）
      selected: { key: "", text: "", itemKey: "" },

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
    isActive(key, item) {
      return this.selected.text === item.text;
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
    goto(page, hash = null) {
      this.$router.push({
        name: page,
        hash: hash,
      });
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
      console.log("selected_detail", this.selected);

      // 軟硬度的格式跟別人不一樣＝＝
      if (this.selected.title == "軟硬度") {
        this.activeTab = this.selected.key;
      }
      console.log(this.secTitle);
      // 把選擇的項目存到 vuex 裡
      this.selectedMenu({
        title: this.secTitle,
        key: obj.key,
        index: obj.index,
      });

      // 不是第一次載入頁面，此時點擊菜單應該是想看其他商品，改變 route
      if (!this.firstLoad) {
        this.$router.push({
          name: "product_list",
          params: { product_id: this.item.id },
        });
      }
    },
  },
  mounted() {
    console.log(this.selected_menu_obj);
    if (this.selected_menu_obj && this.selected_menu_obj.title) {
      // 從 header 傳來的
      let o = this.selected_menu_obj;
      this.secTitle = o.title;
      this.selected_menu_text = menuStore[o.title].text;
      this.asideMenu = menuStore[o.title].asideMenu;
      this.selectMenu({
        title: o.title,
        key: o.key,
        index: o.index,
      });
    } else {
      // 沒有的話可能是同頁重整，使用預設值
      this.secTitle = this.$route.params.category;
      this.selected_menu_text = "床墊";
      this.asideMenu = menuStore[this.secTitle].asideMenu;
      this.selectMenu({
        title: this.secTitle,
        index: 0,
        key: 0,
      });
    }

    // 第一次載入時菜單功能正常，用於高亮
    // 載入後再選＝使用者要開其他商品，改成 route
    this.firstLoad = false;

    // 有空再想一想使用者亂打id的話怎麼重新回到列表頁
  },
  watch: {
    "$route.params.category": {
      immediate: true, // 初次載入時也觸發
      handler(newId) {
        if (newId && productStore[`${this.$route.params.category}${newId}`]) {
          this.item = productStore[`${this.$route.params.category}${newId}`];
          // 根據新商品重設選擇狀態
        } else {
          // fallback
          this.item = productStore[`${this.$route.params.category}1`]; // 預設床墊
        }
        console.log("productStore", productStore);
      },
    },
    "$route.params.product_id": {
      immediate: true, // 初次載入時也觸發
      handler(newId) {
        if (newId && productStore[`${this.$route.params.category}${newId}`]) {
          this.item = productStore[`${this.$route.params.category}${newId}`];
          // 根據新商品重設選擇狀態
        } else {
          // fallback
          this.item = productStore[`${this.$route.params.category}1`]; // 預設床墊
        }
        console.log("productStore", productStore);
      },
    },
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
