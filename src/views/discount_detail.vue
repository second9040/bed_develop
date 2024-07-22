<template lang="pug">
  #latestDiscount.latestDiscount.other_page
    .container(v-if="discount_obj")
      .main_section
        .container
          .breadcrumb_content
            ul
              li(@click="goto('home')")
                a(href='javascript: void(0)') 首頁
              li(@click="goto('latestDiscount')")
                a(href='javascript: void(0)') 即時優惠
              li {{ discount_obj.title }}
          .row
            .col-md-12
              h2.page_title {{ discount_obj.title }}
              .detail_div 
                .left
                  .img_container 
                    img(:src="getImagePath(discount_obj.img)")
                .right
                  .desc(v-html="transformURL(discount_obj.desc)")
          
              button.buyNow.button.btn.btn-primary(
                type="button" 
                @click="buyNow(discount_obj)"
              ) 馬上搶購
                  
</template>

<script>
import { mapState, mapActions } from "vuex";

const require = (imgPath) => {
  try {
    let check_url = location.href.includes("bed_develop") ? "/bed_develop/" : "";
    const handlePath = imgPath.replace("@", "../.." + check_url);
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};

export default {
  name: "latestDiscount",
  data() {
    return {
      discount_obj: null,
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
    transformURL(text) {
      const urlRegex = /https?:\/\/[^\s]+/g;
      const phonePattern = /(\b04[-]?\d{3}[\d-]?\d{4}\b)/g;
      const textWithLinks = text
        .replace(urlRegex, function (url) {
          return `<a href="${url}" target="_blank" style="color: #30526b; text-decoration: underline;">${url}</a>`;
        })
        .replace(phonePattern, (match) => {
          return `<a href="tel: ${match.replace(/04-/, '+886-4-')}"  target="_blank" style="color: #30526b; text-decoration: underline;">${match}</a>`;
        });
      return textWithLinks;
    },
    buyNow(obj) {

    },
    goto(page, hash = null) {
      this.$router.push({
        name: page,
        hash: hash,
      });
    },
  },
  mounted() {
    if (history.state.discount_obj) {
      this.discount_obj = JSON.parse(history.state.discount_obj);
    } else {
      this.$router.push({
        name: "latestDiscount",
      });
    }
  },
};
</script>

<style scoped>
@import "/assets/scss/common.scss";
@import "/assets/scss/latestDiscount/latestDiscount.scss";
</style>
