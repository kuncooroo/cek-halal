// resources/js/app.js
import './bootstrap'; // Ini sudah mengimpor dan konfigurasi Axios

import { createApp } from 'vue';

// Impor komponen yang akan kita buat
import CekProduk from './components/CekProduk.vue';

// Buat aplikasi Vue
const app = createApp({});

// Daftarkan komponen kita
app.component('cek-produk', CekProduk);

// Mount aplikasi Vue ke elemen #app
// Kita akan pastikan elemen #app ada di file blade
if (document.getElementById('app')) {
    app.mount('#app');
}