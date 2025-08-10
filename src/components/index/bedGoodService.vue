<template lang="pug">
  section#bed_good_service.section
    h2.text-center(data-aos='fade-up') 製床所啾甘心
    .title_desc.text-center(data-aos='fade-up') 好的品質好的服務
    .container
      .service_desc_obj(data-aos='fade-up')
        .service_desc_item(v-for="(item, index) in service_desc_obj")
          .smile_icon_div(:class="{'odd': index % 2 == 1, 'even': index % 2 == 0}")
            img.smile_icon(src="/assets/images/index/smile.svg")
          h4 {{ item.name }}
          .desc(v-html="embedLink(item.desc)")

</template>

<script>
const require = (imgPath) => {
  try {
    let check_url = location.href.includes("bed_develop") ? "/bed_develop/" : "/..";
    const handlePath = imgPath.replace("@", "../.." + check_url);
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};

import { globalFunc } from '@/mixins/globalFunc';
export default {
  name: "bed_good_service",
  mixins: [globalFunc],
  data() {
    return {
      service_desc_obj: [
        {
          name: "門市試躺",
          desc: `免預約！歡迎前往門市試躺體驗，由專人一對一為您解說。<br><br>．忠明店．<br>營業時間：10:00~21:30<br>門市專線：<a href="tel:+886-4-23201861">04-2320-1861</a><br>地址：台中市北區忠明路234號 https://maps.app.goo.gl/SdT2S3j7pAErf8UB7 <br><br>．東山店．<br>營業時間：11:00~20:30<br>門市專線：<a href="tel:+886-4-22431666">04-2243-1666</a><br><br>台中市北屯區東山路一段35-2號 https://maps.app.goo.gl/eMc5oGj1j8YXHZTs6`,
        },
        {
          name: "專人線上諮詢",
          desc: "有任何疑問和需求，都可以透過電話或是LINE@與我們專業的服務人員諮詢聊聊。<br><br>Facebook Messager：m.me/287358568107452<br>LINE@：MO8qYZ9",
        },
        {
          name: "運送舊床回收",
          desc: "製床所提供<br>✔免費協助舊床下樓<br>✔舊床回收聯絡<br>✔新床配送服務<br><br>免去處理舊床的煩惱！是時候換張新床好好享受了！"
        },
        {
          name: "10年保固",
          desc: "✔床皆是職人手作<br> ✔訂購後7個工作天內交貨<br> ✔10年保固<br> ✔15年責任承擔<br><br> 每張床墊都是專屬於你、為你打造，品質有保證！"
        }
      ]
    };
  },
  methods: {
    getImagePath(img) {
      return require(`@/${img}`);
    },
    viewMore(item) {
      this.$emit("view-more", item);
    },
    embedLink(text) {
      const addressUrlPattern = /([^<br>]+?)\s+(https?:\/\/maps\.app\.goo\.gl\/[^\s<]+)/ig;
      const phonePattern = /(\b04[-]?\d{3}[\d-]?\d{4}\b)/g;
      const linePattern = /(@[a-zA-Z0-9_]+)/g;
      const messengerPattern = /(m\.me\/\d+)/g;

      let updatedText = text
        .replace(addressUrlPattern, (match, addressText, url) => {
          return `<a href="${url}" target="_blank" style="text-decoration: none; color: inherit; padding: 0;">
                    ${addressText.trim()}
                    <img
                      src="${this.getImagePath('/assets/images/map_icon.png')}"
                      style="margin-top: -3px; width: 15px;"
                      alt="Map Icon" />
                    </a>`;
        })
        .replace(phonePattern, (match) => {
          return `<a href="tel: ${match.replace(/04-/, '+886-4-')}">${match}</a>`;
        })
        .replace(linePattern, (match) => {
          return `<a href="https://line.me/ti/p/${match}" target="_blank">${match}</a>`;
        })
        .replace(messengerPattern, (match) => {
          return `<a href="http://${match}" target="_blank">${match}</a>`;
        });

      return updatedText;
    },
  },
};
</script>

<style scoped>
@import "/assets/scss/index/bed_good_service.scss";
</style>
