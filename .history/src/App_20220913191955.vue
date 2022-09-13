<template>
  <Header-component />
  <nav>
    <router-link to="/">Главная</router-link>
    <router-link to="/favorable-offers">Выгодные предложения</router-link>
    <router-link to="/contact">Контактная информация</router-link>
  </nav>

  <router-view/>

</template>

<style>
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

nav {
  width: 100%;
  max-width: 1200px;
  height: 30px;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  padding: 10px 0px;
  border-bottom: 1px solid #eee;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
  text-decoration: none;
  transition: all .3s step-end;
}

nav a.router-link-exact-active {
  color: #dd3333 !important;
  text-decoration: none;
  display: inline-block;
  border-bottom: 1px solid #dd3333 !important;
  padding-bottom: 5px;
}
</style>
