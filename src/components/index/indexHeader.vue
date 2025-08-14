<template lang="pug">
  header#header.header.fixed-top
    .container.d-flex.align-items-center
      a.logo(@click="goto('home')")
        img.logo_header(src="/assets/images/logo_header.png")

      nav#navmenu.navmenu
        ul
          li(
              @click="goto('product_list', null, 'bed')" 
              @mouseenter="showSubmenu('bed')" 
              @mouseleave="hideSubmenu"
              
          )
            a.submenu-toggle(href="javascript: void(0)") 床墊
            //- div.submenu.multi-column(v-show="currentMenu === 'bed'")
            div.submenu.multi-column
              .submenu-column
                div.submenu-header
                  img.submenu-icon(src="/assets/images/index/headerIcon_hardness.png")
                  p 軟硬度
                ul
                  li(@click="goto('product_list', 'bed')") 
                    a(href="javascript: void(0)") 偏軟
                  li(@click="goto('product_list', 'bed')") 
                    a(href="javascript: void(0)") 軟有支撐
                  li(@click="goto('product_list', 'bed')") 
                    a(href="javascript: void(0)") 軟硬適中
                  li(@click="goto('product_list', 'bed')") 
                    a(href="javascript: void(0)") 硬有服貼
                  li(@click="goto('product_list', 'bed')") 
                    a(href="javascript: void(0)") 偏硬
              .submenu-column.left-bar
                div.submenu-header
                  img.submenu-icon(src="/assets/images/index/headerIcon_users.png")
                  p 使用族群
                ul
                  li(@click="goto('product_list', 'bed')") 
                    a(href="javascript: void(0)") 家用型
                  li(@click="goto('product_list', 'bed')") 
                    a(href="javascript: void(0)") 出租型
                  li(@click="goto('product_list', 'bed')") 
                    a(href="javascript: void(0)") 客製(軟硬／尺寸/表布)
              .submenu-column.left-bar
                div.submenu-header
                  img.submenu-icon(src="/assets/images/index/headerIcon_structure.png")
                  p 床墊結構
                ul
                  li(@click="goto('product_list', 'bed')") 
                    img.new_icon(src="/assets/images/index/headerIcon_new.png")
                    a(href="javascript: void(0)") 高強度*串聯式設計
                  li(@click="goto('product_list', 'bed')") 
                    a(href="javascript: void(0)") 獨立筒型彈簧

          li(
              @click="goto('product_list', null, 'bedstead')" 
              @mouseenter="showSubmenu('bedstead')" 
              @mouseleave="hideSubmenu"
          )
            a.submenu-toggle(href="javascript: void(0)") 床架/床頭櫃
            div.submenu(v-show="currentMenu === 'bedstead'")
              ul
                li(@click="goto('product_list', 'bedstead')") 
                  a(href="javascript: void(0)") 所有床墊
                li(@click="goto('product_list', 'bedstead')") 
                  a(href="javascript: void(0)") 家庭用床墊
                li(@click="goto('product_list', 'bedstead')") 
                  a(href="javascript: void(0)") 租屋用床墊
                li(@click="goto('product_list', 'bedstead')") 
                  a(href="javascript: void(0)") 嫁妝用床墊
          li(
              @click="goto('product_list', null, 'others')" 
              @mouseenter="showSubmenu('others')" 
              @mouseleave="hideSubmenu"
          )
            a.submenu-toggle(href="javascript: void(0)") 其他配件
            div.submenu(v-show="currentMenu === 'others'")
              ul
                li(@click="goto('product_list', 'others')") 
                  a(href="javascript: void(0)") 所有配件
                li(@click="goto('product_list', 'others')") 
                  a(href="javascript: void(0)") 其他配件1
                li(@click="goto('product_list', 'others')") 
                  a(href="javascript: void(0)") 其他配件2
          //- 目錄高亮的功能只有關於有做，因為其他頁面都還沒真的實作
          li.hasSub(
              @click="goto('about_us', null, 'about')" 
              @mouseenter="showSubmenu('about')" 
              @mouseleave="hideSubmenu"
              :class="{'active': check_main_active($route.name, 'about')}"
          )
            a.submenu-toggle(href="javascript: void(0)") 關於
            div.submenu(v-show="currentMenu === 'about'")
              ul
                li(
                  @click="goto('about_us')"
                  :class="{'sub_active': $route.name == 'about_us'}"
                ) 
                  a(href="javascript: void(0)") 製床所
                li(
                  @click="goto('about_feature')"
                  :class="{'sub_active': $route.name == 'about_feature'}"
                ) 
                  a(href="javascript: void(0)") 產品特色
                li(
                  @click="goto('about_buy_note')"
                  :class="{'sub_active': $route.name == 'about_buy_note'}"
                ) 
                  a(href="javascript: void(0)") 購物須知
          li(
            @click="goto('latestDiscount')"
            :class="{'active': $route.name == 'latestDiscount'}"
          )
            a(href="javascript: void(0)") 限時優惠
          li(
            @click="goto('bed_knowledge')"
            :class="{'active': $route.name == 'bed_knowledge'}"
          )
            a(href="javascript: void(0)") 床墊知識
          li(
            @click="goto('home', '#good_comment')"
          )
            a(href="javascript: void(0)") 好評分享
          li(
            @click="goto('experience_site')"
            :class="{'active': $route.name == 'experience_site'}"
          )
            a(href="javascript: void(0)") 體驗據點
        i.mobile-nav-toggle.d-xl-none.bi.bi-list
        .cart_div.mobile(@click="showCart(1)")
          img.cart_icon(src="/assets/images/cart_icon.png")
          .cart_items_count(
            :class="number_style()"
          ) {{ cart_item_total }}

      .d-flex.align-items-center.position-relative.justify-content-end
        .cart_div.pc(@click="showCart(1)")
          img.cart_icon(src="/assets/images/cart_icon.png")
          .cart_items_count(
            :class="number_style()"
          ) {{ cart_item_total }}

        a.btn-chatbed.pc(href="https://lin.ee/uvYHRcC" target="_blank")
          img.line_icon(src="/assets/images/line_icon.png")
          span 聊聊床墊
