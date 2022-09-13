<template>
  <div class="home">
    <product-buner v-for="count in counts" :key="count" />
  </div>
</template>

<script>

export default {
  name: 'HomeView',
  data(){
    return{
      counts: 10,
    }
  }
}
</script>
