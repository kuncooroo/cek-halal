@extends('layouts.public')

@section('title', 'Cek Produk - Sertifikasi Halal')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .bg-grid-pattern {
            background-image: linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush

@section('content')
    <section
        class="relative pt-[100px] pb-[140px] px-[5%] text-center text-white bg-gradient-to-br from-primary to-blue-400 rounded-b-[60px] shadow-[0_10px_30px_rgba(30,136,229,0.2)] overflow-hidden">
        <div class="absolute inset-0 z-[1] bg-grid-pattern"></div>
        <div class="absolute z-[1] rounded-full bg-white/10 w-[300px] h-[300px] -top-[100px] -left-[100px] blur-sm"></div>
        <div class="absolute z-[1] rounded-full bg-white/10 w-[200px] h-[200px] bottom-[20%] -right-[50px]"></div>

        <div class="relative z-[2] max-w-[800px] mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">
                Cek Sertifikasi Halal Produk
            </h1>
            <p class="text-lg md:text-xl opacity-95 leading-relaxed font-light">
                Verifikasi status sertifikasi halal produk dengan mudah melalui Nama, Produsen, atau Scan Barcode.
            </p>
        </div>
    </section>

    <section class="px-[5%] -mt-20 relative z-10">
        <div class="bg-white p-6 md:p-8 rounded-3xl shadow-[0_20px_60px_rgba(0,0,0,0.1)] max-w-container-lg mx-auto">

            <form id="unifiedSearchForm" class="grid grid-cols-1 lg:grid-cols-[1fr_1fr_1fr_auto_auto] gap-4 items-center">

                <div class="relative group">
                    <input type="text" name="nama_produk" id="inputNamaProduk"
                        class="w-full p-[18px] border-2 border-gray-200 rounded-xl text-[0.95rem] transition-all focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 placeholder-gray-400"
                        placeholder="Nama Produk / Hasil Scan...">
                </div>

                <div class="relative group">
                    <input type="text" name="nama_produsen"
                        class="w-full p-[18px] border-2 border-gray-200 rounded-xl text-[0.95rem] transition-all focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 placeholder-gray-400"
                        placeholder="Nama Produsen...">
                </div>

                <div class="relative group">
                    <input type="text" name="nomor_sertifikat"
                        class="w-full p-[18px] border-2 border-gray-200 rounded-xl text-[0.95rem] transition-all focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 placeholder-gray-400"
                        placeholder="No. Sertifikat...">
                </div>

                <div class="flex gap-2 h-full">
                    <button type="button" id="btnScanLive" title="Live Scan Kamera"
                        class="h-full px-5 py-[18px] bg-white text-navy border-2 border-gray-200 rounded-xl text-xl cursor-pointer transition-all hover:border-primary hover:text-primary hover:bg-gray-50 flex items-center justify-center">
                        <i class="fa-solid fa-camera"></i>
                    </button>

                    <button type="button" id="btnScanFile" title="Upload Foto Barcode"
                        class="h-full px-5 py-[18px] bg-white text-navy border-2 border-gray-200 rounded-xl text-xl cursor-pointer transition-all hover:border-primary hover:text-primary hover:bg-gray-50 flex items-center justify-center">
                        <i class="fa-solid fa-image"></i>
                    </button>
                    <input type="file" id="qrInputFile" accept="image/*" class="hidden">
                </div>

                <button type="submit"
                    class="h-full w-full lg:w-auto py-[18px] px-8 bg-gradient-to-br from-primary to-blue-400 text-white border-0 rounded-xl text-base font-bold cursor-pointer transition-all shadow-[0_10px_25px_rgba(30,136,229,0.3)] hover:-translate-y-0.5 hover:shadow-[0_15px_35px_rgba(30,136,229,0.4)] flex items-center justify-center gap-2 whitespace-nowrap">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>Cari</span>
                </button>
            </form>

            <div id="reader-wrapper" class="hidden mt-5 bg-black rounded-xl p-5 text-center relative overflow-hidden">
                <h4 class="text-white mb-2.5 font-semibold z-10 relative">Arahkan Kamera ke Barcode Produk</h4>
                <div id="reader" class="w-full max-w-[500px] mx-auto border-none"></div>
                <button id="btnCloseScanner"
                    class="mt-4 bg-red-500 text-white border-none py-2.5 px-6 rounded-lg font-bold cursor-pointer hover:bg-red-600 transition-colors z-10 relative">
                    Tutup Kamera
                </button>
            </div>
        </div>
    </section>

    <section class="pt-16 px-[5%] pb-20">
        <div id="resultBox"
            class="bg-white p-10 rounded-3xl shadow-[0_20px_60px_rgba(0,0,0,0.1)] max-w-container-lg mx-auto hidden animate-[fadeInUp_0.5s_ease]">
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let html5QrcodeScanner = null;

        const scanConfig = {
            fps: 10,
            qrbox: {
                width: 250,
                height: 150
            },
            aspectRatio: 1.0
        };

        document.getElementById('btnScanLive').addEventListener('click', function() {
            const wrapper = document.getElementById('reader-wrapper');
            wrapper.classList.remove('hidden');
            wrapper.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });

            if (!html5QrcodeScanner) {
                html5QrcodeScanner = new Html5QrcodeScanner("reader", scanConfig, false);
                html5QrcodeScanner.render(onScanSuccess, onScanFailure);
            }
        });

        document.getElementById('btnCloseScanner').addEventListener('click', stopScanner);

        function stopScanner() {
            const wrapper = document.getElementById('reader-wrapper');
            if (html5QrcodeScanner) {
                html5QrcodeScanner.clear().then(() => {
                    html5QrcodeScanner = null;
                    wrapper.classList.add('hidden');
                }).catch(err => console.error("Gagal stop scanner", err));
            } else {
                wrapper.classList.add('hidden');
            }
        }

        const btnScanFile = document.getElementById('btnScanFile');
        const qrInputFile = document.getElementById('qrInputFile');

        btnScanFile.addEventListener('click', () => {
            qrInputFile.click();
        });

        qrInputFile.addEventListener('change', e => {
            if (e.target.files.length == 0) return;

            const imageFile = e.target.files[0];

            const html5QrCode = new Html5Qrcode("reader");

            document.getElementById('inputNamaProduk').value = "Memproses gambar...";
            document.getElementById('inputNamaProduk').disabled = true;

            html5QrCode.scanFile(imageFile, true)
                .then(decodedText => {
                    onScanSuccess(decodedText, null);
                    document.getElementById('inputNamaProduk').disabled = false;
                })
                .catch(err => {
                    alert("Barcode tidak terdeteksi pada gambar ini. Pastikan gambar jelas dan cahaya cukup.");
                    document.getElementById('inputNamaProduk').value = "";
                    document.getElementById('inputNamaProduk').disabled = false;
                    console.error("Error scan file", err);
                });
        });

        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Scan Result: ${decodedText}`);

            const inputProduk = document.getElementById('inputNamaProduk');
            inputProduk.value = decodedText;
            inputProduk.classList.add('bg-yellow-100');
            setTimeout(() => inputProduk.classList.remove('bg-yellow-100'), 800);

            stopScanner();
            searchProduct('barcode', decodedText);
        }

        function onScanFailure(error) {}

        document.getElementById('unifiedSearchForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const namaProduk = this.querySelector('input[name="nama_produk"]').value.trim();
            const namaProdusen = this.querySelector('input[name="nama_produsen"]').value.trim();
            const nomorSertifikat = this.querySelector('input[name="nomor_sertifikat"]').value.trim();

            let searchType = '';
            let searchValue = '';

            if (namaProduk) {
                if (/^\d+$/.test(namaProduk) && namaProduk.length > 6) {
                    searchType = 'barcode';
                    searchValue = namaProduk;
                } else {
                    searchType = 'nama_produk';
                    searchValue = namaProduk;
                }
            } else if (namaProdusen) {
                searchType = 'nama_produsen';
                searchValue = namaProdusen;
            } else if (nomorSertifikat) {
                searchType = 'nomor_sertifikat';
                searchValue = nomorSertifikat;
            } else {
                alert('Silakan isi salah satu kolom pencarian atau gunakan Scan Barcode');
                return;
            }

            searchProduct(searchType, searchValue);
        });

        function searchProduct(searchType, searchValue) {
            const resultBox = document.getElementById('resultBox');

            resultBox.innerHTML = `
                <div class="text-center py-16">
                    <div class="w-16 h-16 border-4 border-gray-100 border-t-primary rounded-full animate-spin mx-auto mb-5"></div>
                    <p class="text-gray-500 font-semibold">Mencari data...</p>
                </div>
            `;
            resultBox.classList.remove('hidden');
            resultBox.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });

            fetch('{{ route('produk.search') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        search_type: searchType,
                        search_value: searchValue
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.found) {
                        renderTable(data.data);
                    } else {
                        renderNotFound(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    renderNotFound('Terjadi kesalahan koneksi atau server.');
                });
        }

        function renderTable(products) {
            const resultBox = document.getElementById('resultBox');
            if (!Array.isArray(products) || products.length === 0) {
                renderNotFound('Data tidak valid.');
                return;
            }

            let html = `
            <div class="mb-5 border-b border-gray-100 pb-4">
                <h2 class="m-0 text-2xl font-bold text-navy">Hasil Pencarian</h2>
                <p class="text-gray-500 mt-1">Ditemukan <strong>${products.length}</strong> produk</p>
            </div>

            <div class="overflow-x-auto rounded-xl mt-5 bg-white border border-gray-100">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-white uppercase bg-primary">
                        <tr>
                            <th class="px-6 py-4 rounded-tl-xl">NAMA PRODUK</th>
                            <th class="px-6 py-4">BARCODE/QR</th>
                            <th class="px-6 py-4">PRODUSEN</th>
                            <th class="px-6 py-4">NO. SERTIFIKAT</th>
                            <th class="px-6 py-4 whitespace-nowrap">TGL TERBIT</th>
                            <th class="px-6 py-4 whitespace-nowrap">TGL KADALUARSA</th>
                            <th class="px-6 py-4 rounded-tr-xl text-center">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            products.forEach(item => {
                const statusClass = item.is_expired ?
                    'bg-red-100 text-red-700 border border-red-200' :
                    'bg-green-100 text-green-700 border border-green-200';

                const barcodeDisplay = item.barcode ?
                    `<span class="font-mono bg-gray-100 px-2 py-1 rounded text-gray-700">${item.barcode}</span>` :
                    '<span class="text-gray-400 italic text-xs">Tidak ada</span>';

                html += `
                <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 font-bold text-gray-900">${item.nama_produk}</td>
                    <td class="px-6 py-4">${barcodeDisplay}</td>
                    <td class="px-6 py-4 text-gray-600 uppercase">${item.nama_produsen}</td>
                    <td class="px-6 py-4 font-mono text-gray-600">${item.nomor_sertifikat}</td>
                    <td class="px-6 py-4 text-gray-600 whitespace-nowrap">${item.tanggal_terbit}</td>
                    <td class="px-6 py-4 text-gray-600 whitespace-nowrap">${item.tanggal_kadaluarsa}</td>
                    <td class="px-6 py-4 text-center">
                        <span class="${statusClass} px-3 py-1 rounded-full text-xs font-bold">${item.status_label}</span>
                    </td>
                </tr>
                `;
            });

            html += `</tbody></table></div>`;
            resultBox.innerHTML = html;
        }

        function renderNotFound(msg) {
            const resultBox = document.getElementById('resultBox');
            resultBox.innerHTML = `
            <div class="text-center py-16">
                <i class="fa-solid fa-circle-xmark text-6xl text-gray-200 mb-5"></i>
                <h3 class="text-navy font-bold text-xl mb-1">Data Tidak Ditemukan</h3>
                <p class="text-gray-500">${msg}</p>
            </div>`;
        }
    </script>
@endpush
