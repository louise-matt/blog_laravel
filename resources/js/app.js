import './bootstrap';
import { createApp } from 'vue';
import InputFileComponent from './components/InputFileComponent.vue';

const app = createApp({});

app.component('input-file-component', InputFileComponent);

app.mount('#blog');
