<template>
    <div class="productList">
        <product-buner v-for="count in counts" :key="count" />
    </div>
</template>

<script>
export default {
    name: "HomeView",
    data() {
        return {
            counts: 10,
        };
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
