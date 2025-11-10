<!-- BAGIAN 1: TAMPILAN (HTML dengan Tailwind) -->
<template>
  <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Cek Status Halal Produk</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    
    <!-- Kolom Kiri: Pencarian Manual -->
    <div class="bg-white p-6 rounded-lg shadow-md">
      <h3 class="text-xl font-semibold text-gray-800 mb-4">1. Pencarian Manual</h3>
      <p class="text-gray-600 mb-4">Cari berdasarkan nama, produsen, atau nomor sertifikat.</p>
      
      <!-- 
        @submit.prevent="cariManual" memanggil fungsi 'cariManual' di script 
        v-model="form.nama_produk" menghubungkan input ini ke data 'form'
      -->
      <form @submit.prevent="cariManual" class="space-y-4">
        <input type="hidden" name="tipe" value="input">
        <div>
          <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
          <input type="text" v-model="form.nama_produk" id="nama_produk" class="mt-1 block w-full input-field">
        </div>
        <div>
          <label for="nama_produsen" class="block text-sm font-medium text-gray-700">Nama Produsen</label>
          <input type="text" v-model="form.nama_produsen" id="nama_produsen" class="mt-1 block w-full input-field">
        </div>
        <div>
          <label for="nomor_sertifikat" class="block text-sm font-medium text-gray-700">Nomor Sertifikat</label>
          <input type="text" v-model="form.nomor_sertifikat" id="nomor_sertifikat" class="mt-1 block w-full input-field">
        </div>
        <!-- Tombol ini dinonaktifkan saat 'isLoading' true -->
        <button type="submit" class="w-full py-2 px-4 rounded-md font-medium text-white bg-blue-600 hover:bg-blue-700" :disabled="isLoading">
          {{ isLoading ? 'Mencari...' : 'Cari Produk' }}
        </button>
      </form>
    </div>

    <!-- Kolom Kanan: Scan Barcode -->
    <div class="bg-white p-6 rounded-lg shadow-md">
      <h3 class="text-xl font-semibold text-gray-800 mb-4">2. Scan Barcode</h3>
      <p class="text-gray-600 mb-4">Gunakan kamera Anda untuk memindai barcode.</p>
      
      <!-- @click="toggleScanner" memanggil fungsi 'toggleScanner' -->
      <button @click="toggleScanner" class="w-full py-2 px-4 rounded-md font-medium text-white" :class="isScanning ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700'">
        {{ isScanning ? 'Stop Scan' : 'Mulai Scan' }}
      </button>
      
      <!-- 'ref' ini menghubungkan div ke script agar Quagga tahu di mana harus menggambar video -->
      <div ref="scannerContainer" class="w-full bg-black rounded-md overflow-hidden mt-4" style="height: 300px; display: none;">
        <!-- Kamera akan muncul di sini -->
      </div>
    </div>
  </div>
  
  <hr class="my-8 border-t border-gray-300">

  <!-- HASIL PENCARIAN (Dikelola oleh Vue) -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Hasil Pencarian</h3>
    <div class="min-h-[100px] text-gray-700">
      
      <!-- Tampilan Loading (hanya tampil jika 'isLoading' true) -->
      <div v-if="isLoading" class="text-center text-gray-500">
        <p>Mencari data produk...</p>
      </div>

      <!-- Tampilan Error (hanya tampil jika 'error' ada isinya) -->
      <div v-else-if="error" class="text-center text-red-600 font-semibold">
        <p>{{ error }}</p>
      </div>

      <!-- Tampilan Hasil (hanya tampil jika 'results' ada isinya) -->
      <div v-else-if="results && results.length > 0" class="space-y-4">
        <!-- Loop/ulangi untuk setiap 'produk' di dalam 'results' -->
        <div v-for="produk in results" :key="produk.id" class="border-b border-gray-200 pb-4 mb-4 last:border-b-0">
          <div class="mb-2">
            <strong class="text-lg text-green-700">{{ produk.nama_produk }}</strong>
          </div>
          <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-sm">
            <div>
              <span class="text-gray-500">Produsen:</span>
              <span class="text-gray-800 font-medium">{{ produk.nama_produsen }}</span>
            </div>
            <div>
              <span class="text-gray-500">No. Sertifikat:</span>
              <span class="text-gray-800 font-medium">{{ produk.nomor_sertifikat }}</span>
            </div>
            <div>
              <span class="text-gray-500">Tgl Terbit:</span>
              <!-- Memanggil fungsi 'formatTanggal' dari script -->
              <span class="text-gray-800">{{ formatTanggal(produk.tanggal_terbit) }}</span>
            </div>
            <div>
              <span class="text-gray-500">Tgl Kadaluarsa:</span>
              <span class="text-gray-800">{{ formatTanggal(produk.tanggal_kadaluarsa) }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Tampilan Awal / Tidak Ditemukan -->
      <div v-else class="text-center text-gray-500">
        <p>Hasil akan muncul di sini...</p>
      </div>

    </div>
  </div>
</template>


<!-- BAGIAN 2: LOGIKA (JAVASCRIPT) -->
<script setup>
// Impor library yang kita butuhkan
import { ref, reactive, onUnmounted } from 'vue';
import axios from 'axios'; // Untuk request HTTP
import Quagga from '@ericblade/quagga2'; // Untuk scan barcode

// --- STATE MANAGEMENT ---
// Ini adalah "data" yang akan diingat oleh Vue
// 'reactive' untuk objek, 'ref' untuk nilai tunggal (string, boolean, number)
const form = reactive({
  nama_produk: '',
  nama_produsen: '',
  nomor_sertifikat: ''
});

const isLoading = ref(false); // Status loading
const isScanning = ref(false); // Status kamera
const results = ref([]); // Penyimpan hasil pencarian (selalu array)
const error = ref(null); // Penyimpan pesan error
const scannerContainer = ref(null); // Ini untuk menargetkan <div> scanner

// --- METHODS ---

// Fungsi untuk memformat tanggal (helper)
function formatTanggal(tgl) {
  if (!tgl) return '-';
  return new Date(tgl).toLocaleDateString('id-ID', {
    day: '2-digit', month: 'long', year: 'numeric'
  });
}

// Fungsi untuk membersihkan state sebelum pencarian baru
function clearState() {
  isLoading.value = true;
  error.value = null;
  results.value = [];
}

// Fungsi yang dipanggil saat form manual di-submit
async function cariManual() {
  clearState();
  
  try {
    // Kirim data form menggunakan Axios
    const response = await axios.post('/cari-produk', { // URL bisa hardcode
      tipe: 'input',
      ...form // Kirim semua data dari v-model 'form'
    });
    
    results.value = response.data.data; // Simpan hasil ke state
    if (results.value.length === 0) {
      error.value = "Produk tidak ditemukan.";
    }

  } catch (err) {
    // Tangkap error jika API gagal
    console.error(err);
    error.value = err.response?.data?.message || 'Produk tidak ditemukan.';
  } finally {
    // Apapun hasilnya, loading selesai
    isLoading.value = false;
  }
}

// Fungsi yang dipanggil setelah scan berhasil
async function cariViaScan(kode) {
  clearState();

  try {
    const response = await axios.post('/cari-produk', {
      tipe: 'scan',
      kode_produk: kode
    });
    
    // Hasil scan hanya 1 produk, kita masukkan ke array agar konsisten
    results.value = [response.data.data]; 

  } catch (err) {
    console.error(err);
    error.value = err.response?.data?.message || 'Produk dengan barcode tersebut tidak ditemukan.';
  } finally {
    isLoading.value = false;
  }
}

// --- LOGIKA SCANNER ---
function toggleScanner() {
  if (isScanning.value) {
    stopScanner();
  } else {
    startScanner();
  }
}

// Fungsi untuk memulai Quagga
function startScanner() {
  Quagga.init({
    inputStream: {
      name: "Live",
      type: "LiveStream",
      target: scannerContainer.value, // Targetkan <div> dari ref
      constraints: {
        width: 640,
        height: 480,
        facingMode: "environment" // Kamera belakang
      },
    },
    decoder: {
      readers: ["ean_reader", "code_128_reader", "upc_reader"]
    },
  }, function(err) {
    if (err) {
      console.error(err);
      error.value = 'Error: Gagal memulai kamera. Pastikan Anda mengizinkan akses kamera.';
      return;
    }
    scannerContainer.value.style.display = 'block'; // Tampilkan scanner
    Quagga.start();
    isScanning.value = true;
  });

  // Pasang listener
  Quagga.onDetected(onDetected);
}

// Fungsi untuk menghentikan Quagga
function stopScanner() {
  Quagga.offDetected(onDetected); // Hapus listener
  Quagga.stop();
  scannerContainer.value.style.display = 'none'; // Sembunyikan scanner
  isScanning.value = false;
}

// Fungsi yang dipanggil Quagga saat barcode terdeteksi
function onDetected(result) {
  const code = result.codeResult.code;
  console.log("Barcode terdeteksi:", code);
  stopScanner(); // Langsung stop setelah dapat
  
  // Panggil fungsi pencarian
  cariViaScan(code);
}

// Life cycle hook: Pastikan scanner berhenti saat komponen dihancurkan (misal pindah halaman)
onUnmounted(() => {
  if (isScanning.value) {
    stopScanner();
  }
});
</script>


<!-- BAGIAN 3: GAYA (CSS) -->
<style scoped>
/* Kita bisa gunakan '@apply' untuk memakai class Tailwind 
  di satu tempat agar HTML lebih bersih 
*/
.input-field {
  @apply px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 w-full;
}
</style>