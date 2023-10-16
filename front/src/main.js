/**
 * main.js
 *
 * Bootstraps Vuetify and other plugins then mounts the App`
 */

// Components
import App from './App.vue'
import './axios';

// Composables
import { createApp } from 'vue'

// Plugins
import { registerPlugins } from '@/plugins'
import axios from "axios";

const app = createApp(App);

registerPlugins(app)

app.mount('#app')

axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
