<template lang="pug">
    section#how_select.faq.section.pt-4
        .container
          h2.text-center(data-aos='fade-up') 床墊怎麼選？
          .title_desc.text-center(data-aos='fade-up') 靈魂好床墊三大關鍵
          div.how_to_select_div
            .key_factor_div
              .factor_obj(
                v-for="(item, index) in key_factor_obj"
                data-aos='fade-up'
              )
                .img_container.position-relative
                  img(
                    :src="getImagePath(item.img)"
                    :class="{'first_img': index == 0}"
                  )
                  .factor_color_container
                    .factor_body(:class="'index_' + (index % 2)")
                .desc_div
                  h3 {{ item.name }}
                  p {{ item.desc }}
                  button.button.btn.btn-outline-primary(type="button" @click="viewMore(item)") 了解更多
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
export default {
  name: "qaView",
  props: {
  },
  data() {
    return {
      show_qa: 1,
      key_factor_obj: [
        {
          img: "/assets/images/index/choose01.jpg",
          name: "支撐力",
          desc: "由彈簧的軟硬度和排列與數量影響，製床所有各種軟硬客製選擇。",
          href: "",
          color: "#53BDD7",
        },
        {
          img: "/assets/images/index/choose02.jpg",
          name: "舒適度",
          desc: "符合人體工學，屁股腰椎交接處不懸空，使躺感更服貼舒服。",
          href: "",
          color: "#9EBB51",
        },
        {
          img: "/assets/images/index/choose03.jpg",
          name: "感受性",
          desc: "不同材質的表步，透氣、排汗及涼爽程度不同，皆可自選。",
          href: "",
          color: "#53BDD7",
        },
      ],
    }
  },
  methods: {
    // getImagePath(img) {
    //   return this.$emit('get-image-path', img);
    // },
    getImagePath(img) {
      return require(`@/${img}`);
    },
    viewMore(item) {
      this.$emit('view-more', item);
    },
    click_show_qa(index) {
      this.show_qa = this.show_qa == index ? 0 : index;
    },
  }
};
</script>

<style scoped>
@import "/assets/scss/index/how_to_select.scss";
</style>
