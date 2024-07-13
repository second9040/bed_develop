<template lang="pug">
  .col-lg-9.col-md-12.tabIntro
    .tabs
      ul.nav
        li.nav-item(
          v-for="(tab_obj, index) in item.tab_content" 
          :key="index" 
          @click="selectTab(index)"
          :class="{ active: activeTab === index + 1 }"
        ) {{ tab_obj.tab }}
        
        hr.tab_bottom_line.mt-0

        // 商品特色
        .tab_content(v-if="content && activeTab == 1")
          .main_content(v-html="content.main")
          .secondary_content.d-flex
            .left
              .list(v-for="list in content.secondary")
                h6 {{ list.title }}
                p {{ list.desc }}

            .right
              img(:src="getImagePath(content.img)" :alt="content.tab")

        // 床墊結構
        .tab_content.tab2(v-if="content && activeTab >= 2")
          .main_content(v-html="content.main")
          .main_img
            img(:src="getImagePath(content.mainImg)" :alt="content.tab")
          .feature_div.d-flex
            .feature_item(v-for="f in content.feature")
              img(:src="getImagePath(f.img)" :alt="f.title")
              .text_div
                h4 {{ f.title }}
                p {{ f.desc }}
          
          .bottom_div.d-flex(v-if="content && content.bottom")
            .left 
              h4 {{ content.bottom.title }}
              p(v-html="content.bottom.desc")
            .right 
              img(:src="getImagePath(content.bottom.img)" :alt="content.bottom.title")
    
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
    const handlePath = imgPath.replace('@', '../..')
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
      this.content = this.item.tab_content[index];
      this.activeTab = index + 1
    },
  },
  mounted() {
    this.selectTab(0);
    this.deliver = this.item.deliverService
  },
}
</script>

<style scoped>
@import '@/assets/scss/common.scss';
@import '@/assets/scss/product/detail/tab_intro.scss';
</style>