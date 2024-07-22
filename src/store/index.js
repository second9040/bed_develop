import { createStore } from 'vuex';

export default createStore({
  state: {
    clickShowCart: false,
    showCartAside: false,
    cart_item_total: 0,
    cart_items: [
      {
        img: '/assets/images/index/hot_item_1.png',
        title: '波浪舒眠床墊',
        desc: '單人加大 (106 x 188 x 25 cm) ',
        amount: 1,
        price: 11899,
      },
      {
        img: '/assets/images/index/hot_item_1.png',
        title:
          '波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊',
        desc: '單人加大 (106 x 188 x 25 cm) 單人加大單人加大單人加大單人加大',
        amount: 10,
        price: 11899,
      },
      {
        img: '/assets/images/index/hot_item_1.png',
        title: '波浪舒眠床墊3',
        desc: '單人加大 (106 x 188 x 25 cm) ',
        amount: 1,
        price: 11899,
      },
      {
        img: '/assets/images/index/hot_item_1.png',
        title:
          '4波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊',
        desc: '單人加大 (106 x 188 x 25 cm) 單人加大單人加大單人加大單人加大',
        amount: 10,
        price: 11899,
      },
      {
        img: '/assets/images/index/hot_item_1.png',
        title: '5波浪舒眠床墊',
        desc: '單人加大 (106 x 188 x 25 cm) ',
        amount: 1,
        price: 11899,
      },
      {
        img: '/assets/images/index/hot_item_1.png',
        title:
          '6波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊波浪舒眠床墊',
        desc: '單人加大 (106 x 188 x 25 cm) 單人加大單人加大單人加大單人加大',
        amount: 10,
        price: 11899,
      },
    ],
    tw_city_name: [ "臺北市", "基隆市", "新北市", "連江縣", "宜蘭縣", "釣魚臺", "新竹市", "新竹縣", "桃園市", "苗栗縣", "臺中市", "彰化縣", "南投縣", "嘉義市", "嘉義縣", "雲林縣", "臺南市", "高雄市", "南海島", "澎湖縣", "金門縣", "屏東縣", "臺東縣", "花蓮縣"],
    cart_price_total: 0,
  },
  mutations: {
    toggleCart(state, action) {
      if (action) {
        state.clickShowCart = action;
        setTimeout(() => {
          state.showCartAside = action;
        }, 100);
      } else {
        // 配合動畫效果，這邊等待的數字要跟 cart_aside.scss 的 transition 數字一起改
        state.showCartAside = action;
        setTimeout(() => {
          state.clickShowCart = action;
        }, 700);
      }
    },
    calcCartItemTotal(state, item) {
      state.cart_item_total += item;
    },
    removeCartItem(state, index) {
      state.cart_items.splice(index, 1)
    },
    changeCartItemAmount(state, para) {
      let item = state.cart_items[para.index]
      if (item.amount == 1 && para.action == -1) return
      if (item.amount == 99 && para.action == 1) return
      state.cart_items[para.index].amount += para.action
      state.cart_item_total += para.action;
    },
  },
  actions: {
    toggleCart({ commit }, action) {
      commit('toggleCart', action);
    },
    countItem({ commit }, item) {
      commit('calcCartItemTotal', item);
    },
    removeItem({ commit }, index) {
      commit('removeCartItem', index);
    },
    removeItem({ commit, state, dispatch }, index) {
      dispatch('countItem', -1 * state.cart_items[index].amount).then(() => {
        commit('removeCartItem', index);
        dispatch('updateCart')
      });
    },
    validateAmount({ commit, state },index) {
      const amount = state.cart_items[index].amount;
      if (amount < 1) {
        state.cart_items[index].amount = 1;
      } else if (amount > 99) {
        state.cart_items[index].amount = 99;
      }
    },
    changeCartItemAmount({ commit }, para) {
      commit('changeCartItemAmount', para);
    },
    updateCart({ commit, state }) {
      state.cart_item_total = 0;
      state.cart_price_total = 0;
      state.cart_items.forEach((item) => {
        state.cart_item_total += item.amount
        state.cart_price_total += item.amount * item.price
      })
    },
    emptyCart({ commit, state }) {
      state.cart_items = null;
      state.cart_item_total = 0;
      state.cart_price_total = 0;
    }
  },
  getters: {
    clickShowCart: (state) => state.clickShowCart,
    showCartAside: (state) => state.showCartAside,
    cart_item_total: (state) => state.cart_item_total,
    cart_items: (state) => state.cart_items,
    cart_price_total: (state) => state.cart_items,
    tw_city_name: (state) => state.cart_items,
  },
});
