<template lang="pug">
  header#header.header.fixed-top
    .container.d-flex.align-items-center
      a.logo(@click="goto('home')")
        img.logo_header(src="/assets/images/logo_header.png")

      nav#navmenu.navmenu
        ul
          li(
              @click="goto('product_list', null, 'mattresses')" 
              @mouseenter="showSubmenu('mattresses')" 
              @mouseleave="hideSubmenu"
              
          )
            a.submenu-toggle(href="javascript: void(0)") 床墊
            //- div.submenu.multi-column(v-show="currentMenu === 'mattresses'")
            div.submenu.multi-column
              .submenu-column
                div.submenu-header
                  img.submenu-icon(src="/assets/images/index/headerIcon_hardness.png")
                  p 軟硬度
                ul
                  li(@click="goto('product_list', '#s_1', null, 'mattresses', 'hardness', 'soft')") 
                    a(href="javascript: void(0)") 偏軟
                  li(@click="goto('product_list', '#s_2', null, 'mattresses', 'hardness', 'soft_with_support')") 
                    a(href="javascript: void(0)") 軟有支撐
                  li(@click="goto('product_list', '#m_1', null, 'mattresses', 'hardness', 'medium_hardness')") 
                    a(href="javascript: void(0)") 軟硬適中
                  li(@click="goto('product_list', '#h_1', null, 'mattresses', 'hardness', 'hard_and_sticky')") 
                    a(href="javascript: void(0)") 硬有服貼
                  li(@click="goto('product_list', '#h_2', null, 'mattresses', 'hardness', 'hard')") 
                    a(href="javascript: void(0)") 偏硬
              .submenu-column.left-bar
                div.submenu-header
                  img.submenu-icon(src="/assets/images/index/headerIcon_users.png")
                  p 使用族群
                ul
                  li(@click="goto('product_list', '#c_1', null, 'mattresses', 'users', 'home_use' )") 
                    a(href="javascript: void(0)") 家用型
                  li(@click="goto('product_list', '#c_2', null, 'mattresses', 'users', 'rental' )") 
                    a(href="javascript: void(0)") 出租型
                  li(@click="goto('product_list', '#c_3', null, 'mattresses', 'users', 'customized_h_s_f' )") 
                    a(href="javascript: void(0)") 客製(軟硬/尺寸/表布)
              .submenu-column.left-bar
                div.submenu-header
                  img.submenu-icon(src="/assets/images/index/headerIcon_structure.png")
                  p 床墊結構
                ul
                  li(@click="goto('product_list', '#cs', null, 'mattresses', 'structure', 'high_strength_series')") 
                    img.new_icon(src="/assets/images/index/headerIcon_new.png")
                    a(href="javascript: void(0)") 高強度*串聯式設計
                  li(@click="goto('product_list', '#ps', null, 'mattresses', 'structure', 'individual_spring')") 
                    a(href="javascript: void(0)") 獨立筒型彈簧

          li(
              @click="goto('product_list', null, 'bedframe')"
              @mouseenter="showSubmenu('bedframe')"
              @mouseleave="hideSubmenu"
          )
            a.submenu-toggle(href="javascript: void(0)") 床架/床頭櫃
            div.submenu.multi-column
              .submenu-column
                div.submenu-header
                  img.submenu-icon(src="/assets/images/index/bed_cabinet.png")
                  p 床頭片/櫃
                ul
                  li(@click="goto('product_list', '#wd_1', null, 'bedframe', 'bedside_table_cabinet', 'wooden_headboard')")
                    a(href="javascript: void(0)") 木質床頭片
                  li(@click="goto('product_list', '#wd_2', null, 'bedframe', 'bedside_table_cabinet', 'upholstered_headboard')")
                    a(href="javascript: void(0)") 軟墊床頭片
                  li(@click="goto('product_list', '#wd_3', null, 'bedframe', 'bedside_table_cabinet', 'bookshelf_shaped_bedside')")
                    a(href="javascript: void(0)") 書架型床頭
                  li(@click="goto('product_list', '#wd_4', null, 'bedframe', 'bedside_table_cabinet', 'storage_bedside_table')")
                    a(href="javascript: void(0)") 收納床頭櫃
              .submenu-column.left-bar
                div.submenu-header
                  img.submenu-icon(src="/assets/images/index/bed_stead.png")
                  p 床架
                ul
                  li(@click="goto('product_list', '#wd_5', null, 'bedframe', 'bedstead', 'hydraulic_bed_lift' )")
                    a(href="javascript: void(0)") 油壓式掀床架
                  li(@click="goto('product_list', '#wd_6', null, 'bedframe', 'bedstead', 'double_bed_frame' )")
                    a(href="javascript: void(0)") 雙拼式床架
                  li(@click="goto('product_list', '#wd_7', null, 'bedframe', 'bedstead', 'Japanese_style_wooden_leg_bed_frame' )")
                    a(href="javascript: void(0)") 日式木腳床架
              .submenu-column.left-bar
                div.submenu-header
                  img.submenu-icon(src="/assets/images/index/bed_set.png")
                  p 床組(含床頭)
                ul
                  li(@click="goto('product_list', '#lt_1', null, 'bedframe', 'bed_set', 'leather_solid_wood_steel_structure_bed_set')")
                    a(href="javascript: void(0)") 皮革實木鋼構床組
                  li(@click="goto('product_list', '#lt_2', null, 'bedframe', 'bed_set', 'leather_storage_steel_bed_set')")
                    a(href="javascript: void(0)") 皮革收納鋼構床組
          li(
              @click="goto('product_list', null, 'others')" 
              @mouseenter="showSubmenu('others')" 
              @mouseleave="hideSubmenu"
          )
            a.submenu-toggle(href="javascript: void(0)") 其他配件
            div.submenu(v-show="currentMenu === 'others'")
              ul
                li(@click="goto('home')") 
                  a(href="javascript: void(0)") 所有配件
                li(@click="goto('home')") 
                  a(href="javascript: void(0)") 其他配件1
                li(@click="goto('home')") 
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
    this.selectedMenu({ main_cat: "", cat: "", sub_cat: "" }); // 清除 Vuex 中的 selected_menu，這個是 header 用來判斷商品頁要顯示的商品列表

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
    goto(
      page,
      hash = null,
      mobile_submenu = null,
      main_cat = null, // 床墊/床架/其他配件
      cat = null, // 軟硬度/使用族群/結構
      sub_cat = null // 選單細項 ex: 軟有支撐
    ) {
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
        // 裡面的 li 用 main_cat 來讓下一頁判斷顯示
        if (main_cat) {
          this.selectedMenu({
            main_cat: main_cat,
            cat: cat,
            sub_cat: sub_cat,
          });
        }

        let path = page;

        if (main_cat) {
          path = `/product_list_${main_cat}`;

          // 如果目前就在 product_list_xxx
          const current = this.$route.path;
          if (this.$route.path.startsWith("/product_list")) {
            // 如果當前分類和目標分類不同 → 強制整頁刷新
            if (current !== path) {
              // 重刷頁 vuex 狀態會消失，所以用 localStorage 暫存
              localStorage.setItem(
                "selected_menu",
                JSON.stringify({
                  main_cat: main_cat,
                  cat: cat,
                  sub_cat: sub_cat,
                  hash: hash,
                })
              );
              window.location.href = `${path}${hash ? hash : ""}`;
            } else {
              // 同分類內切換 → 用 router.push
              this.$router.push({ path, hash });
            }
          } else {
            this.$router.push({ path, hash });
          }
        } else {
          this.$router.push({ name: page, hash: hash });
        }
      }
    },
  },
};
</script>

<style>
@import "/assets/scss/index_header.scss";
</style>
