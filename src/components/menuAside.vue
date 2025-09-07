<template lang="pug">
.col-lg-3.col-md-12
  aside.sidebar_widget.pc
    .widget_inner
      .widget_list.widget_categories
        h2.text-center(v-if="selectedMenuText == '床墊'") {{ selectedMenuText }}分類
        h2.text-center(v-else) {{ selectedMenuText }}
        hr
        nav.sidebar-filters
          ul.section-list
            li.section(v-for="sec in asideMenu" :key="sec.key")
              // Header（點擊可收合）
              button.section-header(type="button" @click="$emit('toggle', sec.key)")
                img.icon(:src="getImagePath(sec.icon)" :alt="sec.title")
                span.title {{ sec.title }}
                span.bi(:class="{ 'bi-chevron-up': isOpen(sec.key), 'bi-chevron-down': !isOpen(sec.key) }")

              // 內容（可收合）
              transition(name="collapse")
                ul.items(v-show="isOpen(sec.key)")
                  li.item(v-for="(it, idx) in sec.items" :key="idx")
                    img.new_icon(
                      v-if="it.new === true"
                      src="/assets/images/index/headerIcon_new.png"
                    )
                    a.item-link(
                      href="javascript:void(0)"
                      @click.prevent="$emit('select', { title: sec.title, key: sec.key, index: idx })"
                      :class="{ active: isActive(sec.key, it) }"
                    ) {{ it.text }}
</template>

<script setup>
// 最小改動：把父層現有的 function 直接當 props 傳進來用
const props = defineProps({
  asideMenu: { type: Array, required: true },
  selectedMenuText: { type: String, required: true },
  isOpen: { type: Function, required: true },
  isActive: { type: Function, required: true },
  getImagePath: { type: Function, required: true },
});
defineEmits(["toggle", "select"]);
</script>

<style scoped>
@import "/assets/scss/common.scss";
@import "/assets/scss/product/product.scss";
@import "/assets/scss/product/product_list.scss";
@import "/assets/css/product_temp/style.css";
</style>
