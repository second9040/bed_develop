<template lang="pug">
  #bed_knowledge_detail.bed_knowledge_detail.other_page
    .container
      .main_section
        .container
          .row(v-if="know_obj")
            .col-md-12
              h2 {{ know_obj.title }}
              .info_div 
                .date {{ know_obj.date }}
                .tag_div
                  .tag(v-for="tag in know_obj.tag") {{ tag }}
              .content_div 
                .desc(v-html="know_obj.desc")
                .detail(v-html="processImg(know_obj.detail)")
       
              .btn_box
                button.goBack.button.btn.btn-outline-primary(
                  type="button" 
                  @click="goBack()"
                ) 返回列表
                                
    cart-aside

</template>

<script>
import { mapState, mapActions } from "vuex";

import indexHeader from "@/components/index/indexHeader.vue";
import cartAside from "@/components/cartAside.vue";

const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace("@", "..");
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};

export default {
  name: "bed_knowledge_detail",
  components: {
    indexHeader,

    cartAside,
  },
  data() {
    return {
      know_obj: null,
    };
  },
  computed: {
    ...mapState(["clickShowCart", "showCartAside", "cart_items"]),
  },
  methods: {
    ...mapActions([
      "toggleCart",
      "countItem",
      "removeItem",
      "validateAmount",
      "changeCartItemAmount",
      "emptyCart",
    ]),
    getImagePath(img) {
      return require(`@/${img}`);
    },
    truncateText(text) {
      if (text.length > 60) {
        text = text.slice(0, 60) + '...<span class="read-more">more</span>';
        // 避免截到 html 標籤
        text = text.replace('<...', '...')
                    .replace('<b...', '...')
                    .replace('<br...', '...')
      }

      return text;
    },
    processImg(htmlContent) {
      // 使用正則表達式替換圖片 src
      return htmlContent.replace(
        /<img\s+(?:[^>]*?\s+)?src=(["'])(.*?)\1/g,
        (match, quote, src) => `<img src=${quote}${this.getImagePath(src)}${quote}`
      );
    },
    goBack() {
      this.$router.go(-1);
    },
  },
  mounted() {
    if (history.state.know_obj) {
      this.know_obj = JSON.parse(history.state.know_obj);
    } else {
      this.$router.push({
        name: "bed_knowledge",
      });
    }
  },
};
</script>

<style scoped>
@import "@/assets/scss/common.scss";
@import "@/assets/scss/bed_knowledge_detail.scss";
</style>
<style lang="scss">
.bed_knowledge_detail {
  .detail {
    margin: 20px 0;
    ul {
      padding-left: 20px;
    }
    h4 {
      margin-bottom: 20px;
    }
    .img_container {
      width: 100%;
      margin: 20px 0;
      img {
        width: 100%;
      }
    }
  }
}
</style>