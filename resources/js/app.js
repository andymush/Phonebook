import './bootstrap';
import { createApp } from 'vue';



const app = createApp({});

import Welcome from './components/Welcome.vue';
import Index from './components/Contacts/Index.vue';

app.component('welcome', Welcome);
app.component('Index', Index);



app.mount('#app');
