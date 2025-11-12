@extends('layouts.app')
@section('title', 'Cek Produk Halal - Verifikasi Produk Anda')

@section('content')
    <!-- Hero Header -->
    <section class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-3xl shadow-2xl overflow-hidden mb-12">
        <div class="container mx-auto px-6 py-16 text-center text-white">
            <div class="inline-block mb-4">
                <div class="w-20 h-20 bg-white/20 backdrop-blur-lg rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Cek Status Halal Produk</h1>
            <p class="text-xl text-green-100 max-w-2xl mx-auto">
                Verifikasi kehalalan produk dengan mudah melalui pencarian manual atau scan barcode
            </p>
        </div>
    </section>

    <!-- Main Search Section -->
    <div class="max-w-6xl mx-auto space-y-8">
        
        <!-- Search Methods -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Manual Search Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-lg rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Pencarian Manual</h3>
                            <p class="text-sm text-blue-100">Cari berdasarkan nama atau nomor sertifikat</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <form id="form-manual-cari" class="space-y-4">
                        @csrf
                        <input type="hidden" name="tipe" value="input">
                        
                        <div>
                            <label for="nama_produk" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                    <span>Nama Produk</span>
                                </span>
                            </label>
                            <input type="text" name="nama_produk" id="nama_produk" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Contoh: Indomie Goreng">
                        </div>

                        <div>
                            <label for="nama_produsen" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    <span>Nama Produsen</span>
                                </span>
                            </label>
                            <input type="text" name="nama_produsen" id="nama_produsen" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Contoh: PT Indofood CBP Sukses Makmur">
                        </div>

                        <div>
                            <label for="nomor_sertifikat" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span>Nomor Sertifikat</span>
                                </span>
                            </label>
                            <input type="text" name="nomor_sertifikat" id="nomor_sertifikat" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="Contoh: 00150077881014">
                        </div>

                        <button type="submit" class="w-full flex items-center justify-center space-x-2 py-4 px-6 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <span>Cari Produk</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Barcode Scanner Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow">
                <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-lg rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Scan Barcode</h3>
                            <p class="text-sm text-green-100">Pindai barcode produk dengan kamera</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="mb-4">
                        <div class="bg-green-50 border border-green-200 rounded-xl p-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div class="text-sm text-gray-700">
                                    <p class="font-semibold text-green-800 mb-1">Cara menggunakan:</p>
                                    <ul class="space-y-1 text-gray-600">
                                        <li>• Klik tombol "Mulai Scan"</li>
                                        <li>• Izinkan akses kamera</li>
                                        <li>• Arahkan ke barcode produk</li>
                                        <li>• Tunggu deteksi otomatis</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="btn-start-scan" class="w-full flex items-center justify-center space-x-2 py-4 px-6 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Mulai Scan</span>
                    </button>
                    
                    <div id="scanner-container" class="w-full bg-gray-900 rounded-xl overflow-hidden mt-4 relative" style="display: none; height: 320px;">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-64 h-40 border-4 border-green-500 rounded-lg"></div>
                        </div>
                    </div>

                    <div id="scan-status" class="mt-4 text-center text-sm text-gray-600" style="display: none;">
                        <div class="flex items-center justify-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span>Mencari barcode...</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Search Results -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 backdrop-blur-lg rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Hasil Pencarian</h3>
                        <p class="text-sm text-purple-100">Detail produk yang ditemukan</p>
                    </div>
                </div>
            </div>
            
            <div class="p-6">
                <div id="hasil-pencarian" class="min-h-[200px]">
                    <div class="text-center py-12">
                        <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <p class="text-gray-500 text-lg">Hasil pencarian akan muncul di sini</p>
                        <p class="text-gray-400 text-sm mt-2">Gunakan pencarian manual atau scan barcode untuk memulai</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Section -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Tips Pencarian</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start space-x-2">
                            <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Gunakan nama produk yang lengkap untuk hasil lebih akurat</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Pastikan pencahayaan cukup saat melakukan scan barcode</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Nomor sertifikat dapat ditemukan pada kemasan produk</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scannerContainer = document.getElementById('scanner-container');
            const btnStartScan = document.getElementById('btn-start-scan');
            const scanStatus = document.getElementById('scan-status');
            const formManual = document.getElementById('form-manual-cari');
            const hasilContainer = document.getElementById('hasil-pencarian');

            let isScanning = false;

            // Scan Barcode
            btnStartScan.addEventListener('click', function() {
                if (isScanning) {
                    Quagga.stop();
                    scannerContainer.style.display = 'none';
                    scanStatus.style.display = 'none';
                    btnStartScan.innerHTML = `
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Mulai Scan</span>
                    `;
                    isScanning = false;
                } else {
                    startScanner();
                }
            });

            function startScanner() {
                Quagga.init({
                    inputStream: {
                        name: "Live",
                        type: "LiveStream",
                        target: scannerContainer,
                        constraints: {
                            width: 640,
                            height: 480,
                            facingMode: "environment"
                        },
                    },
                    decoder: {
                        readers: ["ean_reader", "code_128_reader", "upc_reader"]
                    },
                }, function(err) {
                    if (err) {
                        console.error(err);
                        alert('Error: Gagal memulai kamera. Pastikan Anda mengizinkan akses kamera.');
                        return;
                    }
                    scannerContainer.style.display = 'block';
                    scanStatus.style.display = 'block';
                    btnStartScan.innerHTML = `
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span>Stop Scan</span>
                    `;
                    isScanning = true;
                    Quagga.start();
                });

                Quagga.onDetected(function(result) {
                    const code = result.codeResult.code;
                    Quagga.stop();
                    scannerContainer.style.display = 'none';
                    scanStatus.style.display = 'none';
                    btnStartScan.innerHTML = `
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Mulai Scan</span>
                    `;
                    isScanning = false;
                    
                    cariProdukViaServer({
                        tipe: 'scan',
                        kode_produk: code,
                        _token: '{{ csrf_token() }}'
                    });
                });
            }

            // Pencarian Manual
            formManual.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(formManual);
                const data = Object.fromEntries(formData.entries());
                cariProdukViaServer(data);
            });

            // AJAX ke Server
            async function cariProdukViaServer(data) {
                hasilContainer.innerHTML = `
                    <div class="text-center py-12">
                        <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-green-600 mb-4"></div>
                        <p class="text-gray-600 font-medium">Mencari produk...</p>
                    </div>
                `;
                
                try {
                    const response = await fetch('{{ route("cari-produk") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(data)
                    });
                    
                    if (!response.ok) {
                        const errorData = await response.json();
                        throw new Error(errorData.message || 'Produk tidak ditemukan');
                    }
                    
                    const result = await response.json();
                    tampilkanHasil(result.data);
                } catch (error) {
                    console.error('Error:', error);
                    hasilContainer.innerHTML = `
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-red-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-red-600 font-semibold text-lg">${error.message}</p>
                            <p class="text-gray-500 mt-2">Silakan coba dengan kata kunci lain</p>
                        </div>
                    `;
                }
            }

            // Tampilkan Hasil
            function tampilkanHasil(data) {
                if (Array.isArray(data)) {
                    if (data.length === 0) {
                        hasilContainer.innerHTML = `
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-gray-500 text-lg font-medium">Produk tidak ditemukan</p>
                                <p class="text-gray-400 text-sm mt-2">Coba dengan kata kunci atau nomor sertifikat lain</p>
                            </div>
                        `;
                        return;
                    }
                    let html = '<div class="space-y-4">';
                    data.forEach(produk => {
                        html += formatProduk(produk);
                    });
                    html += '</div>';
                    hasilContainer.innerHTML = html;
                } else if (typeof data === 'object' && data !== null) {
                    hasilContainer.innerHTML = formatProduk(data);
                } else {
                    hasilContainer.innerHTML = `
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-gray-500 text-lg font-medium">Produk tidak ditemukan</p>
                        </div>
                    `;
                }
            }
            
            // Format Produk
            function formatProduk(produk) {
                const tgl_terbit = new Date(produk.tanggal_terbit).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
                const tgl_kadaluarsa = new Date(produk.tanggal_kadaluarsa).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
                const isExpired = new Date(produk.tanggal_kadaluarsa) < new Date();

                return `
                    <div class="bg-gradient-to-r from-green-50 to-emeral