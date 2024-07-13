<template lang="pug">
  #latestDiscount.latestDiscount.other_page
    .page-header
      index-header
    .container
      .main_section
        .container
          .breadcrumb_content
            ul
              li
                a(href='/') 首頁
              li 即時優惠
          .row
            .col-md-12
              h2.page_title 即時優惠

              .discount_content_div
                .discount_item(
                  v-for="(discount, index) in discount_list"
                  @click="showDetail(discount)"
                )
                  .img_container
                    img(:src='getImagePath(discount.img)' :alt='discount.title')
                  .text_div
                    h4 {{ discount.title }}
                    p.desc(v-html="truncateText(discount.desc)")
                    
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
    .page-footer
      index-footer    
    cart-aside

    // Scroll Top
    a#scroll-top.scroll-top.d-flex.align-items-center.justify-content-center(href="#")
      i.bi.bi-chevron-up
</template>

<script>
import { mapState, mapActions } from "vuex";

import indexHeader from "@/components/index/indexHeader.vue";
import indexFooter from "@/components/index/indexFooter.vue";
import cartAside from "@/components/cartAside.vue";

const require = (imgPath) => {
  try {
    const handlePath = imgPath.replace("@", "..");
    return new URL(handlePath, import.meta.url).href;
  } catch (err) {
    console.warn(err);
  }
};

export default {
  name: "latestDiscount",
  components: {
    indexHeader,
    indexFooter,

    cartAside,
  },
  data() {
    return {
      discount_list: [
        {
          title: "聖誕限定超「值」豪禮",
          desc: "大吉大利「禮卷」龍厚禮啦!!<br><br> 🐲#好運攏總來 #五福臨門送給你🎉<br><br> #新光三越禮卷 <br> #中友百貨禮卷 <br> #遠百百貨禮卷 <br> 就是要把最好的 #龍厚禮啦.ᐟ.ᐟ<br><br> ⚡我們致力於打造 #客製化夢想床墊<br> 新年立刻擁有一張好床，讓你整年都一路發ᐟ.發ᐟ.發.ᐟ.ᐟ<br> 奉上懶人包 眾多滿額贈💝<br> 🤲現在起—除夕前<br> 👉滿28,888贈<br> #中友百貨2000元禮券<br> 👉滿38,888贈<br> #遠東百貨3000元禮券<br> 👉滿58,888贈<br> #新光三越5000元禮券<br> ※以上活動擇一兌換<br> ※禮卷開放於1/25(四)-2/7(三)間領取<br> #打造夢想床墊~<br> ☎️歡迎來電 04-23201861<br> 🏠門市試躺 #台中市北區忠明路234號<br> 🛍線上選購  https://www.imagingmattress.com/<br> 📲加LINE洽詢 https://lin.ee/KwKuDdB<br> <br> #製床所御品 #台中床墊 #台中床墊推薦 #乳膠床墊 #床墊寢具 #台中獨立筒 #硬式獨立筒 #客製化床墊 #職人手作 #聖誕優惠 #聰明消費 #精打細算",
          img: "assets/images/discount/discount_1130105.jpg",
          link: "#",
          discount_id: "1130105",
        },
        {
          title: "春遊必備_舒適PLUS",
          desc: "夏天太熱睡不著?<br>御柴推薦<br><br>宇宙無敵超級涼感抗暑床墊❄<br>山海最強台灣天然手工竹席❄<br>地表無敵南洋進口天然藤席❄<br><br> <br>不再害怕半夜被熱醒 <br>馬上享受沁涼睡眠品質 <br>就來御品製床所挑選吧！ <br><br>歡迎來電 04-23201861 <br>門市試躺 #台中市北區忠明路234號 Google Map：https://goo.gl/maps/zo6wGTvWbGLQfPeo6 <br>線上選購   <br>#製床所御品 #台中床墊 #台中床墊推薦 #乳膠床墊 #床墊寢具 #台中獨立筒 #硬式獨立筒 #客製化床墊 #職人手作#涼感床墊 #職人手做 #夏夜救星 #台中床墊專賣店",
          img: "assets/images/discount/discount_1120704.jpg",
          link: "#",
          discount_id: "1120704",
        },
        {
          title: "聖誕限定超「值」豪禮",
          desc: "2款床墊任您挑選<br>波浪系列-乳膠薄墊，極致Q彈，不易塌陷，春遊舒適感，全都就交給它。<br>雲朵系列-獨立筒薄墊，高密度獨立筒，互不干擾，極致睡感 怎麼跳都沒問題 !<br> 御柴貼心服務：我們也可以客製化設計喲~尺寸/軟硬度/造型<br>隨心改變 打造夢想床墊~<br>#歡迎來電04-23201861　＃門市試躺 #台中市北區忠明路234號",
          img: "assets/images/discount/discount_1120221.jpg",
          link: "#",
          discount_id: "1120221",
        },
        {
          title: "聖誕限定超「值」豪禮",
          desc: "我們致力於打造 #客製化夢想床墊<br> 新年立刻擁有一張好床，讓你整年都一路發發發<br> 奉上懶人包 眾多滿額贈",
          img: "assets/images/discount/discount_1130105.jpg",
          link: "#",
          discount_id: "1130105",
        },
        {
          title: "聖誕限定超「值」豪禮",
          desc: "聖誕限定超「值」豪禮<br>我們致力於打造 #客製化夢想床墊<br>新年立刻擁有一張好床，讓你整年都一路發發發<br>奉上懶人包 眾多滿額贈",
          img: "assets/images/discount/discount_1120704.jpg",
          link: "#",
          discount_id: "1120704",
        },
        {
          title: "聖誕限定超「值」豪禮",
          desc: "聖誕限定超「值」豪禮<br>我們致力於打造 #客製化夢想床墊<br>新年立刻擁有一張好床，讓你整年都一路發發發<br>奉上懶人包 眾多滿額贈",
          img: "assets/images/discount/discount_1120221.jpg",
          link: "#",
          discount_id: "1120221",
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
    truncateText(text) {
      if (text.length > 60) {
        text = text.slice(0, 60) + '...<span class="read-more">more</span>';
        // 避免截到 html 標籤
        text = text.replace('<...', '...')
                    .replace('<b...', '...')
                    .replace('<br...', '...')
      }

      return text;
    },
    showDetail(obj) {
      this.$router.push({
        name: 'discount_detail',
        state: {
          discount_id: obj.discount_id,
          discount_obj: JSON.stringify(obj)
        },
      })
    },
  },
  mounted() {
  },
};
</script>

<style scoped>
@import "@/assets/scss/common.scss";
@import "@/assets/scss/latestDiscount/latestDiscount.scss";
</style>