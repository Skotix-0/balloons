import { createStore } from 'vuex'
import axios from "axios";

export default createStore({
  state: {
    latex_category: null,
    foil_category: null,
    products: null,
    card: []
  },
  getters: {
    GETTERS_LATEX_CATEGORYS: state => {
      return state.latex_category;
    },

    GETTERS_FOIL_CATEGORYS: state => {
      return state.foil_category;
    },

    GETTERS_PRODUCTS: state => {
      return state.products;
    },

    GETTERS_CARD: state => {
      return state.card
    }
  },
  mutations: {
    SET_LATEX_CATEGORY: (state, payload) => {
      state.latex_category = payload;
    },

    SET_FOIL_CATEGORY: (state, payload) => {
      state.foil_category = payload;
    },

    SET_PRODUCTS: (state, payload) => {
      state.products = payload;
    },

    ADD_TO_CARD: (state, payload) => {
      state.card.push(payload);
    }
  },
  actions: {
    GET_CATEGORYS: async (context, payload) => {
      let {data} = await axios.get(`http://shariki.gg?func=getCategory&parentId=${payload}`);
      switch (payload) {
        case 518:
          context.commit('SET_LATEX_CATEGORY', data);
          break;
        case 630:
          context.commit('SET_FOIL_CATEGORY', data);
          break;
        default:
          break;
      }
    },

    GET_PRODUCTS: async (context, payload) => {
      let {data} = await axios.get(`http://shariki.gg?func=getProducts&categoryId=${payload.categoryId}&lastProduct=${payload.lastProduct}`);
      context.commit('SET_PRODUCTS', data);
    },

    CLEAR_PRODUCTS: (context, payload) => {
      context.commit('SET_PRODUCTS', null);
    },

    ADD_TO_CARD: (context, payload) => {
      context.commit('ADD_TO_CARD', payload);
    }
  },
  modules: {
  }
})
