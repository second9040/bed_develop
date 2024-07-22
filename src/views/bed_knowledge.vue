<template lang="pug">
  #bed_knowledge.bed_knowledge.other_page
    .container
      .main_section
        .container
          .breadcrumb_content
            ul
              li(@click="goto('home')")
                a(href='javascript: void(0)') 首頁
              li 床墊知識
          .row
            .col-md-12
              h2.page_title 床墊知識

              .know_list_div
                .know_item(
                  v-for="(know, index) in know_list"
                  @click="showDetail(know)"
                )
                  .img_container
                    img(:src='getImagePath(know.img)' :alt='know.title')
                  .text_div
                    h4 {{ know.title }}
                    p.know_date {{ know.date }}
                    p.desc(v-html="know.desc")
                    .tag_div 
                      .tag(v-for="tag in know.tag") {{ tag }}
                    
              #pagination.pagination_style.pagination.justify-content-center
                ul.d-flex
                  li
                    a(href='#')  &lt;&lt; 
                  li
                    a(href='#') 1
                  li
                    a.current(href='#') 2
                  li
                    a(href='#') 3
                  li
                    a(href='#') 4
                  li
                    a(href='#') 5
                  li
                    a(href='#') &gt;&gt;

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

const temp_detail = `
<div>
  <h4>獨立筒床墊缺點1：獨立筒床墊都很軟？</h4>
    <p>很多人可能都會認為傳統連結式彈簧比較硬、比較耐用，獨立筒床墊相對比較軟，較不耐用，這種講法某種程度上是正確的，但並不完全正確。</p>
    <ul>
      <li>獨立筒床墊的適用對象範圍比傳統連結式床墊更廣，從年輕女性到成年男性都適合，尤其在舒適感與健康的平衡表現，獨立筒彈簧床能在不影響脊椎變形的前提下，獨立筒更為柔軟舒適。</li>
      <li>每一種彈簧床都有軟硬度最佳適應範圍，連結式彈簧床與獨立筒彈簧床各有其特點，沒有哪一種一定特別好，只有適合度的分別。</li>
    </ul>
    <div class="img_container">
      <img src="/assets/images/bed_knowledge/know_detail_temp1.png">
    </div>
    <p>傳統連結式床墊更適合體重破百的偏重人體使用，因為彈力足、體感偏硬能提供足夠的支撐，相對於獨立筒床墊更適合絕大多數男女使用，即使小孩也能夠適用。</p>
    <p>那麼傳統連結式床墊更耐用嗎？這與使用者有關。一位超過 100 公斤的使用者使用傳統連結式彈簧床和 50 公斤使用者使用獨立筒，很難說連結式彈簧床會使用更久。</p>
    <p>相同體重的使用者分別使用這兩種床墊時，傳統連結式床墊確實能夠更耐用。因為其彈簧結構是串連是分擔人體體重，透過串簧分配到彈簧。而獨立筒則是個別承重，因此時間拉長的情況下，獨立筒可能在局部區域會容易出現形變較大的現象。</p>
    <p>獨立筒床墊都很軟？這個質疑並不正確。藉由調整彈簧鋼線粗細以及彈簧大小，就能塑造出獨立筒床墊不同的硬度。線徑 2.4mm 的獨立筒，可以從圈徑 5 公分到 7 公分，可以讓體感達到 7 ~ 8 硬度，這已經與連結式彈簧相近，因此更好的說法是，連結式彈簧床更擅長提供硬式體感，對於超重使用者，其支撐力居於各種彈簧床之冠。</p>
</div>
`;
export default {
  name: "bed_knowledge",
  data() {
    return {
      know_list: [
        {
          title: "1獨立筒床墊缺點你真的了解嗎？深入解讀獨立筒彈簧床的美麗與哀愁",
          date: "2024 / 06 / 24",
          desc: "網路上有很多文章的說法指出獨立筒床墊缺點，尤其是與連結式彈簧床相比較。這些觀點有些值得深入討論，例如：獨立筒床墊都很軟、獨立筒床墊容易凹陷、Q彈感不如彈簧床、四周支撐性差。有些觀點嚴重誤解，例如：透氣性較差、容易因為摩擦，破損產生異音。",
          img: "/assets/images/discount/discount_1130105.jpg",
          tag: ["#獨立筒", "#彈簧床", "#床墊迷思"],
          detail: temp_detail
        },
        {
          title: "2獨立筒床墊缺點你真的了解嗎？深入解讀獨立筒彈簧床的美麗與哀愁",
          date: "2024 / 05 / 23",
          desc: "網路上有很多文章的說法指出獨立筒床墊缺點，尤其是與連結式彈簧床相比較。這些觀點有些值得深入討論，例如：獨立筒床墊都很軟、獨立筒床墊容易凹陷、Q彈感不如彈簧床、四周支撐性差。有些觀點嚴重誤解，例如：透氣性較差、容易因為摩擦，破損產生異音。",
          img: "/assets/images/discount/discount_1130105.jpg",
          tag: ["#獨立筒1", "#彈簧床", "#床墊迷思"],
          detail: temp_detail
        },
        {
          title: "3獨立筒床墊缺點你真的了解嗎？深入解讀獨立筒彈簧床的美麗與哀愁",
          date: "2024 / 03 / 24",
          desc: "網路上有很多文章的說法指出獨立筒床墊缺點，尤其是與連結式彈簧床相比較。這些觀點有些值得深入討論，例如：獨立筒床墊都很軟、獨立筒床墊容易凹陷、Q彈感不如彈簧床、四周支撐性差。有些觀點嚴重誤解，例如：透氣性較差、容易因為摩擦，破損產生異音。",
          img: "/assets/images/discount/discount_1130105.jpg",
          tag: ["#獨立筒", "#彈簧床", "#床墊迷思"],
          detail: temp_detail
        },
        {
          title: "4獨立筒床墊缺點你真的了解嗎？深入解讀獨立筒彈簧床的美麗與哀愁",
          date: "2024 / 01 / 04",
          desc: "網路上有很多文章的說法指出獨立筒床墊缺點，尤其是與連結式彈簧床相比較。這些觀點有些值得深入討論，例如：獨立筒床墊都很軟、獨立筒床墊容易凹陷、Q彈感不如彈簧床、四周支撐性差。有些觀點嚴重誤解，例如：透氣性較差、容易因為摩擦，破損產生異音。",
          img: "/assets/images/discount/discount_1130105.jpg",
          tag: ["#獨立筒", "#彈簧床", "#床墊迷思"],
          detail: temp_detail
        },
        {
          title: "5獨立筒床墊缺點你真的了解嗎？深入解讀獨立筒彈簧床的美麗與哀愁",
          date: "2023 / 06 / 24",
          desc: "網路上有很多文章的說法指出獨立筒床墊缺點，尤其是與連結式彈簧床相比較。這些觀點有些值得深入討論，例如：獨立筒床墊都很軟、獨立筒床墊容易凹陷、Q彈感不如彈簧床、四周支撐性差。有些觀點嚴重誤解，例如：透氣性較差、容易因為摩擦，破損產生異音。",
          img: "/assets/images/discount/discount_1130105.jpg",
          tag: ["#獨立筒", "#彈簧床", "#床墊迷思"],
          detail: temp_detail
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
    showDetail(obj) {
      this.$router.push({
        name: 'bed_knowledge_detail',
        state: {
          know_id: obj.bed_knowledge_id,
          know_obj: JSON.stringify(obj)
        },
      })
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
@import "/assets/scss/bed_knowledge.scss";
</style>