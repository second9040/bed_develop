<template lang="pug">
  section#bed_know_you_best.section
    .container
      .inner_div
        .left(data-aos='fade-up')
          h2 製床所 最懂你
          .divider
          .title_desc
            p 每一個人都是世界上獨一無二的存在，每一張床墊也都具備獨一無二的靈魂，透過60年職人的專業視角，親切建議，為你訂製出專屬你的靈魂床墊。
            img.bg-pc-only(src="/assets/images/index/bg_eng_text.png?261008")
        //- PC
        .right.pc-only(data-aos='fade-up')
          .know_you_best_item(
            v-for="item in know_you_best_obj"
            @click="goto(item.link)"
          )
            img(:src='getImagePath(item.img)' :alt='item.title')
            h4.text-center {{ item.title }}
            p.text-center {{ item.desc }}

        //- Mobile
        .right.mobile-only(data-aos='fade-up')
          swiper.know_you_best_swiper(
            :modules="modules"
            :loop="true"
            :slides-per-view="1"
            :space-between="20"
            :navigation="{ nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }"
            :pagination="{ el: '.swiper-pagination', clickable: true }"
          )
            swiper-slide(
              v-for="item in know_you_best_obj"
              :key="item.title"
            )
              .know_you_best_item(
                @click="goto(item.link)"
              )
                img(
                  :src='getImagePath(item.img)'
                  :alt='item.title'
                )
                h4.text-center {{ item.title }}
                p.text-center {{ item.desc }}

            .swiper-button-next
            .swiper-button-prev
</template>

<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

import { Navigation, Pagination } from "swiper/modules";
const require = (imgPath) => {
  try {
    let check_url = location.href.includes("bed_develop") ? "/bed_develop/" : "/..";
    const handlePath = imgPath.replace("@", "../.." + check_url);
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};

export default {
  name: "bed_know_you_best",
  components: {
    Swiper,
    SwiperSlide,
  },
  data() {
    return {
      modules: [Navigation, Pagination],
      know_you_best_obj: [
        {
          title: "睡感諮詢",
          desc: "針對你所偏好的軟硬度與睡眠需求，打造最適合你的床墊。",
          img: "/assets/images/index/consult.png?261008",
          link: "https://lin.ee/MO8qYZ9",
        },
        {
          title: "專屬選配",
          desc: "床墊尺寸、形狀、厚度、材質、顏色等皆可客製符合需求",
          img: "/assets/images/index/customize.png?261008",
          link: "about_feature",
        },
        {
          title: "匠心製床",
          desc: "專業職人細緻手作，獨具匠心且快速又超值，1周可出貨，急單請聊聊。",
          img: "/assets/images/index/handmake.png?261008",
          link: "about_us",
        },
      ],
    };
  },
  methods: {
    getImagePath(img) {
      return require(`@/${img}`);
    },
    goto(link) {
      let check_url = location.href.includes("bed_develop") ? "/bed_develop/" : "/";

      let a = document.createElement("a");
      a.href = `${location.href}${link}`;
      a.target = "_blank";
      a.click();
    },
  },
};
</script>

<style scoped>
@import "/assets/scss/index/bed_know_you_best.scss";
</style>
