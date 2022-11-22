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
    console.log( this.$store.getters.GETTERS_CARD );
  }
};
</script>

<style>
</style>