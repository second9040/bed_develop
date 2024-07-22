<template lang="pug">
  .col-lg-5.col-md-12.item_detail
    h3 {{ item.name }}
    .hardness_degree.d-flex
      h4 床墊硬度
      .degree.d-flex.align-items-center
        .item(
          v-for="degree in 7"
          :class="{'active': degree <= item.hardness_degree}"
        )
    .desc
      ul
        li(v-for="desc in item.desc") {{ desc }}
    h3.price NT$ {{ addComma(item.price) }}
    .sizeDiv.d-flex.align-items-center
      h5 選擇尺寸
      multiselect.w-100(
        v-model="selected_size"
        :options="item.size_obj"
        :multiple="false"
        :allowEmpty="false"
        placeholder="尺寸需求，請在備註欄填寫"
        tagPlaceholder=""
        selectedLabel=""
        selectLabel=""
        selectGroupLabel=""
        deselectLabel=""
      )
        template(v-slot:noResult)
          span 查無選項

    .amountDiv.d-flex.align-items-center
      h5 選擇數量
      .w-100
        .number-input-container
          span.decrement(
            @click="changeAmount(-1)"
            :class="{'disabled': select_amount == 1}"
          )
            i.bi.bi-chevron-left
          input.number-input(
            type="number" 
            min="1"
            v-model="select_amount"
            @input="validateAmount"
          )
          span.increment(@click="changeAmount(1)")
            i.bi.bi-chevron-right

    .button_div.d-flex.align-items-center
      button.add_cart.button.btn.btn-outline-primary(type="button" @click="viewMore(item)") 加入購物車
      button.line_btn.button.btn.btn-outline-primary(type="button" @click="viewMore(item)") LINE即時了解

</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
  name: 'briefDesc',
  components: {
    Multiselect,
  },
  data() {
    return {
      screenWidth: 0,
      selected_size: '',
      select_amount: 1,
      mainSwiper: null,
    }
  },
  props: {
    item: {
      type: Object,
    },
  },
  methods: {
    addComma(num) {
      return String(num).replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ',')
    },
    changeAmount(val) {
      if (this.select_amount > 1 && val == -1) {
        this.select_amount -= 1
      } else if (val == 1) {
        this.select_amount += 1
      }
    },
    validateAmount() {
      const amount = this.select_amount;
      if (amount < 1) {
        this.select_amount = 1;
      } else if (amount > 99) {
        this.select_amount = 99;
      }
    },
    viewMore(item) {

    },
  },
  mounted() {
  },
}
</script>

<style>
@import 'vue-multiselect/dist/vue-multiselect.css';
</style>

<style scoped>
@import '/assets/scss/common.scss';
@import '/assets/css/product_temp/style.css';
@import '/assets/scss/product/product.scss';
@import '/assets/scss/product/product_list.scss';
@import '/assets/scss/product/detail/swiper_and_brief_desc.scss';
</style>
<style lang="scss">
#product_detail {
  .multiselect {
    &__tags {
    }
    &__input {
      font-size: 14px;
      margin-bottom: 0;
      vertical-align: center;
    }
    &__placeholder {
      color: var(--color1-blue);
      margin-bottom: 0;
      padding-top: 0;
      font-size: 14px;
      padding-left: 5px;
    }
    &__select {
      height: 20px;
      width: 20px;
      padding: 0;
      top: 15px;
      right: 5px;
    }
    &--active {
      & .multiselect__select {
        top: 10px;
        right: 13px;
      }
    }
  }
}
</style>
