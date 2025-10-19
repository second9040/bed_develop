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
            brief-desc(v-if="item" :item="item" @show-modal="toggle_modal")

          .row
            .col-lg-3.col-md-12
            tab-intro(v-if="item" :item="item")

          .row
            .col-lg-3.col-md-12
            good-comment(v-if="item" :item="item")

          .row
            .col-lg-3.col-md-12
            common-qa(v-if="item" :item="item")

      // 半透明遮罩
      div(v-if="show_modal")
        div.modal-overlay(@click="toggle_modal(false)")

        // 彈窗本體
        div.modal-box
          .close-btn(type="button" @click="toggle_modal(false)")
            i.bi.bi-x-lg
          h4.text-center.font-bold 聯絡製床所
          form(@submit.prevent="submitForm")
            .row
              .col-lg-6.col-md-12.mb-2
                label 姓名
                input(type="text" v-model="form.name" placeholder="請輸入姓名")
              .col-lg-6.col-md-12
                label 聯絡電話
                input(type="text" v-model="form.phone" placeholder="請輸入電話")

            .row
              .col-lg-12.col-md-12
                label 備註
                textarea(v-model="form.note" placeholder="請留下您的訊息，若是詢問特定商品，請留下商品名稱或是商品需求，後續將派諮詢顧問致電與您聯繫瞭解，謝謝！" rows="4")

            button(type="submit") 發送
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
import Swal from "sweetalert2";

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
    Swal,
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
      show_modal: false,
      form: {
        name: "",
        phone: "",
        note: "",
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
    toggle_modal(flag = true) {
      this.show_modal = flag;
    },
    async submitForm() {
      if (!this.form.name || !this.form.phone) {
        Swal.fire({
          title: "資料不完整",
          text: "請填寫姓名與電話",
          icon: "error",
          confirmButtonText: "確認",
        });
        return;
      }
      Swal.showLoading();

      const formUrl =
        "https://docs.google.com/forms/d/e/1FAIpQLSfnB4JmG1VEFV2OnYetV5LEBeg_hV1h62s5hAty3vquFhbzuw/formResponse?usp=header";

      const formData = new URLSearchParams();
      formData.append("entry.1907070061", this.form.name); // 請替換 entry ID
      formData.append("entry.1433068134", this.form.phone);
      formData.append("entry.1525697653", this.form.note);

      fetch(formUrl, {
        method: "POST",
        mode: "no-cors",
        body: formData,
      })
        .then(() => {
          this.form.name = "";
          this.form.phone = "";
          this.form.note = "";
          Swal.hideLoading();
          this.toggle_modal(false);
          Swal.fire({
            title: "已收到回應",
            text: "我們會盡快與您聯絡",
            icon: "success",
            confirmButtonText: "確認",
          });
        })
        .catch(() => {
          Swal.hideLoading();
          Swal.fire({
            title: "發生錯誤",
            text: "請稍後再試",
            icon: "error",
            confirmButtonText: "確認",
          });
        });
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

<style scoped>
/* 半透明遮罩 */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 999;
}

/* 彈窗 */
.modal-box {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #fff;
  border-radius: 3px;
  padding: 24px 80px 60px;
  width: 700px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
  z-index: 1000;
}

@media (max-width: 992px) {
  .modal-box {
    width: 80vw;
  }
}

@media (max-width: 575px) {
  .modal-box {
    padding: 24px 40px 40px;
    width: 90vw;
  }
}

@media (max-width: 992px) {
  textarea {
    padding: 8px;
  }
}
/* 表單樣式 */
form {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

input,
textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

textarea {
  padding: 30px 30px 15px;
}

@media (max-width: 575px) {
  textarea {
    padding: 8px;
  }
}
button {
  margin-top: 8px;
  padding: 8px;
  border: solid 1px var(--color2-green);
  border-radius: 35px;
  cursor: pointer;
  background: var(--color2-green);
  color: white;
}
button:hover {
  background: transparent;
  color: var(--color2-green);
}

.close-btn {
  position: absolute;
  top: -25px;
  right: -20px;
  border: none;
  font-size: 40px;
  cursor: pointer;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  border: solid var(--color2-green);
  color: var(--color2-green);
  background: var(--color2-green);
}

.close-btn i {
  font-size: 24px;
  color: #fff;
}

@media (max-width: 575px) {
  .close-btn {
    transform: scale(0.6);
  }
}

.close-btn :hover {
  opacity: 0.7;
}
.close-btn:hover i {
}
</style>
