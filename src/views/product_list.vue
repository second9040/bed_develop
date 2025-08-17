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
          .row
            .col-lg-3.col-md-12
              // sidebar widget start
              aside.sidebar_widget.pc
                .widget_inner
                  .widget_list.widget_categories
                    h2.text-center {{ selected_menu_text }}分類
                    hr
                    nav.sidebar-filters
                      ul.section-list
                        li.section(v-for="sec in asideMenu" :key="sec.key")
                          //- Header（點擊可收合）
                          button.section-header(type="button" @click="toggle(sec.key)")
                            img.icon(:src="getImagePath(sec.icon)" :alt="sec.title")
                            span.title {{ sec.title }}
                            span.bi(:class="{ 'bi-chevron-up': isOpen(sec.key), 'bi-chevron-down': !isOpen(sec.key) }")

                          //- 內容（可收合）
                          transition(name="collapse")
                            ul.items(v-show="isOpen(sec.key)")
                              li.item(v-for="(it, idx) in sec.items" :key="idx")
                                img.new_icon(
                                  v-if="it.new == true"
                                  src="/assets/images/index/headerIcon_new.png"
                                )
                                a.item-link(
                                  href="javascript:void(0)"
                                  @click.prevent="selectMenu({title: sec.title, key: sec.key, index: idx})"
                                  :class="{ active: isActive(sec.key, it) }"
                                ) {{ it.text }}

            .col-lg-9.col-md-12
              .divider_for_h2
                h2.selected_item_h2.text-center(v-if="selected") {{ selected.title }}

              // shop wrapper start
              .shop_banner
                .banner_field(v-if="selected.banners")
                  swiper.banner_swiper(
                      :loop='true' 
                      :modules='modules' 
                      :pagination="{ el: '.swiper-pagination', clickable: true }"
                      :slides-per-view='1' 
                      :space-between='10' 
                      :autoplay='{ delay: 5000, disableOnInteraction: false }'
                      :navigation='{ nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }'
                  )
                    swiper-slide.swiper-slide(v-for='(banner, index) in selected.banners' :key='index')
                      .position-relative
                        .banner_container.position-relative
                          img.banner-slide(:src='getImagePath(banner.img_pc, banner.img_mo)' :alt='banner.name')
                          //- img.slide_text(v-if="banner.img_text" :src='getImagePath(banner.img_text, banner.img_mo)' :alt='banner.name')
                          .text_div.position-absolute
                            h1 {{ banner.title }}
                            h3 {{ banner.desc }}
                            button.banner_btn.button.btn.btn-primary(
                                v-if="banner.btn_text"
                                type="button"
                            ) {{ banner.btn_text}}

                    .swiper-pagination
                    .swiper-button-next
                    .swiper-button-prev

                img(
                  v-else
                  src="/assets/images/product/list/banner.jpg"
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

              .product_count(v-if="selected && selected.tabs && selected.tabs.length") 共 10 樣商品

              .row.shop_wrapper
                .single_product(v-for="item in products_obj")
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
              
              #pagination.pagination_style.pagination.justify-content-center
                ul.d-flex
                  li
                    a(href='#')  &lt;&lt; 
                  li
                    a(href='#') 1
                  li
                    a.current(href='#') 2
                  li
                    a(href='#') 3
                  li
                    a(href='#') 4
                  li
                    a(href='#') 5
                  li
                    a(href='#') &gt;&gt;
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

export default {
  name: "product_list",
  components: {
    Multiselect,
    Swiper,
    SwiperSlide,
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
    selected_menu_obj() {
      let o = this.selected_menu_obj;
      this.selected_menu_text = menuStore[o.title].text;
      this.asideMenu = menuStore[o.title].asideMenu;
      this.selectMenu({
        title: o.title,
        key: o.key,
        index: o.index,
      });
    },
  },
  data() {
    return {
      modules: [Autoplay, Navigation, Pagination],

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

      expandedCat: null, // 一次只能顯示一個分類
      products_obj: [
        {
          product_id: 1,
          img: "/assets/images/index/hot_item_1.png",
          name: "國民熱銷舒眠床墊",
          price: 5800,
          desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
          hardness_degree: 6,
        },
        {
          product_id: 2,
          img: "/assets/images/index/hot_item_1.png",
          name: "綿雲舒壓床墊",
          price: 6800,
          desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
          hardness_degree: 3,
        },
        {
          product_id: 3,
          img: "/assets/images/index/hot_item_1.png",
          name: "夢幻舒服床墊",
          price: 10800,
          desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
          hardness_degree: 3,
        },
        {
          product_id: 4,
          img: "/assets/images/index/hot_item_1.png",
          name: "魔力彈韌床墊",
          price: 9800,
          desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
          hardness_degree: 3,
        },
        {
          product_id: 5,
          img: "/assets/images/index/hot_item_1.png",
          name: "波浪舒眠床墊",
          price: 7800,
          desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
          hardness_degree: 3,
        },
        {
          product_id: 6,
          img: "/assets/images/index/hot_item_1.png",
          name: "波浪舒眠床墊",
          price: 75800,
          desc: "適合容易腰酸者，擁有高支撐力，波浪般服貼腰際，享受扎實睡感...",
          hardness_degree: 2,
        },
      ],
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
          product_id: item.product_id,
        },
      });
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
      this.activeTab = highlightItem.tabs[0].key;
      console.log("selected", this.selected);

      // 軟硬度的格式跟別人不一樣＝＝
      if (this.selected.title == "軟硬度") {
        this.activeTab = this.selected.key;
      }
    },
  },
  mounted() {
    console.log(this.selected);
    if (this.selected_menu_obj && this.selected_menu_obj.title) {
      // 從 header 傳來的
      let o = this.selected_menu_obj;
      this.selected_menu_text = menuStore[o.title].text;
      this.asideMenu = menuStore[o.title].asideMenu;
      this.selectMenu({
        title: o.title,
        key: o.key,
        index: o.index,
      });
    } else {
      // 沒有的話可能是同頁重整，使用預設值
      this.selected_menu_text = "床墊";
      this.asideMenu = menuStore["bed"].asideMenu;
      this.selectMenu({
        title: "bed",
        index: 0,
        key: 0,
      });
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
