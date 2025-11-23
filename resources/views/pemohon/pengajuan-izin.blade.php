<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Izin - SIOPKB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    @include('components.pemohon-header')

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1">
        <!-- Page Header with Breadcrumbs -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Pengajuan Izin</h1>
            <div class="flex items-center text-sm text-gray-500">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <a href="{{ route('pemohon.dashboard') }}" class="hover:text-gray-700">Home</a>
                <span class="mx-2">></span>
                <span>Pengajuan Perizinan</span>
            </div>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-6">
            <!-- Title and Subtitle -->
            <p class="text-lg text-gray-600 mb-6">Pilih Jalur Pendidikan</p>

            <!-- Segmented Control: Formal and Nonformal -->
            <div class="inline-flex border border-red-600 rounded-lg overflow-hidden mb-8" role="group">
                <button id="btn-formal" 
                        onclick="switchTab('formal')" 
                        class="px-6 py-2 bg-red-600 text-white font-medium border-r border-red-600 focus:outline-none">
                    Formal
                </button>
                <button id="btn-nonformal" 
                        onclick="switchTab('nonformal')" 
                        class="px-6 py-2 bg-white text-red-600 font-medium focus:outline-none">
                    Nonformal
                </button>
            </div>

            <!-- Formal Education Level Cards -->
            <div id="formal-cards" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1: Nava Dhammasekha -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-start mb-4">
                        <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg text-gray-900 mb-3">Nava Dhammasekha</h3>
                    <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                        Pendidikan dasar keagamaan Buddha setingkat sekolah dasar. Persyaratan lengkap mencakup akta notaris, kurikulum, daftar guru, hingga studi kelayakan.
                    </p>
                    <a href="{{ route('nava-dhammasekha') }}" class="text-sm font-medium text-red-600 hover:text-red-700 inline-flex items-center">
                        Ajukan Perizinan
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Card 2: Mula Dhammasekha -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-start mb-4">
                        <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg text-gray-900 mb-3">Mula Dhammasekha</h3>
                    <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                        Pendidikan keagamaan Buddha setingkat sekolah menengah pertama. Membutuhkan dokumen legalitas badan hukum, kurikulum, sarpras, dan SK pendirian.
                    </p>
                    <a href="{{ route('mula-dhammasekha') }}" class="text-sm font-medium text-red-600 hover:text-red-700 inline-flex items-center">
                        Ajukan Perizinan
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Card 3: Muda Dammasekha -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-start mb-4">
                        <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg text-gray-900 mb-3">Muda Dammasekha</h3>
                    <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                        Pendidikan keagamaan Buddha setingkat sekolah menengah atas. Persyaratan meliputi akta notaris, kurikulum, SK pengurus, serta daftar pendidik dan tenaga kependidikan.
                    </p>
                    <a href="{{ route('muda-dhammasekha') }}" class="text-sm font-medium text-red-600 hover:text-red-700 inline-flex items-center">
                        Ajukan Perizinan
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Card 4: Uttama Dhammasekha -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-start mb-4">
                        <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg text-gray-900 mb-3">Uttama Dhammasekha</h3>
                    <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                        Pendidikan keagamaan Buddha setingkat perguruan tinggi. Dokumen yang diminta mencakup akta notaris, kurikulum, sarpras, SK kepala, hingga rencana induk pengembangan.
                    </p>
                    <a href="{{ route('uttama-dhammasekha') }}" class="text-sm font-medium text-red-600 hover:text-red-700 inline-flex items-center">
                        Ajukan Perizinan
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Nonformal Education Level Cards -->
            <div id="nonformal-cards" class="hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1: Pasastrian -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-start mb-4">
                        <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg text-gray-900 mb-3">Pasastrian</h3>
                    <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                        Pendidikan nonformal berbasis asrama dengan syarat dokumen strategis: rencana pengembangan, kalender pendidikan, data siswa & pendidik, serta surat kesanggupan biaya 3 tahun.
                    </p>
                    <a href="#" class="text-sm font-medium text-red-600 hover:text-red-700 inline-flex items-center">
                        Ajukan Perizinan
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Card 2: Sekolah Minggu Buddha -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-start mb-4">
                        <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg text-gray-900 mb-3">Sekolah Minggu Buddha</h3>
                    <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                        Pendidikan nonformal untuk anak-anak dan remaja. Persyaratan sederhana berupa SK pengurus, rencana program pendidikan, data peserta, data pendidik, serta surat domisili yayasan.
                    </p>
                    <a href="#" class="text-sm font-medium text-red-600 hover:text-red-700 inline-flex items-center">
                        Ajukan Perizinan
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Card 3: Sikkaphana -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-start mb-4">
                        <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg text-gray-900 mb-3">Sikkaphana</h3>
                    <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                        Pendidikan nonformal bagi komunitas dan masyarakat umum. Dokumen wajib meliputi SK pengurus, rencana strategis, kalender kegiatan, data siswa & tenaga pendidik, serta surat pernyataan keabsahan dokumen.
                    </p>
                    <a href="#" class="text-sm font-medium text-red-600 hover:text-red-700 inline-flex items-center">
                        Ajukan Perizinan
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </main>
    @include('components.pemohon-footer')

    <script>
        function switchTab(tab) {
            const formalBtn = document.getElementById('btn-formal');
            const nonformalBtn = document.getElementById('btn-nonformal');
            const formalCards = document.getElementById('formal-cards');
            const nonformalCards = document.getElementById('nonformal-cards');

            if (tab === 'formal') {
                // Update buttons
                formalBtn.classList.remove('bg-white', 'text-red-600');
                formalBtn.classList.add('bg-red-600', 'text-white');
                nonformalBtn.classList.remove('bg-red-600', 'text-white');
                nonformalBtn.classList.add('bg-white', 'text-red-600');
                
                // Update cards visibility
                formalCards.classList.remove('hidden');
                nonformalCards.classList.add('hidden');
            } else {
                // Update buttons
                nonformalBtn.classList.remove('bg-white', 'text-red-600');
                nonformalBtn.classList.add('bg-red-600', 'text-white');
                formalBtn.classList.remove('bg-red-600', 'text-white');
                formalBtn.classList.add('bg-white', 'text-red-600');
                
                // Update cards visibility
                nonformalCards.classList.remove('hidden');
                formalCards.classList.add('hidden');
            }
        }
    </script>
</body>
</html>

