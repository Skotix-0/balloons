import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import globalComponents from './components/globalCompanent.js'

const app = createApp(App).use(store).use(router).mount('#app');

globalComponents.map( elem =>{
    app.component( elem.name, elem );
});

