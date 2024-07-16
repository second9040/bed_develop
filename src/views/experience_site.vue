<template lang="pug">
  #expeienceSite.expeienceSite.other_page
    .container
      .main_section
        .container
          .breadcrumb_content
            ul
              li
                a(href='/') 首頁
              li 體驗據點
          .row
            .col-md-12
              h2.page_title 體驗據點

              .site_div
                .site_item(
                  v-for="(site, index) in site_obj"
                  :class="{'odd': (index + 1) % 2 == 1, 'even': (index + 1) % 2 == 0}"
                )
                  .img_container 
                    img(:src="getImagePath(site.img)")
                  h4 {{ site.title }}
                  .sub_item_div
                    .left
                      .sub_item(
                        v-for="(sub_item, index) in site.sub_title.slice(0, 2)"
                      )
                        h6 {{ sub_item.title }}
                        p
                          span {{ sub_item.content[0] }}
                          a(:href="sub_item.map" target="_blank")
                            img.map_icon(
                              v-if="index == 0"
                              src="../assets/images/map_icon.png" 
                              alt="Map Icon" 
                            )
                    .right
                      .sub_item(
                        v-for="(sub_item, index) in site.sub_title.slice(2)"
                      )
                        h6 {{ sub_item.title }}
                        ul(v-for="li_item in sub_item.content")
                          li {{ li_item }}

              .contact_div
                .left 
                  h4 聯絡製床所
                  p 歡迎加入官方LINE@，或是使用表單與我們聯繫，製床所非常樂意協助您解決任何有關床墊、商品等睡眠時遇到的問題！

                  h6 製床所客戶服務時間：
                  p 週一至週日 的 10:00-20:00
                  p 若您在上述以外時間聯繫製床所，我們將於上班時間儘快回覆。
                .right
                  form
                    .row
                      .name_div.form-group.col-md-6
                        h6(for="name") 姓名
                        input#name.form-control(type="text" placeholder="")
                      .tel_div.form-group.col-md-6
                        h6(for="phone") 聯絡電話
                        input#phone.form-control(type="text" placeholder="")
                    .remark_div.row
                      .form-group.col-md-12
                        h6(for="remark") 備註
                        textarea.form-control(rows="4" placeholder="")
                      .btn_div
                        button.sendForm.button.btn.btn-primary(
                          type="button" 
                          @click="buyNow(discount_obj)"
                        ) 送出表單
                          
                        button.btn-chatbed.button.btn.btn-primary(
                          type="button" 
                          @click="buyNow(discount_obj)"
                        ) 
                          a(href="https://line.me/ti/p/~@121povpz" target="_blank")
                            span LINE與我們聯絡
                         
</template>

<script>
import { mapState, mapActions } from "vuex";

const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace("@", "..");
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};

export default {
  name: "experience_site",
  data() {
    return {
      site_obj: [
        {
          img: "assets/images/experience_site/site1.png",
          title: "忠明旗艦店 - 體驗免預約",
          sub_title: [
            {
              title: "● 體驗地址",
              content: ["台中市北區忠明路234號"],
              map: "https://maps.app.goo.gl/SdT2S3j7pAErf8UB7"
            },
            {
              title: "● 營業時間",
              content: ["週一至週日 10:00 ~21: 30"]
            },
            {
              title: "● 特色商品",
              content: [
                "硬式獨立筒（單人加大）",
                "非常扎實硬式獨立筒（標準雙人）",
                "高碳鋼Q床（標準雙人）",
                "Q彈簧（標準雙人）",
                "--更多請到店體驗--"
              ]
            },
          ]
        },
        {
          img: "assets/images/experience_site/site2.png",
          title: "東山分店 - 體驗免預約",
          sub_title: [
            {
              title: "● 體驗地址",
              content: ["台中市北屯區東山路一段35 - 2號"],
              map: "https://maps.app.goo.gl/eMc5oGj1j8YXHZTs6",
            },
            {
              title: "● 營業時間",
              content: ["週一至週日 11:00 ~19: 30"]
            },
            {
              title: "● 特色商品",
              content: [
                "硬式獨立筒（單人加大）",
                "非常扎實硬式獨立筒（標準雙人）",
                "高碳鋼Q床（標準雙人）",
                "Q彈簧（標準雙人）",
                "--更多請到店體驗--"
              ]
            },
          ]
        },
      ]
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
      const textWithLinks = text.replace(urlRegex, function (url) {
        return `<a href="${url}" target="_blank" style="color: #30526b; text-decoration: underline;">${url}</a>`;
      });
      return textWithLinks;
    },
    buyNow(obj) {

    },
  },
  mounted() {
  },
};
</script>

<style scoped>
@import "@/assets/scss/common.scss";
@import "@/assets/scss/experience_site.scss";
</style>
