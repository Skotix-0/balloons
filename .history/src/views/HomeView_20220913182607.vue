<template>
  <div class="home">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HeaderComponent from '@/components/Header.vue'

export default {
  name: 'HomeView',
  components: {
    HeaderComponent
  }
}
</script>
