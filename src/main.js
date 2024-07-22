import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store';


// Import the FontAwesome core
import { library } from '@fortawesome/fontawesome-svg-core'

// Import FontAwesome icon component
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// Import specific icons
import { faQuoteRight, faStar } from '@fortawesome/free-solid-svg-icons'

// Add icons to the library
library.add(faQuoteRight, faStar)

const app = createApp(App)

app.use(router)
app.use(store);

// Register the FontAwesome component
app.component('font-awesome-icon', FontAwesomeIcon)

app.mount('#app')
