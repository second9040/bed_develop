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
                a(href='javascript: void(0)') {{ selected_menu_text }}分類
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

      // 這邊的 item 是樣板，要修改內容要改 productStore.js
      item: {
        img: [
          "/assets/images/product/bed/1/1.jpg",
          "/assets/images/product/bed/1/2.jpg",
          "/assets/images/product/bed/1/3.jpg",
          "/assets/images/product/bed/1/4.jpg",
          "/assets/images/product/bed/1/5.jpg",
          "/assets/images/product/bed/1/6.jpg",
        ],
        name: "國民熱銷舒眠床墊",
        desc: [
          "🔹 高支撐 × 高穩定 × 高耐用",
          "專為偏好硬床睡感而設計，整體床體扎實穩重，有效承托脊椎，釋放腰背壓力，帶來真正的放鬆感受。",
          "🔹 高碳鋼 Bonnell 彈簧 × SGS 耐壓認證",
          "選用高碳鋼材質製成，具備穩定的彈性及優良的耐壓性，不易變形。經過超過 10,000 次的翻身模擬壓測，無論睡多久，依然穩如初見。",
          "🔹 S-Grid 串聯撐壓結構™",
          "密度升級使彈簧數量比傳統增加20%，床體重量達到100公斤，實現更均勻的支撐力分布，避免局部陷落，開啟真正的「睡眠勿擾模式」。",
          "🔹 雙層抗干擾張力棉襯",
          "搭載兩倍厚度的干擾張力棉襯，強化吸壓回彈性，有效降低翻身時的干擾感，延長床墊的使用壽命，並提升舒適度與耐磨性。",
          "🔹 進口棉質表布 × 高透氣蓬鬆層",
          "觸感柔軟、透氣且快乾，能夠保持肌膚乾爽舒適，彷彿置身於自然的空氣中。",
          "🔹 360° M字型床緣加固設計",
          "即使坐在床邊也不會塌陷或傾斜，穩定性全面升級，安全感更是倍增。",
        ],
        size_obj: [
          { size: "單人3*6.2尺(91*188cm)", ori_price: 7800, discount_price: 5800 },
          { size: "單人加大3.5*6.2尺(106*188cm)", ori_price: 7980, discount_price: 5980 },
          { size: "標準雙人5*6.2尺(152*188cm)", ori_price: 10800, discount_price: 8800 },
          { size: "雙人加大6*6.2尺(182*188cm)", ori_price: 14800, discount_price: 13800 },
          { size: "King size6*7尺(182*212cm)", ori_price: 18800, discount_price: 16800 },
        ],
        hardness_degree: 6,
        image_intro: [
          "/assets/images/product/bed/1/structure.jpg",
          "/assets/images/product/bed/1/feature.jpg",
          "/assets/images/product/bed/1/size.jpg",
        ],
        tab_content: [
          {
            name: "structure",
            tab: "床墊結構",
            main:
              "連結式床墊，使用高碳鋼硬彈簧與厚實的內襯，充分支撐身體不容易凹陷，高耐用不易壞。",
            mainImg: "/assets/images/product/tab2-main.jpg",
            feature: [
              {
                title: "棉質表布",
                desc: "大部分的衣服材質（70%化學纖維+30%棉紗）",
                img: "/assets/images/product/tab2-feature1.jpg",
              },
              {
                title: "高碳鋼硬彈簧",
                desc:
                  "使用中鋼彈簧、鋼線串聯，躺下去能平均分散重量，讓脊椎平直伸展、支撐身體不易凹陷，使之較為穩固。",
                img: "/assets/images/product/tab2-feature2.jpg",
              },
              {
                title: "厚實內襯",
                desc: "緩衝與彈簧的接觸，該添加的材料都有添加，做的很扎實很有支撐力。",
                img: "/assets/images/product/tab2-feature3.jpg",
              },
              {
                title: "強化邊框",
                desc: "床沿四邊做支撐加墊，讓上下床更有支撐力，使邊緣不易變形。",
                img: "/assets/images/product/tab2-feature4.jpg",
              },
            ],
            bottom: {
              title: "100%台灣職人手作",
              desc:
                "製床所長期以來的經驗與堅持，為不同需求喜好打造專屬床墊。<br><br>高碳鋼Q床使用非常多且粗的彈簧，擁有扎實Q彈的支撐力，平價並且非常耐用，不必擔心使用年限的問題，CP值高，推薦給喜歡硬床的你！",
              img: "/assets/images/product/tab2-bottom.jpg",
            },
          },
          {
            name: "feature",
            tab: "床墊特色",
            main:
              "床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。",
            secondary: [
              {
                title: "提升深層睡眠30%",
                desc:
                  "Lunio 乳膠床墊通過了“AASM美國睡眠中心”的嚴格測試，比一般床墊能確實提升深層睡眠30%，一晚達到5次以上的深度睡眠週期。",
              },
              {
                title: "舒適恆溫表布",
                desc:
                  "Outlast Space Tech®智慧溫控技術，感應體溫並調節，讓身體維持恆溫的舒適感，睡眠時不受冷熱干擾。",
              },
              {
                title: "零重力的輕盈涼感",
                desc:
                  "零重力的冷凝支撐層，透氣性提高30倍，提供零重力般的輕盈涼感，翻身也不易受到干擾。",
              },
              {
                title: "德國科技，持久清涼",
                desc: "鋁來減少多餘床墊的熱量，讓床墊持續保持涼爽。",
              },
            ],
            img: "/assets/images/product/item2.jpg",
          },
          {
            name: "size",
            tab: "尺寸說明",
            main:
              "床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。",
            secondary: [
              {
                title: "提升深層睡眠30%",
                desc:
                  "Lunio 乳膠床墊通過了“AASM美國睡眠中心”的嚴格測試，比一般床墊能確實提升深層睡眠30%，一晚達到5次以上的深度睡眠週期。",
              },
              {
                title: "舒適恆溫表布",
                desc:
                  "Outlast Space Tech®智慧溫控技術，感應體溫並調節，讓身體維持恆溫的舒適感，睡眠時不受冷熱干擾。",
              },
              {
                title: "零重力的輕盈涼感",
                desc:
                  "零重力的冷凝支撐層，透氣性提高30倍，提供零重力般的輕盈涼感，翻身也不易受到干擾。",
              },
              {
                title: "德國科技，持久清涼",
                desc: "鋁來減少多餘床墊的熱量，讓床墊持續保持涼爽。",
              },
            ],
            img: "/assets/images/product/item2.jpg",
          },
        ],
        deliverService: {
          img: [
            "/assets/images/product/item3.jpg",
            "/assets/images/product/item3.jpg",
            "/assets/images/product/item3.jpg",
          ],
          desc:
            "床墊結合4倍NASA技術，讓你涼爽舒適一整夜，支撐身體充分放鬆<br>1. Outlast Space Tech®PCM 恆溫纖維 採用NASA太空服的技術，可智慧調節溫度，讓睡覺時體溫能保持穩定。<br> 2. 零壓力冷凝記憶層 NASA為太空人設計的減壓記憶棉，能夠完美支撐身體，享受無壓力的睡眠。<br> 3. Hexagrid Pro 六角蜂巢原理 靈感來自太空船結構，增強床墊的穩定性和支撐力。，分散體重壓力。<br>4. Diamond Fusion 石墨烯科技 石墨烯高效導熱，保持床墊涼爽，有效排出多餘熱量，保持床墊涼爽。",
        },
        good_comment_obj: [
          {
            name: "Z小姐",
            comment:
              "老闆很專業而且很實在，不會一直推銷最貴的商品，仔細講解商品優異處，介紹符合訴求的商品，會讓客人親自體驗再選擇適合自己的，超有誠意的銷售。",
            img: "/assets/images/index/photo_test1.png",
          },
          {
            name: "A先生",
            comment:
              "老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄 老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄",
            img: "/assets/images/index/photo_test3.png",
          },
          {
            name: "李小姐",
            comment:
              "非常感謝店長介紹很詳細，貨比三家當天就決定還是要去這邊買，不會一直推銷最貴的床，很好溝通也會仔細聽你的訴求。 ",
            img: "/assets/images/index/photo_test2.png",
          },
          {
            name: "A先生",
            comment:
              "老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄 老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄老闆親切好溝通、有問必達，會依照預算推薦適合的床墊，很開心第一次買床墊就遇到那麼棒的店家😄",
            img: "/assets/images/index/photo_test3.png",
          },
        ],
        qa_obj: [
          {
            question: "訂購多久後會幫我配送？",
            ans:
              "有的，可以參考我們的高碳鋼Q床，其中使用了專利研發的吸震材料，讓硬床也可以一夜好眠。也可以針對近一步需求，下方聊聊，打造你的靈魂床墊。",
          },
          {
            question: "舊床可以幫忙回收嗎？",
            ans:
              "當然有的，製床所可為你的出租套房，打造設計感統一，耐用且高CP值的出租床組。",
          },
          {
            question: "表布和內層可以拆開來洗嗎？",
            ans:
              "市售獨立筒床墊因結構方式容易讓彈簧分離，支撐力會因使用年限受限，可能因為結構分離，失去支撐力，使你腰痠背痛，歡迎下方聊聊，針對喜歡的軟硬與需求，打造你的靈魂床墊。",
          },
        ],
      },
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
      this.activeTab = highlightItem.tabs[0].key;
      console.log("selected_detail", this.selected);

      // 軟硬度的格式跟別人不一樣＝＝
      if (this.selected.title == "軟硬度") {
        this.activeTab = this.selected.key;
      }

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

    // 第一次載入時菜單功能正常，用於高亮
    // 載入後再選＝使用者要開其他商品，改成 route
    this.firstLoad = false;
  },
  watch: {
    "$route.params.product_id": {
      immediate: true, // 初次載入時也觸發
      handler(newId) {
        if (newId && productStore[`bed${newId}`]) {
          this.item = productStore[`bed${newId}`];
          // 根據新商品重設選擇狀態
        } else {
          // fallback
          this.item = productStore["bed1"]; // 預設床墊
        }
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
