<template lang="pug">
  section#bed_know_you_best.section
    .container
      .inner_div
        .left(data-aos='fade-up')
          h2 製床所 最懂你
          .divider
          .title_desc
            p 每一個人都是世界上獨一無二的存在，每一張床墊也都具備獨一無二的靈魂，透過60年職人的專業視角，親切建議，為你訂製出專屬你的靈魂床墊。
        .right(data-aos='fade-up')
          .know_you_best_item(
            v-for="item in know_you_best_obj"
            @click="goto(item.link)"
          )
            img(:src='getImagePath(item.img)' :alt='item.title')
            h4.text-center {{ item.title }}
            p.text-center {{ item.desc }}

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

export default {
  name: "bed_know_you_best",
  data() {
    return {
      know_you_best_obj: [
        {
          title: "專業床墊諮詢",
          desc: "針對你所偏好的軟硬度與需求，打造最適合你的床墊",
          img: "assets/images/index/demo_img_01.svg",
          link: "https://line.me/ti/p/~@121povpz",
        },
        {
          title: "專業床墊訂製",
          desc: "床墊尺寸、形狀、材質、表布顏色等皆可客製符合需求",
          img: "assets/images/index/demo_img_01.svg",
          link: "https://line.me/ti/p/~@121povpz",
        },
        {
          title: "職人手作床墊",
          desc: "專業職人細緻手作，超值且快速，最快1週即可出貨",
          img: "assets/images/index/demo_img_01.svg",
          link: "https://line.me/ti/p/~@121povpz",
        },
      ],
    };
  },
  methods: {
    getImagePath(img) {
      return require(`@/${img}`);
    },
    goto(link) {
      let a = document.createElement("a");
      a.href = link;
      a.target = "_blank";
      a.click();
    },
  },
};
</script>

<style scoped>
@import "/assets/scss/index/bed_know_you_best.scss";
</style>
