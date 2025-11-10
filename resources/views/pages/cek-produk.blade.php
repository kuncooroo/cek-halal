@extends('layouts.app')
@section('title', 'Cek Produk Halal')

@section('content')
    <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Cek Status Halal Produk</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Kolom Kiri: Pencarian Manual -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">1. Pencarian Manual</h3>
            <p class="text-gray-600 mb-4">Cari berdasarkan nama, produsen, atau nomor sertifikat.</p>
            
            <form id="form-manual-cari" class="space-y-4">
                @csrf
                <input type="hidden" name="tipe" value="input">
                <div>
                    <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="nama_produsen" class="block text-sm font-medium text-gray-700">Nama Produsen</label>
                    <input type="text" name="nama_produsen" id="nama_produsen" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="nomor_sertifikat" class="block text-sm font-medium text-gray-700">Nomor Sertifikat</label>
                    <input type="text" name="nomor_sertifikat" id="nomor_sertifikat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <button type="submit" class="w-full py-2 px-4 rounded-md font-medium text-white bg-blue-600 hover:bg-blue-700">
                    Cari Produk
                </button>
            </form>
        </div>

        <!-- Kolom Kanan: Scan Barcode -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">2. Scan Barcode</h3>
            <p class="text-gray-600 mb-4">Gunakan kamera Anda untuk memindai barcode pada kemasan.</p>
            
            <button id="btn-start-scan" class="w-full py-2 px-4 rounded-md font-medium text-white bg-green-600 hover:bg-green-700">
                Mulai Scan
            </button>
            
            <div id="scanner-container" class="w-full bg-black rounded-md overflow-hidden mt-4" style="display: none; height: 300px;">
                <!-- Kamera akan muncul di sini -->
            </div>
        </div>

    </div>
    
    <hr class="my-8 border-t border-gray-300">

    <!-- HASIL PENCARIAN -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Hasil Pencarian</h3>
        <div id="hasil-pencarian" class="min-h-[100px] text-gray-700">
            <p>Hasil akan muncul di sini...</p>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- 1. Include QuaggaJS (Kita pakai CDN lagi, cara mudah) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>

    <!-- 2. Include JavaScript Kustom Kita (Yang lama, sebelum Vue) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scannerContainer = document.getElementById('scanner-container');
            const btnStartScan = document.getElementById('btn-start-scan');
            const formManual = document.getElementById('form-manual-cari');
            const hasilContainer = document.getElementById('hasil-pencarian');

            let isScanning = false;

            // --- Fungsi untuk Scan Barcode ---
            btnStartScan.addEventListener('click', function() {
                if (isScanning) {
                    Quagga.stop();
                    scannerContainer.style.display = 'none';
                    btnStartScan.textContent = 'Mulai Scan';
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
                    btnStartScan.textContent = 'Stop Scan';
                    isScanning = true;
                    Quagga.start();
                });

                Quagga.onDetected(function(result) {
                    const code = result.codeResult.code;
                    Quagga.stop();
                    scannerContainer.style.display = 'none';
                    btnStartScan.textContent = 'Mulai Scan';
                    isScanning = false;
                    
                    cariProdukViaServer({
                        tipe: 'scan',
                        kode_produk: code,
                        _token: '{{ csrf_token() }}'
                    });
                });
            }

            // --- Fungsi untuk Pencarian Manual ---
            formManual.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(formManual);
                const data = Object.fromEntries(formData.entries());
                cariProdukViaServer(data);
            });


            // --- Fungsi AJAX/Fetch ke Server ---
            async function cariProdukViaServer(data) {
                hasilContainer.innerHTML = '<p class="text-gray-500">Mencari...</p>';
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
                    hasilContainer.innerHTML = `<p class="text-red-600 font-semibold">${error.message}</p>`;
                }
            }

            // --- Fungsi untuk Menampilkan Hasil ---
            function tampilkanHasil(data) {
                if (Array.isArray(data)) {
                    if (data.length === 0) {
                        hasilContainer.innerHTML = '<p class="text-gray-500">Produk tidak ditemukan.</p>';
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
                     hasilContainer.innerHTML = '<p class="text-gray-500">Produk tidak ditemukan.</p>';
                }
            }
            
            // --- Helper untuk format HTML ---
            function formatProduk(produk) {
                const tgl_terbit = new Date(produk.tanggal_terbit).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
                const tgl_kadaluarsa = new Date(produk.tanggal_kadaluarsa).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });

                return `
                    <div class="border-b border-gray-200 pb-4 mb-4 last:border-b-0">
                        <div class="mb-2">
                            <strong class="text-lg text-green-700">${produk.nama_produk}</strong>
                        </div>
                        <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-sm">
                            <div>
                                <span class="text-gray-500">Produsen:</span>
                                <span class="text-gray-800 font-medium">${produk.nama_produsen}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">No. Sertifikat:</span>
                                <span class="text-gray-800 font-medium">${produk.nomor_sertifikat}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Tgl Terbit:</span>
                                <span class="text-gray-800">${tgl_terbit}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Tgl Kadaluarsa:</span>
                                <span class="text-gray-800">${tgl_kadaluarsa}</span>
                            </div>
                        </div>
                    </div>
                `;
            }

        });
    </script>
@endpush