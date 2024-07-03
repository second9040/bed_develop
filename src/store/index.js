import { createStore } from 'vuex';

export default createStore({
  state: {
    clickShowCart: false,
    showCartView: false,
    cart_item_total: 0,
  },
  mutations: {
    toggleCart(state, action) {
      if (action) {
        state.clickShowCart = action;
        setTimeout(() => {
          state.showCartView = action;
        }, 100);
      } else {
        // 配合動畫效果，這邊等待的數字要跟 cart.scss 的 transition 數字一起改
        state.showCartView = action;
        setTimeout(() => {
          state.clickShowCart = action;
        }, 700);
      }
    },
    calcCartItemTotal(state, item) {
      state.cart_item_total += item;
    },
  },
  actions: {
    toggleCart({ commit }, action) {
      commit('toggleCart', action);
    },
    countItem({ commit }, item) {
      commit('calcCartItemTotal', item);
    },
  },
  getters: {
    clickShowCart: (state) => state.clickShowCart,
    showCartView: (state) => state.showCartView,
    cart_item_total: (state) => state.cart_item_total,
  },
});
