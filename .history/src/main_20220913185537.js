import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import globalComponents from './components/globalCompanent.js'



globalComponents.map( elem =>{
    App.component( elem.name, elem );
});

createApp(App).use(store).use(router).mount('#app');