<template>
  <router-view/>
  <nav>
    <router-link to="/">Главная</router-link>
    <router-link to="/contact">Контактная информация</router-link>
  </nav>
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
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  padding: 10px 0px;
  border-bottom: 1px solid #eee;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: blue;
  text-decoration: none;
  display: inline-block;
  border-bottom: 1px solid blue;
  padding-bottom: 5px;
}
</style>
