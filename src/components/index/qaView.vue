<template lang="pug">
    section#how_select.faq.section.pt-4
        .container
          div.how_to_select_div
            .container
              .row
                .col-4.qa_intro.position-relative
                  .text
                    h2 挑選你的靈魂床墊
                    h2 就找製床所
                  .qa_img_container.pc
                    img.qa_intro_bg(src="/assets/images/index/qa_intro_bg.png")

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
                            p(v-html="item.ans")
                          .arrow_right
                    a.contact_div(href="https://lin.ee/PXa9fwy" target="_blank")
                      .left 
                        h3 你是否還有其他疑問？
                        h6 床的問題，製床所有方法，為你打造專屬你的靈魂床墊！
                      .divider
                      .right.d-flex.align-items-center
                        img.line_icon(src="/assets/images/line_icon.png") 
                        h6.mx-2.font-bold.contact 來聊聊
                    img.qa_img_container.mobile(src="/assets/images/index/qa_intro_bg.png")
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
      qa_obj: [
        {
          question: "我家床架尺寸比較特別，能做客製化尺寸嗎？",
          ans: `<p>
            <strong>當然可以！</strong><br>
            我們知道每個家的需求都不同，<strong>不論是加大、加寬，還是特殊造型(三角形/正方形)的床墊</strong>，都能客製化生產。我們也提供<strong>免費丈量服務，由專人到府精準測量</strong>，確保每一張床墊與您的空間完美貼合。
          </p>`
        },
        {
          question: "我喜歡軟一點的床，但家人偏好硬床，怎麼辦？",
          ans: `<p>
            每個人的體感舒適度都不同，我們提供<strong>軟硬度、支撐度多種規格皆可挑選</strong>，甚至可以為您打造一張床墊。從選材、床墊結構到舒適層，每個細節都為您層層把關，讓每位家人都睡得安心。
          </p>`
        },
        {
          question: "怎麼確定我選到的床墊真的適合我？會不會後悔？",
          ans: `<p>
            我們提供<strong>一對一專業諮詢</strong>，了解您的睡眠習慣、需求、過往床墊經驗，推薦最適合的結構與材質組合。更重要的是，我們所有材料來源<strong>皆可追溯</strong>，從彈簧到乳膠層層檢驗，每一張床墊都經過嚴格品質把關，只為讓您睡得值得。
          </p>`
        },
        {
          question: "住家是老公寓，搬運床墊會不會很麻煩？",
          ans: `<p>
            無論您住公寓有無電梯、樓梯窄、空間轉角多，我們的安床團隊都有經驗處理。提供<strong>專人運送＋安裝服務</strong>，從進門、拆包裝、安裝定位到清潔收尾，全程專業處理，不讓您動一根手指。特殊環境也可預約<strong>可折式床墊設計</strong>，搬運過程不會損壞床墊。
          </p>`
        }
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
