<template lang="pug">
  .col-lg-9.col-md-12.tabIntro
    .tabs
      ul.nav
        li.nav-item(
          v-for="(tab_obj, index) in item.tab_content" 
          :key="index" 
          @click="scrollToTab(index)"
          :class="{ active: activeTab === index + 1 }"
        ) {{ tab_obj.tab }}
        
        hr.tab_bottom_line.mt-0

        // tab + 列出所有圖片 + 滾動
        template(v-if="item.tab_behavior == 'scroll' && item.image_intro.length > 0")
          .tab-content-image(
            v-for="(img, index) in item.image_intro" 
            :id="`tab-${index+1}`"
            :key="`img-${index}`"
          )
            img.w-100(:src="getImagePath(img)" :alt="item.tab_content[index].tab")

        // tab + 點擊呈現指定圖片
        template(v-else-if="item.image_intro.length > 0")
          .tab-content-image
            img.w-100(:src="getImagePath(item.image_intro[activeTab - 1])" :alt="item.tab_content[activeTab - 1].tab")

        .tab-content-text(v-else)
          // 商品特色 床墊尺寸
          .tab_content#tab-1
            .main_content(v-html="item.tab_content[0].main")
            .secondary_content.d-flex
              .left
                .list(v-for="list in item.tab_content[0].secondary")
                  h6 {{ list.title }}
                  p {{ list.desc }}

              .right
                img(:src="getImagePath(item.tab_content[0].img)" :alt="item.tab_content[0].tab")

          // 床墊結構
          .tab_content.tab2#tab-2
            .main_content(v-html="item.tab_content[1].main")
            .main_img
              img(:src="getImagePath(item.tab_content[1].mainImg)" :alt="item.tab_content[1].tab")
            .feature_div.d-flex
              .feature_item(v-for="f in item.tab_content[1].feature")
                img(:src="getImagePath(f.img)" :alt="f.title")
                .text_div
                  h4 {{ f.title }}
                  p {{ f.desc }}
            
            .bottom_div.d-flex(v-if="item.tab_content[1].bottom")
              .left
                h4 {{ item.tab_content[1].bottom.title }}
                p(v-html="item.tab_content[1].bottom.desc")
              .right 
                img(:src="getImagePath(item.tab_content[1].bottom.img)" :alt="item.tab_content[1].bottom.title")

      
          .tab_content#tab-3
            .main_content(v-html="item.tab_content[2].main")
            .secondary_content.d-flex
              .left
                .list(v-for="list in item.tab_content[2].secondary")
                  h6 {{ list.title }}
                  p {{ list.desc }}
              .right
                img(:src="getImagePath(item.tab_content[2].img)" :alt="item.tab_content[2].tab")


    .deliverService
      h4 製床所配送服務
      .imgDiv.d-flex(v-if="deliver")
        img(
          v-for="img in deliver.img" 
          alt="deliver" 
          :src="getImagePath(img)"
        )
      .desc(
        v-if="deliver"
        v-html="deliver.desc"
      )

</template>

<script>
const require = (imgPath) => {
  try {
    let check_url = location.href.includes("bed_develop") ? "/bed_develop/" : "/..";
    const handlePath = imgPath.replace("@", "../.." + check_url);
    return new URL(handlePath, import.meta.url).href
  } catch (err) {
    console.warn(err)
  }
}


export default {
  name: 'tabIntro',
  components: {
  },
  data() {
    return {
      activeTab: 1,
      content: null,
      deliver: null,
    }
  },
  props: {
    item: {
      type: Object,
    },
  },
  methods: {
    getImagePath(img) {
      return require(`@/${img}`)
    },
    selectTab(index) {
      // this.content = this.item.tab_content[index];
      this.activeTab = index + 1
    },
    scrollToTab(index) {
      if (this.item.tab_behavior !== 'scroll') {
        this.selectTab(index);
        return;
      }
      this.activeTab = index + 1; // 還是可以記錄目前點的是哪個 tab

      // 延遲一點等DOM更新
      this.$nextTick(() => {
        const el = document.getElementById(`tab-${index + 1}`);
        if (el) {
          const headerOffset = 100; // 你的固定 header 高度
          const elementPosition = el.getBoundingClientRect().top + window.scrollY;
          const offsetPosition = elementPosition - headerOffset;

          window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth', // 平滑滾動，會比較舒服
          });
        }
      });
    },
  },
  mounted() {
    this.activeTab = 1; // 預設 highlight 第1個 tab
    this.deliver = this.item.deliverService
  },
}
</script>

<style scoped>
@import '/assets/scss/common.scss';
@import '/assets/scss/product/detail/tab_intro.scss';
</style>