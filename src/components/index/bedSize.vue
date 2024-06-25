<template lang="pug">
  section#bed_size.section.pt-0
    .container
      h2.text-center(data-aos='fade-up') 尺寸任意門
      .title_desc.text-center(data-aos='fade-up') 你想要的尺寸我們都有

      .bed_size_div
        .bed_item(v-for="(item, index) in size_obj")
          img(:src="getImagePath('assets/images/index/bed0' + (index + 1)) + '.svg'")
          h3 {{ item.name }}
          h6 {{ item.desc }}
          button.button.btn.btn-outline-primary(type="button" @click="viewMore(item)") 了解更多

          //- h6 {{ item.size }}

      .customize_div.row(data-aos='fade-up' data-aos-delay='200')
        .col-6.left
          button.cust_btn.button.btn.btn-primary.mobile(
              type="button"
          ) 我想客製
          .img_container
            img(src="../../assets/images/index/custom_dog.png")
        .col-6.right
          .text_div
            h4 特殊需求，就交給製床所！
            p 製床所可以客製各種不同尺寸、軟硬度、舒適度、造型等等，歡迎與柴聯絡，讓我們為你服務！
          .cus_item_img_div
            .cus_item(v-for="(item, index) in cus_item_obj")
              img.cus_item_img(:src="getImagePath('assets/images/index/cus_itemimg0' + (index + 1)) + '.png'")
              h4 {{ item.name }}
        button.cust_btn.button.btn.btn-primary.pc(
            type="button"
        ) 我想客製
  
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
  name: "bed_size",
  props: {},
  data() {
    return {
      size_obj: [
        {
          name: "台灣規格",
          desc: "台灣製",
          size: "106 x 188 x 25 cm",
        },
        {
          name: "日本規格",
          desc: "無印良品、宜得利",
          size: "152 x 188 x 25 cm",
        },
        {
          name: "歐美規格",
          desc: "IKEA",
          size: "182 x 188 x 25 cm",
        },
        {
          name: "設計師客製",
          desc: "任何尺寸皆可客製",
          size: "182 x 212 x 25 cm",
        },
      ],
      cus_item_obj: [{ name: "尺寸" }, { name: "軟硬度" }, { name: "造型" }],
    };
  },
  methods: {
    getImagePath(img) {
      return require(`@/${img}`);
    },
    viewMore(item) {
      this.$emit("view-more", item);
    },
  },
};
</script>

<style scoped>
@import "@/assets/css/index/bed_size.scss";
</style>
