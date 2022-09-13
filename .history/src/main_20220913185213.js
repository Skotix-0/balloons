import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import globalComponents from './components/globalCompanent'

globalComponents.map( elem =>{
    console.log(elem);
});

// component('my-component-name', {
//     /* ... */
//   })

createApp(App).use(store).use(router).mount('#app')
