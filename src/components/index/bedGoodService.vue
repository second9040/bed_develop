<template lang="pug">
  section#bed_good_service.section
    h2.text-center(data-aos='fade-up') 製床所啾甘心
    .title_desc.text-center(data-aos='fade-up') 好的品質好的服務
    .container
      .service_desc_obj(data-aos='fade-up')
        .service_desc_item(v-for="(item, index) in service_desc_obj")
          .smile_icon_div(:class="{'odd': index % 2 == 1, 'even': index % 2 == 0}")
            img.smile_icon(src="../../assets/images/index/smile.svg")
          h4 {{ item.name }}
          .desc(v-html="embedLink(item.desc)")

</template>

<script>
const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace("@", "../..");
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
          desc: "免預約！歡迎前往門市試躺體驗，由專人一對一為您解說。<br><br>忠明店（10:00~22:00）：<br>台中市北區忠明路234號 https://maps.app.goo.gl/SdT2S3j7pAErf8UB7 <br><br>東山店（11:00~19:00）：<br>台中市北屯區東山路一段35-2號 https://maps.app.goo.gl/eMc5oGj1j8YXHZTs6",
        },
        {
          name: "專人線上諮詢",
          desc: "有任何疑問和需求，都可以透過電話或是LINE@與我們專業的服務人員諮詢聊聊。<br><br>電話：04-23201861<br>LINE：@121povpz",
        },
        {
          name: "運送舊床回收",
          desc: "家中有舊床需要處理，我們提供免費協助舊床下樓、舊床回收聯絡，免去處理舊床的煩惱！<br><br>我們也提供新床配送服務，是時候換張新床好好享受了！"
        },
        {
          name: "10年保固",
          desc: "我們的床皆是職人手作，訂購後約7個工作天製作，並有10年保固、15年責任承擔，品質有保證！"
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
      const urlPattern = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|]*)/ig;
      const phonePattern = /(\b04[-]?\d{3}[\d-]?\d{4}\b)/g;
      const linePattern = /(@[a-zA-Z0-9_]+)/g;
      
      const formatPhoneNumber = (phone) => {
        return phone.replace(/04/, '+886-4-');
      };

      let updatedText = text
        .replace(urlPattern, (match) => {
          return `<a href="${match}" target="_blank">
                    <img
                      src="${this.getImagePath('assets/images/map_icon.png')}"
                      style="margin-top: -3px; width: 15px;"
                      alt="Map Icon" />
                    </a>`;
        })
        .replace(phonePattern, (match) => {
          return `<a href="tel: ${match.replace(/04/, '+886-4-')}">${match}</a>`;
        })
        .replace(linePattern, (match) => {
          return `<a href="https://line.me/R/ti/p/${match.slice(1)}" target="_blank">${match}</a>`;
        });

      return updatedText;
    },
  },
};
</script>

<style scoped>
@import "@/assets/css/index/bed_good_service.scss";
</style>
