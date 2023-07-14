import './bootstrap';

import { createApp } from 'vue'
import ContactsIndex from './components/Contacts/Index'

const app = createApp({})
app.component('contact-index', ContactsIndex)
app.mount('#app')
