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
    this.$store
  }
};
</script>

<style>
</style>