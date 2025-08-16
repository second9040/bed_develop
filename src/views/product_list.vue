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
              //- li(v-if="selected_item") {{ selected_item.name }}
              // sidebar widget start
              aside.sidebar_widget.pc
                .widget_inner
                  .widget_list.widget_categories
                    h2.text-center {{ selected_menu_text }}分類
                    hr
                    nav.sidebar-filters
                      ul.section-list
                        li.section(v-for="sec in sections" :key="sec.key")
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
                                  @click.prevent="selectItem(sec.key, it)"
                                  :class="{ active: isActive(sec.key, it) }"
                                ) {{ it.text }}

            .col-lg-9.col-md-12
              .divider_for_mobile_h2
                h2.selected_item_h2.text-center(v-if="selected") {{ selected.title }}
              //- multiselect.w-100.mobile(
              //-   v-model="selected_item"
              //-   :options="widget_list_obj"
              //-   :multiple="false"
              //-   :allowEmpty="false"
              //-   group-values="sub"
              //-   group-label="name"
              //-   :group-select="false"
              //-   placeholder=""
              //-   track-by="id"
              //-   label="name"
              //-   tagPlaceholder=""
              //-   selectedLabel=""
              //-   selectLabel=""
              //-   selectGroupLabel=""
              //-   deselectLabel=""
              //-   @select="selectSubCategoryBySelect"
              //- )
              //-   template(v-slot:noResult)
              //-     span 查無選項

              // shop wrapper start
              .shop_banner
                img(src="/assets/images/product/list/banner.jpg" alt="product_banner")
              // shop toolbar end
              h3.selected_text {{ selected.text }}
              .tabs(v-if="selected.tab")
                button.tab(
                  v-for="t in selected.tab"
                  :key="t.key"
                  type="button"
                  :class="{ active: activeTab === t.key }"
                  @click="activeTab = t.key"
                ) {{ t.label }}

              .product_count(v-if="selected && selected.tab && selected.tab.length") 共 10 樣商品

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

