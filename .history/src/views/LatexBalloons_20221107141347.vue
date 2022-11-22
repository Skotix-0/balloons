<template>
  <template v-if="urlCategory === null && categorys !== null">
    <div class="productList">
      <product-buner
        v-for="category in categorys"
        :category="category"
        :key="category.id"
        navOpen = 'LatexBalloons'
      />
    </div>
  </template>

  <template v-else-if="urlCategory !== null">
    <product-list 
      v-for="(val, key) in products" 
      :key="key" 
      :products="val" 
    />
    <loader v-if="!products" />
    <!-- <template v-else-if="products === null" >
      <h1>Что-то пошло не так, попробуйте позже!</h1>
    </template> -->
  </template>

  <template v-else>
    <loader />
  </template>
</template>

<script>
export default {
  name: "LatexBalloons",
  data() {
    return {
      urlCategory: null,
    };
  },
  methods: {},
  created() {
    let urlParams = new URLSearchParams(window.location.search);
    if (!urlParams.has("categoryId")) {
      this.urlCategory = null;
      this.$store.dispatch("GET_CATEGORYS", 518);
      this.$store.dispatch("CLEAR_PRODUCTS");
    } else {
      this.$store.dispatch("GET_PRODUCTS", {
        categoryId: urlParams.get("categoryId"),
        lastProduct: 0,
      });
      this.urlCategory = urlParams.get("categoryId");
      document.documentElement.scrollIntoView(true);
    }
  },
  computed: {
    categorys() {
      return this.$store.getters.GETTERS_LATEX_CATEGORYS;
    },
    products() {
      return this.$store.getters.GETTERS_PRODUCTS;
    },
  },
};
</script>

<style scoped lang="scss">
.productList {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

.productList_title {
  width: 100%;
  border-bottom: 1px solid #eee;
  border-top: 1px solid #eee;
}
body {
  min-height: 100vh;
  padding: 0px;
  margin: 0px;
}
</style>
