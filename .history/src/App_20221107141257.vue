<template>
  <Header-component />
  <nav class="navigation-links">
    <router-link to="/LatexBalloons">Латексные шары</router-link>
    <router-link to="/FoilBalloons">Фольгированные шары</router-link>
    <router-link to="/delivery">Доставка</router-link>
    <router-link to="/product-card">Корзина ({{this.$store.getters.GETTERS_CARD.length}})</router-link>
  </nav>

  <router-view :key="$route.fullPath"></router-view>
  <scroll-to-top />
</template>

<script>
export default{
  mounted() {
    window.addEventListener("scroll", this.onScroll);
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this.onScroll);
  },
  methods: {
    onScroll(e) {
      let windowTop = e.target.documentElement.scrollTop;
      if(windowTop >= 50){
        // Button at scroll to top
        document.querySelector('.btn-up').classList.remove('btn-up_hide');
        document.querySelector('.btn-up').classList.add('btn-up_show');
        // Nav block to fixed
        document.querySelector('.navigation-links').classList.add('navigation-links__fixed');
      } else {
        // Button at scroll to top
        document.querySelector('.btn-up').classList.remove('btn-up_show');
        document.querySelector('.btn-up').classList.add('btn-up_hide');
        // Nav block to fixed
        document.querySelector('.navigation-links').classList.remove('navigation-links__fixed');
      }
    }
  },
  created() {
    this.$store.dispatch("GET_USER_TOKEN");
  }
}
</script>

<style>

html, body{
  scroll-behavior: smooth;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  width: 100%;
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
}

.navigation-links {
  width: 100%;
  max-width: 1200px;
  height: 30px;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  padding: 10px 0px;
  border-bottom: 1px solid #eee;
}

.navigation-links__fixed{
  position: fixed;
  top: 0px;
  background: white;
  z-index: 99999;
}

.navigation-links a {
  font-weight: bold;
  color: #2c3e50;
  text-decoration: none;
  transition: all .2s ease-in;
}

.navigation-links a.router-link-exact-active {
  color: #dd3333 !important;
  text-decoration: none;
  display: inline-block;
  border-bottom: 1px solid #dd3333 !important;
  padding-bottom: 5px;
}
</style>