export default {
  name: "product_list",
  components: {
    Multiselect,
  },
  computed: {
    ...mapState(["selected_menu"]),

    currentItem() {
      if (!this.selected.itemKey) return null;
      const sec = this.sections.find((s) => s.key === this.selected.section);
      return sec?.items.find((i) => i.key === this.selected.itemKey) || null;
    },
  },
  data() {
    return {
      selected_menu_text: "",

      openMap: {
        hardness: true,
        users: true,
        structure: true,
      },
      // 當前選中的清單項目（用於高亮）
      selected: { key: "", text: "", itemKey: "" },
      activeTab: "all",

      // 三個區塊的資料與圖示
      sections: [
        {
          key: "hardness",
          title: "軟硬度",
          icon: "/assets/images/index/headerIcon_hardness.png",
          items: [
            {
              text: "偏軟",
              key: "hard-soft",
              tabs: [
                { key: "all", label: "全部" },
                { key: "A", label: "Q彈簧" },
                { key: "B", label: "高碳鋼" },
                { key: "C", label: "飯店式鈦合金" },
                { key: "D", label: "旗艦款" },
              ],
            },
            {
              text: "軟有支撐",
              key: "soft-support",
              tabs: [
                { key: "all", label: "全部" },
                { key: "balance", label: "軟中帶撐" },
                { key: "relax", label: "釋壓舒適" },
              ],
            },
            {
              text: "軟硬適中",
              key: "medium",
              tabs: [
                { key: "all", label: "全部" },
                { key: "cp", label: "高 CP 值" },
                { key: "popular", label: "人氣款" },
              ],
            },
            {
              text: "硬有服貼",
              key: "hard-fit",
              tabs: [
                { key: "all", label: "全部" },
                { key: "fit", label: "貼合度" },
                { key: "spine", label: "護脊撐托" },
              ],
            },
            {
              text: "偏硬",
              key: "hard",
              tabs: [
                { key: "all", label: "全部" },
                { key: "firm", label: "高硬挺" },
                { key: "durable", label: "耐用型" },
              ],
            },
          ],
        },
        {
          key: "users",
          title: "使用族群",
          icon: "/assets/images/index/headerIcon_users.png",
          items: [
            {
              text: "家用型",
              key: "home",
              tabs: [
                { key: "all", label: "全部" },
                { key: "family", label: "親子友善" },
                { key: "easycare", label: "好保養" },
              ],
            },
            {
              text: "出租型",
              key: "rental",
              tabs: [
                { key: "all", label: "全部" },
                { key: "budget", label: "預算入門" },
                { key: "durable", label: "耐用不易塌" },
              ],
            },
            {
              text: "客製(軟硬/尺寸/表布)",
              key: "custom",
              tabs: [
                { key: "all", label: "全部" },
                { key: "firmness", label: "客製軟硬" },
                { key: "size", label: "客製尺寸" },
                { key: "fabric", label: "客製表布" },
              ],
            },
          ],
        },
        {
          key: "structure",
          title: "床墊結構",
          icon: "/assets/images/index/headerIcon_structure.png",
          items: [
            {
              text: "高強度*串聯式設計",
              key: "sgrid",
              new: true,
              tabs: [
                { key: "all", label: "全部" },
                { key: "A", label: "Q彈簧" },
                { key: "B", label: "高碳鋼" },
                { key: "C", label: "飯店式鈦合金" },
                { key: "D", label: "旗艦款" },
              ],
            },
            {
              text: "獨立筒型彈簧",
              key: "pocket",
              tabs: [
                { key: "all", label: "全部" },
                { key: "firm", label: "高硬挺" },
                { key: "motion", label: "低干擾" },
              ],
            },
          ],
        },
      ],

      activeTab: "",

      // expandedCats: [],  // 記錄被展開的 cat.name 或 catIndex (可以開啟多個分類)
      expandedCat: null, // 一次只能顯示一個分類
      screenWidth: 0,
      show_category_list: [],
      widget_list_obj: [
        {
          name: "床墊",
          id: "bed",
          sub: [
            {
              name: "波浪系列-高碳鋼硬彈簧",
              link: "javascript: void(0)",
              id: "1",
            },
            {
              name: "雲朵系列-獨立筒型彈簧",
              link: "javascript: void(0)",
              id: "2",
            },
            {
              name: "夢幻系列-蜂巢式獨立筒型彈簧",
              link: "javascript: void(0)",
              id: "3",
            },
            {
              name: "魔力系列-飯店型合金彈簧",
              link: "javascript: void(0)",
              id: "4",
            },
            {
              name: "魔力系列-飯店型合金彈簧",
              link: "javascript: void(0)",
              id: "5",
            },
            {
              name: "輕雲繚繞系列-乳膠/矽膠薄墊",
              link: "javascript: void(0)",
              id: "6",
            },
            {
              name: "翻轉好眠床墊-冬夏兩用藤席床墊",
              link: "javascript: void(0)",
              id: "7",
            },
            {
              name: "房東首選系列-商業用床墊",
              link: "javascript: void(0)",
              id: "8",
            },
            {
              name: "設計師愛用客製系列-商業用訂製床墊",
              link: "javascript: void(0)",
              id: "9",
            },
          ],
          categories: [
            {
              name: "依床墊結構分類",
              products: [
                {
                  cat_title: "S-Grid 串聯撐壓床墊",
                  items: [
                    {
                      name: "波浪系列-高碳鋼硬彈簧",
                      link: "javascript: void(0)",
                      id: "",
                    },
                    {
                      name: "魔力系列-飯店型合金彈簧",
                      link: "javascript: void(0)",
                      id: "",
                    },
                    {
                      name: "Q綿託付系列-Q彈簧",
                      link: "javascript: void(0)",
                      id: "",
                    },
                    {
                      name: "翻轉好眠床墊-冬夏兩用藤席床墊",
                      link: "javascript: void(0)",
                      id: "",
                    },
                  ],
                },
                {
                  cat_title: "直排式獨立筒床墊",
                  items: [
                    {
                      name: "雲朵系列-獨立筒型彈簧",
                      link: "javascript: void(0)",
                      id: "",
                    },
                  ],
                },
                {
                  cat_title: "蜂巢式獨立筒床墊",
                  items: [
                    {
                      name: "夢幻系列-蜂巢式獨立筒型彈簧",
                      link: "javascript: void(0)",
                      id: "",
                    },
                  ],
                },
                {
                  cat_title: "商用型床墊",
                  items: [
                    {
                      name: "房東首選系列-商業用床墊",
                      link: "javascript: void(0)",
                      id: "",
                    },
                  ],
                },
                {
                  cat_title: "上班/學生租屋床墊",
                  items: [
                    {
                      name: "上班族套房床墊",
                      link: "javascript: void(0)",
                      id: "",
                    },
                    {
                      name: "學生租屋床墊",
                      link: "javascript: void(0)",
                      id: "",
                    },
                  ],
                },
              ],
            },
            {
              name: "依軟硬需求分類",
              products: [
                {
                  cat_title: "偏硬床墊",
                  items: [
                    {
                      name: "波浪系列-高碳鋼硬彈簧",
                      link: "javascript: void(0)",
                      id: "",
                    },
                    {
                      name: "夢幻系列-蜂巢式獨立筒型彈簧",
                      link: "javascript: void(0)",
                      id: "",
                    },
                    {
                      name: "翻轉好眠床墊-冬夏兩用藤席床墊",
                      link: "javascript: void(0)",
                      id: "",
                    },
                  ],
                },
                {
                  cat_title: "軟硬適中床墊",
                  items: [
                    {
                      name: "Q綿託付系列-Q彈簧",
                      link: "javascript: void(0)",
                      id: "",
                    },
                    {
                      name: "雲朵系列-獨立筒型彈簧",
                      link: "javascript: void(0)",
                      id: "",
                    },
                  ],
                },
                {
                  cat_title: "Q彈偏軟床墊",
                  items: [
                    {
                      name: "魔力系列-飯店型合金彈簧",
                      link: "javascript: void(0)",
                      id: "",
                    },
                  ],
                },
              ],
            },

            {
              name: "依使用需求分類",
              products: [
                {
                  cat_title: "家用型床墊",
                  items: [],
                },
                {
                  cat_title: "嫁妝型床墊",
                  items: [],
                },
                {
                  cat_title: "出租型床墊",
                  items: [],
                },
                {
                  cat_title: "商業用床墊",
                  items: [],
                },
              ],
            },
          ],
        },
        {
          name: "床架/床頭櫃",
          id: "bedFrame",
          sub: [
            {
              name: "所有床墊",
              link: "javascript: void(0)",
              id: "all2",
            },
            {
              name: "家庭用床墊",
              link: "javascript: void(0)",
              id: "family2",
            },
          ],
        },
        {
          name: "其他配件",
          id: "others",
          sub: [
            {
              name: "所有床墊",
              link: "javascript: void(0)",
              id: "all3",
            },
            {
              name: "家庭用床墊",
              link: "javascript: void(0)",
              id: "family3",
            },
          ],
        },
      ],
      selected_sub_cat: "",
      selected_item: null,
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

    checkShow(id) {
      return this.show_category_list.includes(id);
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
    selectSubCategory(event, item) {
      event.stopPropagation(); // 阻止事件冒泡到父元素
      this.selected_sub_cat = item.id;
      this.selected_item = item;
    },
    selectSubCategoryBySelect(item) {
      this.selected_sub_cat = item.id;
    },
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
    isCatExpanded(name) {
      return this.expandedCat === name;
    },
    toggle(key) {
      this.openMap[key] = !this.openMap[key];
    },
    isOpen(key) {
      return !!this.openMap[key];
    },
    selectItem(key, item) {
      this.selected.key = key;
      this.selected.text = item.text || item.key;
      // 若需要帶路由或發事件，在這裡處理
      this.$emit("select", { key, value: item.text });
    },
    isActive(key, item) {
      return this.selected.key === key && this.selected.text === item.text;
    },
  },
  mounted() {
    this.show_category_list.push(this.widget_list_obj[0].id);
    this.selected_sub_cat = this.widget_list_obj[0].sub[0].id;
    this.selected_item = this.widget_list_obj[0].sub[0];

    let menu_obj = this.widget_list_obj.find((item) => item.id === this.selected_menu);
    console.log(menu_obj);
    console.log(this.selected_menu);
    if (menu_obj) {
      this.selected_menu_text = menu_obj.name;
    } else {
      this.selectedMenu("bed");
      this.selected_menu_text = "床墊";
    }

    // 預設選中第一個 section 的第一個項目
    if (this.sections.length > 0 && this.sections[0].items.length > 0) {
      const firstSection = this.sections[0];
      const firstItem = firstSection.items[0];
      const firstItemTab = firstItem.tabs;
      this.selected.title = firstSection.title;
      this.selected.key = firstSection.key;
      this.selected.text = firstItem.text;
      this.selected.tab = firstItemTab;
      this.activeTab = firstItemTab[0].key; // 預設選中第一個 tab
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
