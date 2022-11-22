<template>
    <template>
        <product-list
            v-for="(val, key) in products"
            :key="key"
            :products="val"
        />
    </template>
</template>

<script>
export default {
  data(){
    return{
      products: [],
    }
  },
  created(){
    this.products = this.$store.getters.GETTERS_CARD;
  }
};
</script>

<style>
</style>