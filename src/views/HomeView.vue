<template>
  <template
    v-for="mainCategory in mainCategorys"
    :key="mainCategory.category_id"
  >
    <div class="productList_title" :id="mainCategory.vue_id">
      <h1>{{ mainCategory.category_title }}</h1>
    </div>
    <div class="productList">
      <product-buner
        v-for="category in categorys[`${mainCategory.category_id}`]"
        :category="category"
        :key="category.id"
      />
    </div>
  </template>
</template>

<script>
import axios from "axios";
export default {
  name: "HomeView",
  data() {
    return {
      mainCategorys: [],
      categorys: [],
    };
  },
  methods: {
    getCategory() {
      axios.get(`http://shariki.gg?func=getCategory`).then((response) => {
        this.categorys = response.data;
      });
    },
  },
  mounted() {
    const getMainCategory = axios
      .get(`http://shariki.gg?func=getMainCategory`)
      .then((response) => {
        this.mainCategorys = response.data;
        this.getCategory();
      });
  },
};
</script>

<style scoped>
.productList {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}
</style>
