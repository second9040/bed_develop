<template lang="pug">
  #about_us.about_us.other_page
    .container
      .main_section
        .container
          .breadcrumb_content
            ul
              li(@click="goto('home')")
                a(href='javascript: void(0)') 首頁
              li 關於我們
              li 職人客製
          .row
            .col-md-12
              h2.page_title 職人客製
              .feature_tab_div
                .feature_item(
                  v-for="(f, index) in features"
                  :class="{'active': selected_tab == index}"
                  @click="selected_tab = index"
                )
                  .img_container
                    img(:src="getImgByIndex(index)")
                  .title {{ f.title }}
                .card_div
                  .img_container
                    img(:src="getImagePath('/assets/images/about_us/custom/custom_icon0' + (selected_tab + 1) + '.svg')")
                  .tab_desc 
                    .title_div.d-flex
                      h3.title {{ features[selected_tab].title }}
                      .en {{ features[selected_tab].en }}
                    .desc(
                      v-html="features[selected_tab].desc"
                    )
                    .sizeObj(v-if="features[selected_tab].en == 'Size'")
                      .size_info(v-for="sizeItem in features[selected_tab].sizeObj")
                        .size(v-for="size in sizeItem")
                          span {{ size }}
                    .desc(
                      v-if="features[selected_tab].en == 'Size'"
                      v-html="features[selected_tab].desc2"
                    )
                    .stepper(v-if="features[selected_tab].en == 'Hardness'")
                      each label in ['超軟', '軟', '偏軟', '適中', '偏硬', '硬', '超硬']
                        .step
                          .circle
                          .line
                          .label #{label}
                    .material_div(v-if="features[selected_tab].en == 'Color of Cloth'")
                      .item(v-for="m in features[selected_tab].material_obj")
                        .material {{ m.material }}
                        .desc {{ m.desc }}


              h2.page_title 客製化流程
              .customize_process_div
                .process_item_div(v-for="(item, index) in custom_process_obj")
                  .process_item
                    .img_container 
                      img(:src="getImagePath('/assets/images/about_us/custom/process' + (index + 1) + '.png')")
                    h3.title {{ item.title }}
                    .desc {{ item.desc }}
                  .arrow(:class="{'last': index == custom_process_obj.length - 1}")
                    i.bi.bi-chevron-right
              
              .finish_time_card 
                .title 客訂製完成時間
                .type_div
                  .type 一般客訂製 
                  .desc 下訂後約7-9天，就能送到府上唷！
                .type_div
                  .type 特殊客訂製
                  .desc 特殊材質、材型，製作時程，請加LINE詢問小編，或到現場試躺詢問。

              h2.meet_your_need 完美符合您所需
              .meet_your_need_div
                .left
                  .img_container 
                    img(:src="getImagePath('/assets/images/about_us/custom/meet_your_need.png')")
                .right
                  h3 家裡太小怎麼辦?!
                  .desc 35歲的A小姐，終於在太平買下第一間夢想中的屋子，但是新臥室太小了，放下床以後就剩下走道而已，來到御品為臥室購入新床時，將這個煩惱告訴了師傅，於是，師傅就為A小姐量身打造，抽屜數量多、且剛好符合走道空間，甚至巧妙避開牆面...
                  button.viewMore.button.btn.btn-outline-primary(type="button" @click="viewMore()") 了解更多



                
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
      features: [
        {
          title: "人體工學",
          en: "Ergonomics",
          desc: "每個人的身型不一，製床所能依照個人的人體工學、舒適感受，進行客製或找到專屬於你的床墊平衡。<br>曾服務過有腰傷的勞工，長期久坐的上班族，身高超過200公分的大學生，睡眠習慣改變的對象等等，為了個人個體的身型，進行量身訂製。"
        },
        {
          title: "尺寸客製",
          en: "Size",
          desc: "床墊配合床架，有幾種常規尺寸：",
          desc2: "美式、歐式、日式的床架引進台灣後，即需要訂製專屬床架規格尺寸的床墊。我們也可訂製床架！",
          sizeObj: [
            ["3.5x6.2尺", "單人加大", "105x188cm"],
            ["5x6.2尺", "標準雙人", "152x188cm"],
            ["6x6.2尺", "雙人加大", "182x188cm"],
            ["6x7尺", "超大雙人", "180x212cm"],
          ]
        },
        {
          title: "軟硬客製",
          en: "Hardness",
          desc: "軟硬度依據彈簧材質軟硬度，加上主襯如天然乳加、矽膠等，以及表布材質等疊加呈現。可依照個人需求與感受，提供7個級距的軟硬度，給您挑選。歡迎來門市試躺，專人為你講解。"
        },
        {
          title: "表布客製",
          en: "Color of Cloth",
          desc: "御品準備了質感由中、高到頂級的布料，花色多元，機能多樣，感受皆有不同之處，歡迎體驗。",
          material_obj: [
            { material: "材質", desc: "Color of Cloth" },
            { material: "表布", desc: "頂級天絲／日本涼感紗／棉布／親膚布／藤席…" },
            { material: "顏色", desc: "天絲白、黃、藍白／棉質灰、白／親膚蘆薈白…" },
          ]
        },
        {
          title: "造型客製",
          en: "Shape",
          desc: "除了常規的方形款式，御品訂製過汽車旅館的圓形床墊、露營車內梯形床墊、邊間套房的三角形床墊等等。若有需求，歡迎來店與我們討論。"
        },
        {
          title: "周邊客製",
          en: "Others",
          desc: "除了床墊以外，床頭、床板、抽屜、掀床等，專業評估後，都可以依照客戶需求訂製。不管你的臥室大小、形狀，還是你的需求有多特別，御品都能滿足你。"
        },
      ],
      custom_process_obj: [
        {
          title: "丈量",
          desc: "請先丈量房間、床架長寬、床頭與牆壁的距離等尺寸。床附近家具之間的距離如有考量，也麻煩丈量。",
        },
        {
          title: "需求",
          desc: "請先丈量房間、床架長寬、床頭與牆壁的距離等尺寸。床附近家具之間的距離如有考量，也麻煩丈量。",
        },
        {
          title: "試躺",
          desc: "請先丈量房間、床架長寬、床頭與牆壁的距離等尺寸。床附近家具之間的距離如有考量，也麻煩丈量。",
        },
        {
          title: "製作",
          desc: "請先丈量房間、床架長寬、床頭與牆壁的距離等尺寸。床附近家具之間的距離如有考量，也麻煩丈量。",
        },
        {
          title: "運送",
          desc: "請先丈量房間、床架長寬、床頭與牆壁的距離等尺寸。床附近家具之間的距離如有考量，也麻煩丈量。",
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