</template>
<script>
import { mapState, mapActions } from "vuex";

export default {
  name: "indexHeader",
  data() {
    return {
      currentMenu: null, // 目前顯示的選單
    };
  },
  computed: {
    ...mapState(["cart_item_total"]),
  },
  mounted() {
    this.selectedMenu(""); // 清除 Vuex 中的 selected_menu，這個是 header 用來判斷商品頁要顯示的商品列表

    this.checkSwiperLoaded();
    let check_url = location.href.includes("bed_develop") ? "/bed_develop" : "";
    this.loadExternalScript(check_url + "/js/index/bs_main.js").catch((err) => {
      console.error("Failed to load external script:", err);
    });
  },
  methods: {
    ...mapActions(["toggleCart", "selectedMenu"]),
    check_main_active(route_name, target_name) {
      if (!route_name) {
        return false;
      }
      return route_name.indexOf(target_name) > -1;
    },
    showSubmenu(menuName) {
      if (window.innerWidth > 1199) {
        this.currentMenu = menuName;
      }
    },
    hideSubmenu() {
      if (window.innerWidth > 1199) {
        this.currentMenu = null;
      }
    },
    loadExternalScript(src) {
      return new Promise((resolve, reject) => {
        const script = document.createElement("script");
        script.src = src;
        script.onload = () => resolve();
        script.onerror = () => reject(new Error(`Failed to load script ${src}`));
        document.head.appendChild(script);
      });
    },
    showCart(action) {
      this.toggleCart(action);
    },
    checkSwiperLoaded() {
      this.$emit("check-swiper-loaded");
    },
    number_style() {
      let count = this.cart_item_total;
      if (count > 9 && count <= 99) return "last_than_99";
      if (count > 99 && count <= 999) return "last_than_999";
      if (count > 999) return "last_than_9999";
    },
    goto(page, selected = null, mobile_submenu = null) {
      // 最外面的 li 會用 mobile_submenu 來判斷顯示
      if (mobile_submenu) {
        if (window.innerWidth < 1200) {
          if (this.currentMenu != mobile_submenu) {
            this.currentMenu = mobile_submenu;
          } else {
            this.currentMenu = null;
          }
        }
      } else {
        // 裡面的 li 用 selected 來讓下一頁判斷顯示
        this.selectedMenu(selected);
        this.$router.push({
          name: page,
        });
      }
    },
  },
};
</script>

<style>
@import "/assets/scss/index_header.scss";
</style>
