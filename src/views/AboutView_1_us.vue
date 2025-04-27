<template lang="pug">
  #about_us.about_us.other_page
    .container
      .main_section
        .container
          .breadcrumb_content
            ul
              li(@click="goto('home')")
                a(href='javascript: void(0)') 首頁
              li 關於
              li 製床所
          .row
            .col-md-12
              h2.page_title 製床所
              .feature_tab_div
                .card_div
                  .tab_desc 
                    .title_div.d-flex
                      h3.title {{ what_we_are[selected_tab].title }}
                    .desc(
                      v-html="what_we_are[selected_tab].desc"
                    )

              h2.page_title 為什麼選擇製床所
              .desc.text-center 御品製床所以60年彈簧起家，掌握床墊的靈魂，在台中深耕，獲得廣大好評，最了解消費者需求的床墊品牌，主要訴求為「在地、實在、厚道、溫暖、放心」

              .customize_process_div
                .process_item_div(v-for="(item, index) in custom_process_obj")
                  .process_item
                    .img_container 
                      img(:src="getImagePath('/assets/images/about_us/custom/process' + (index + 1) + '.png')")
                    h3.title
                      span.title_1 {{ item.title_1 }}
                      span {{ item.title_2 }}
                    .desc {{ item.desc }}

          .row
            .col-md-12
              .persist_tab_div
                .big_title 我們的理念
                .persist_item(
                  v-for="(persist, index) in persists"
                )
                  .card_div
                    .tab_desc 
                      .title_div.d-flex
                        h3.title {{ persist.title }}
                      .desc(
                        v-html="persist.desc"
                      )
                
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
  name: "about_us",
  data() {
    return {
      selected_tab: 0,
      what_we_are: [
        {
          title: "製床所是什麼?",
          desc: "製床所與您一起追求美好的生活品質，透過專業的試躺，開啟專屬於您的睡眠對話，每一張靈魂床墊皆來自專業的製床技術與職人精神，手工製更代表了我們注重每一個細節。<br>製床所代工過成千上萬的床墊， 始終相信，每一張床墊皆具備獨一無二的靈魂！透過更深層的睡眠對話， 讓製床所與您一起打造專屬於您的靈魂床墊，讓每一個夜晚都能安心好眠！"
        },
      ],
      persists: [
        {
          title: "量身打造靈魂床墊",
          desc: "每個人都是獨一無二的，甚至連身體結構也各不相同，因此，您的床墊和睡眠需求同樣獨特。御品製床所專注於為您製作屬於您的靈魂床墊，這不僅是一張床墊，而是專為您量身定制的睡眠伴侶，能完美契合您的身體結構，讓您在休息中充分發揮其舒適與支撐的功效。"
        },
        {
          title: "傳統工藝精湛技術",
          desc: "憑藉60年的傳統彈簧工藝和10年的門市經驗，我們的專業職人以精湛的手作技術，打造出獨特的靈魂床墊。每一個製程都經過細緻打磨，賦予床墊溫暖與情感，並體現我們對品質的堅持。作為Pro級床業製造商，我們超越市場標準，致力於創造符合您需求的床墊，讓您享受無與倫比的睡眠體驗。"
        },
        {
          title: "專業服務貼心規劃",
          desc: "我們深知，良好的睡眠不僅依賴醫療手段，更需要合適的寢具和床墊。專業的門市顧問將在接待過程中，深入剖析靈魂床墊的成分與結構，透過細緻且貼心的問答，全面了解您的睡眠需求，為您提供最適合的解決方案。"
        },
        {
          title: "滿足您對睡眠的需求",
          desc: "只要您有需求，我們將全力以赴，解決與床墊及睡眠相關的各種問題，讓您體驗到我們用心的專業服務，享受每一夜的安穩與舒適。"
        },
      ],
      custom_process_obj: [
        {
          title_1: "在地",
          title_2: "的根基",
          desc: "我們的品牌深深扎根於台中，60年的歷史讓我們與這片土地建立了深厚的情感。這種在地的連結不僅是地理上的，更是文化和情感上的。我們的手作靈魂床墊，讓每一位顧客都能感受到品牌的親切與熟悉",
        },
        {
          title_1: "實在",
          title_2: "的承諾",
          desc: "品牌的實在性體現在我們對產品品質的嚴格把控上。我們不僅提供高品質的產品，也保證用料真材實料、童叟無欺。這種實在的態度讓顧客在選擇我們的產品時，感受到無與倫比的信任與安心。",
        },
        {
          title_1: "厚道",
          title_2: "的經營",
          desc: "我們始終秉持厚道的經營理念，尊重每一位顧客，誠實對待每一個交易。這種厚道的精神不僅增強了顧客的忠誠度，也讓我們贏得了良好的口碑。顧客知道，他們在這裡不僅是消費者，更是我們珍貴的朋友。",
        },
        {
          title_1: "溫暖",
          title_2: "的關懷",
          desc: "品牌的溫暖體現在我們對顧客的細心呵護上。我們希望每一位顧客都能在這裡感受到家的溫暖，無論是在產品介紹與設計還是售後服務中，我們都努力讓顧客感受到關懷與支持，讓他們的每一次選擇都充滿溫暖幸福感。",
        },
        {
          title_1: "放心",
          title_2: "的選擇",
          desc: "最終，我們希望讓每位顧客在選擇我們的產品時，都能感到放心。無論是產品的安全性、可靠性，還是我們的服務質量，品牌都致力於消除顧客的疑慮，讓他們在每一次的選擇中都能夠安心無慮。",
        },
      ]
    };
  },
  computed: {
    ...mapState(["clickShowCart", "showCartAside", "cart_items"]),
  },
  methods: {
    getImgByIndex(index) {
      let isGray = this.selected_tab == index ? '' : '_gray';
      return require(`@/assets/images/about_us/custom/custom_icon0${index + 1}${isGray}.svg`);
    },
    getImagePath(img) {
      return require(`@/${img}`)
    },
    viewMore() {

    },
    goto(page, hash = null) {
      this.$router.push({
        name: page,
        hash: hash,
      });
    },
  },
  mounted() {
  },
};
</script>

<style scoped>
@import "/assets/scss/common.scss";
@import "/assets/scss/about_us.scss";

</style>
<style scoped lang="scss">

.title_div {
  justify-content: center;
}

.about_us .card_div .tab_desc {
  border-left: 0;
  border-top: 0;
  width: 100%;
}

.customize_process_div .process_item_div .process_item {
  padding: 0 10px; 
  .title span {
    font-weight: bold;
    &.title_1 {
      text-decoration: underline;
    }
  }
}

.persist_tab_div {
  .big_title {
    text-align: center;
    margin: 0 auto 10px;
    font-size: 24px;
    border-bottom: solid 4px;
    width: fit-content
  }
  .persist_item {
    margin-bottom: 35px;
  }
}

</style>
