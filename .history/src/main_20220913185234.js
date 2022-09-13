import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import globalComponents2 from './components/globalCompanent'

globalComponents2.map( elem =>{
    console.log(elem);
});

// component('my-component-name', {
//     /* ... */
//   })

createApp(App).use(store).use(router).mount('#app')
