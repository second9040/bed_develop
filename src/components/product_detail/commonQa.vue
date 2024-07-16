<template lang="pug">
  .col-lg-9.col-md-12.common_qa
    .title_div.position-relative
      h4 購買常見問題

    .faq 
      .faq-container
        .position-relative(
          v-for="(item, index) in item.qa_obj"
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

    .d-flex.btn_container
      button.button.btn.btn-outline-primary(type="button" @click="goBack()") 返回列表

</template>
<script>

export default {
  name: "commonQa",
  components: {
  },
  props: {
    item: {
      type: Object,
    },
  },
  data() {
    return {
      show_qa: 1,
    }
  },
  mounted() {
  },
  methods: {
    click_show_qa(index) {
      this.show_qa = this.show_qa == index ? 0 : index;
    },
    goBack() {
      this.$router.push({
        name: 'product_list',
      })
      window.scrollTo({
        top: 0
      })
    },
  },
}
</script>

<style scoped>
@import '@/assets/scss/product/detail/common_qa.scss';
</style>
