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
            .divider
            .container
              .row
                .col-4.qa_intro.position-relative
                  .text
                    h2 挑選你的靈魂床墊
                    h2 就找製床所
                  .qa_img_container.pc
                    img.qa_intro_bg(src="../../assets/images/index/qa_intro_bg.png")

                .col-8.faq_obj.pb-4(data-aos='fade-up' data-aos-delay='200')
                  .faq-container
                    .position-relative(
                      v-for="(item, index) in qa_obj"
                      :class="{'faq-active': show_qa == (index + 1)}"
                      @click="click_show_qa(index + 1)"
                    )
                      .d-flex
                        .triangle_icon
                        .faq-item
                          h4 Q: {{ item.question}}
                          .faq-content
                            p {{ item.ans }}
                          .arrow_right
                    .contact_div
                      .left 
                        h3 你是否還有其他疑問？
                        h6 床的問題，製床所有方法，為你打造專屬你的靈魂床墊！
                      .divider
                      .right.d-flex.align-items-center
                        img.line_icon(src="../../assets/images/line_icon.png") 
                        h6.mx-2.font-bold.contact 來聊聊
                    img.qa_img_container.mobile(src="../../assets/images/index/qa_intro_bg.png")
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
  name: "qaView",
  props: {
  },
  data() {
    return {
      show_qa: 1,
      key_factor_obj: [
        {
          img: "assets/images/index/choose01.jpg",
          name: "支撐力",
          desc: "由彈簧的軟硬度和排列與數量影響，製床所有各種軟硬客製選擇。",
          href: "",
          color: "#53BDD7",
        },
        {
          img: "assets/images/index/choose02.jpg",
          name: "舒適度",
          desc: "符合人體工學，屁股腰椎交接處不懸空，使躺感更服貼舒服。",
          href: "",
          color: "#9EBB51",
        },
        {
          img: "assets/images/index/choose03.jpg",
          name: "感受性",
          desc: "不同材質的表步，透氣、排汗及涼爽程度不同，皆可自選。",
          href: "",
          color: "#53BDD7",
        },
      ],
      qa_obj: [
        {
          question: "先生上下床都會影響到我，但喜歡偏硬的床，有辦法解決嗎？",
          ans:
            "有的，可以參考我們的高碳鋼Q床，其中使用了專利研發的吸震材料，讓硬床也可以一夜好眠。也可以針對近一步需求，下方聊聊，打造你的靈魂床墊。",
        },
        {
          question: "學生租屋有便宜的床墊嗎？",
          ans:
            "當然有的，製床所可為你的出租套房，打造設計感統一，耐用且高CP值的出租床組。",
        },
        {
          question: "已經買獨立筒，為什麼還會腰痠背痛？",
          ans:
            "市售獨立筒床墊因結構方式容易讓彈簧分離，支撐力會因使用年限受限，可能因為結構分離，失去支撐力，使你腰痠背痛，歡迎下方聊聊，針對喜歡的軟硬與需求，打造你的靈魂床墊。",
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
@import "@/assets/scss/index/how_to_select.scss";
</style>
