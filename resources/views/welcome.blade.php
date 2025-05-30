@extends('layouts.layout')

@section('title', 'Pulai Green Homestay')

@section('content')

    <!-- Hero Section -->
    <section id="hero-section" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/bg-gunung.JPEG') }}" alt="latar belakang gunung"
                class="w-full h-full object-cover object-center" loading="lazy">
            <!-- Dark Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        </div>

        <!-- Hero Content -->
        <div class="z-10 text-center px-4 opacity-0 translate-y-6 transition-all duration-1000" id="hero-content">
            <h1 class="text-4xl sm:text-6xl md:text-7xl font-semibold text-[#fdfaf6] leading-tight font-poppins">
                Selamat Datang Ke <br>
                <span class="text-nature-bark dark:text-primary-500 font-customFamily italic font-bold">Pulai Greens
                    Homestay</span>
            </h1>

            <p
                class="mt-6 sm:mt-8 text-base sm:text-lg md:text-xl font-medium text-nature-sage dark:text-nature-clay max-w-3xl mx-auto">
                <span class="text-primary-700 dark:text-nature-bark text-2xl">&#x275D;</span>
                Pengalaman Menginap yang Tidak Dapat Dilupakan
                <span class="text-primary-700 dark:text-nature-bark text-2xl">&#x275E;</span>
            </p>

            <div class="mt-8 sm:mt-10 flex flex-wrap justify-center items-center gap-x-6">
                <a href="{{ route('calendar.public') }}"
                    class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay dark:bg-primary-700 dark:text-white dark:hover:bg-primary-600 font-semibold rounded-md shadow-md px-5 py-3 text-sm sm:text-base transition transform hover:scale-[1.02] duration-300">
                    Tempah Sekarang
                </a>
                <a href="#packages" id="scrollToPackage"
                    class="text-sm sm:text-base font-semibold text-[#e6dfd0] hover:underline transition">
                    Lihat Pakej <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section id="packages"
        class="min-h-screen bg-[#e6dfd0] dark:bg-gray-900 py-14 px-4 text-center flex flex-col items-center justify-center">
        <div class="max-w-6xl mx-auto text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-gray-100 mb-2">Pakej yang ditawarkan</h2>
            <p class="text-gray-700 dark:text-gray-300">Pakej yang berbaloi dan harga berpatutan</p>
        </div>

        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 max-w-7xl mx-auto">
            <!-- Card 1 - Package A -->
            <div
                class="bg-[#fdfaf6] dark:bg-gray-700 rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 duration-300">
                <img src="{{ asset('img/kenduri/Poster A.png') }}" alt="tapak kenduri" class="w-full object-cover">
                <div class="p-6 text-left">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Tapak Kenduri</h3>
                    <div class="flex pt-2 justify-end">
                        <button data-modal-target="packageAModal" data-modal-toggle="packageAModal"
                            class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-4 py-2 shadow dark:bg-primary-700 dark:text-white dark:hover:bg-primary-600 transition hover:scale-[1.02] duration-300">
                            Lihat Butiran
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal for Package A -->
            <div id="packageAModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-[#fdfaf6] rounded-lg shadow dark:bg-gray-800">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-700">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Pakej A - Tapak Kenduri
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="packageAModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Tutup modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6">
                            <!-- Carousel with uniform image sizing -->
                            <div class="carousel w-full rounded-lg overflow-hidden">
                                <div id="slideA1" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/kenduri/kenduri-1.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideA6"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideA2"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideA2" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/kenduri/kenduri-2.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideA1"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideA3"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideA3" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/kenduri/kenduri-3.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideA2"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideA4"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideA4" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/kenduri/kenduri-4.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideA3"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideA5"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideA5" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/kenduri/kenduri-5.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideA4"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideA6"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideA6" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/kenduri/kenduri-6.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideA5"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideA1"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Details package -->
                            <div class="mt-6 text-start text-gray-800 dark:text-white">
                                <h4 class="text-lg font-semibold mb-3">Maklumat Pakej A</h4>
                                <ul class="space-y-4">
                                    <li>
                                        <span class="font-medium">Harga:</span>
                                        <span class="text-nature-bark dark:text-primary-500 font-semibold">RM1500</span>
                                    </li>
                                    <li>
                                        <span class="font-medium">Penginapan:</span> <span class="text-sm">3 hari 2
                                            malam</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li>1 Rumah Kayu</li>
                                            <li>2 Rumah Batu</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="font-medium">Kemudahan Disediakan:</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li>Tandas luar disediakan</li>
                                            <li>Kemudahan tempat cuci pinggan</li>
                                            <li>Tempat letak kereta yang luas</li>
                                            <li>Gazebo untuk bersantai</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="font-medium">Terma & Syarat:</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li><span class="font-semibold text-nature-bark dark:text-primary-500">Deposit
                                                    RM200</span> perlu
                                                dibayar terlebih dahulu</li>
                                            <li>Deposit akan dikembalikan jika kawasan kenduri sudah dibersihkan & tiada
                                                kerosakan</li>
                                            <li><span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">Khemah</span>
                                                perlu dibuka
                                                <span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">selewatnya</span>
                                                pada <span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">hari
                                                    ketiga</span> &#40;cas tambahan akan
                                                dikenakan atas
                                                kelewatan&#41;
                                            </li>
                                            <li>Pelanggaran terma & syarat akan dikenakan bayaran tambahan</li>
                                            <li class="font-semibold text-red-600 dark:text-red-400">Dilarang merokok atau
                                                vaping</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-start justify-end space-x-4 p-4 border-t rounded-b dark:border-gray-700">
                            <button type="button" data-modal-hide="packageAModal"
                                class="bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white rounded-lg border px-5 py-2.5 transition duration-300 hover:scale-[1.02]">
                                Tutup
                            </button>
                            {{-- <button type="submit"
                                class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-5 py-2.5 dark:bg-nature-moss dark:text-white dark:hover:bg-nature-fern transition duration-300 hover:scale-[1.02]">
                                Tempah
                            </button> --}}
                            <a href="{{ route('calendar.public') }}?pakej=A"
                                class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-5 py-2.5 dark:bg-nature-moss dark:text-white dark:hover:bg-nature-fern transition duration-300 hover:scale-[1.02]">Tempah</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 - Package B -->
            <div
                class="bg-[#fdfaf6] dark:bg-gray-700 rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 duration-300">
                <img src="{{ asset('img/rumah kayu merbau/Poster B.png') }}" alt="rumah kayu merbau"
                    class="w-full object-cover">
                <div class="p-6 text-left">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Rumah Kayu &#40;Merbau&#41;</h3>
                    <div class="flex pt-2 justify-end">
                        <button data-modal-target="packageBModal" data-modal-toggle="packageBModal"
                            class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-4 py-2 shadow dark:bg-primary-700 dark:text-white dark:hover:bg-primary-600 transition hover:scale-[1.02] duration-300">
                            Lihat Butiran
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal for Package B -->
            <div id="packageBModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-[#fdfaf6] rounded-lg shadow dark:bg-gray-800">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-700">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Pakej B - Rumah Kayu &#40;Merbau&#41;
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="packageBModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Tutup modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6">
                            <!-- Carousel with uniform image sizing -->
                            <div class="carousel w-full rounded-lg overflow-hidden">
                                <div id="slideB1" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah kayu merbau/kayu-1.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideB5"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideB2"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideB2" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah kayu merbau/kayu-2.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideB1"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideB3"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideB3" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah kayu merbau/kayu-3.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideB2"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideB4"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideB4" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah kayu merbau/kayu-4.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideB3"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideB5"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideB5" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah kayu merbau/kayu-5.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideB4"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideB1"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Details package -->
                            <div class="mt-6 text-start text-gray-800 dark:text-white">
                                <h4 class="text-lg font-semibold mb-3">Maklumat Pakej B</h4>
                                <ul class="space-y-4">
                                    <li>
                                        <span class="font-medium">Harga:</span>
                                        <span
                                            class="text-nature-bark dark:text-primary-500 font-semibold">RM180/malam</span>
                                    </li>
                                    <li>
                                        <span class="font-medium">Bilik:</span> <span class="text-sm">2 Bilik Tidur
                                            &#40;Katil Double&#41;</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li>3 Tandas dilengkapi pemanas air &#40;2 dalam bilik, 1 di dapur&#41;</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="font-medium">Kemudahan Disediakan:</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li>Dapur lengkap dengan peralatan memasak</li>
                                            <li>Rice cooker & kettle elektrik</li>
                                            <li>Mesin basuh & ampaian</li>
                                            <li>Peti ais & meja makan</li>
                                            <li>TV & seterika</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="font-medium">Sarapan:</span> <span
                                            class="text-nature-bark dark:text-primary-500 font-semibold">PERCUMA</span>
                                        <span class="text-sm text-gray-700 dark:text-gray-300">disediakan mengikut waktu
                                            pelanggan</span>
                                    </li>
                                    <li>
                                        <span class="font-medium">Terma & Syarat:</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li><span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">Check-in</span>
                                                bermula pukul <span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">3:00
                                                    petang</span>, <span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">check-out</span>
                                                sehingga pukul <span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">12:00
                                                    tengah
                                                    hari</span></li>
                                            <li><span class="font-semibold text-nature-bark dark:text-primary-500">Maksimum
                                                    10 orang</span> dibenarkan menginap</li>
                                            <li><span class="font-semibold text-nature-bark dark:text-primary-500">Deposit
                                                    RM50</span> diperlukan untuk tempahan &#40;dikembalikan jika tiada
                                                kerosakan &
                                                rumah bersih&#41;</li>
                                            <li class="font-semibold text-red-600 dark:text-red-400">Dilarang merokok atau
                                                vaping</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-start justify-end space-x-4 p-4 border-t rounded-b dark:border-gray-700">
                            <button type="button" data-modal-hide="packageBModal"
                                class="bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white rounded-lg border px-5 py-2.5 transition duration-300 hover:scale-[1.02]">
                                Tutup
                            </button>
                            {{-- <button type="submit"
                                class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-5 py-2.5 dark:bg-nature-moss dark:text-white dark:hover:bg-nature-fern transition duration-300 hover:scale-[1.02]">
                                Tempah
                            </button> --}}
                            <a href="{{ route('calendar.public') }}?pakej=B"
                                class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-5 py-2.5 dark:bg-nature-moss dark:text-white dark:hover:bg-nature-fern transition duration-300 hover:scale-[1.02]">Tempah</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 - Package C -->
            <div
                class="bg-[#fdfaf6] dark:bg-gray-700 rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 duration-300">
                <img src="{{ asset('img/rumah batu jati/Poster C.png') }}" alt="rumah batu jati"
                    class="w-full object-cover">
                <div class="p-6 text-left">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Rumah Batu &#40;Jati&#41;</h3>
                    <div class="flex pt-2 justify-end">
                        <button data-modal-target="packageCModal" data-modal-toggle="packageCModal"
                            class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-4 py-2 shadow dark:bg-primary-700 dark:text-white dark:hover:bg-primary-600 transition hover:scale-[1.02] duration-300">
                            Lihat Butiran
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal for Package C -->
            <div id="packageCModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-[#fdfaf6] rounded-lg shadow dark:bg-gray-800">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-700">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Pakej C - Rumah Batu &#40;Jati&#41;
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="packageCModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Tutup modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6">
                            <!-- Carousel with uniform image sizing -->
                            <div class="carousel w-full rounded-lg overflow-hidden">
                                <div id="slideC1" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah batu jati/batu-1.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideC3"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideC2"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideC2" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah batu jati/batu-2.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideC1"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideC3"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideC3" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah batu jati/batu-3.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideC2"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideC1"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Details package -->
                            <div class="mt-6 text-start text-gray-800 dark:text-white">
                                <h4 class="text-lg font-semibold mb-3">Maklumat Pakej C</h4>
                                <ul class="space-y-4">
                                    <li>
                                        <span class="font-medium">Harga:</span>
                                        <span
                                            class="text-nature-bark dark:text-primary-500 font-semibold">RM120/malam</span>
                                    </li>
                                    <li>
                                        <span class="font-medium">Bilik:</span> <span class="text-sm">1 Bilik Tidur
                                            &#40;Katil Double&#41;</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li>Bilik dilengkapi penyejuk udara &#40;aircond&#41;</li>
                                            <li>Tandas dilengkapi pemanas air</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="font-medium">Kemudahan Disediakan:</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li>Kettle elektrik</li>
                                            <li>TV</li>
                                            <li>Seterika</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="font-medium">Terma & Syarat:</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li><span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">Check-in</span>
                                                bermula pukul <span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">3:00
                                                    petang</span>, <span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">check-out</span>
                                                sehingga pukul <span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">12:00
                                                    tengah
                                                    hari</span></li>
                                            <li><span class="font-semibold text-nature-bark dark:text-primary-500">Maksimum
                                                    3 orang</span> dibenarkan menginap</li>
                                            <li><span class="font-semibold text-nature-bark dark:text-primary-500">Deposit
                                                    RM50</span> diperlukan untuk tempahan &#40;dikembalikan jika tiada
                                                kerosakan &
                                                rumah bersih&#41;</li>
                                            <li class="font-semibold text-red-600 dark:text-red-400">Dilarang merokok atau
                                                vaping</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-start justify-end space-x-4 p-4 border-t rounded-b dark:border-gray-700">
                            <button type="button" data-modal-hide="packageCModal"
                                class="bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white rounded-lg border px-5 py-2.5 transition duration-300 hover:scale-[1.02]">
                                Tutup
                            </button>
                            {{-- <button type="submit"
                                class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-5 py-2.5 dark:bg-nature-moss dark:text-white dark:hover:bg-nature-fern transition duration-300 hover:scale-[1.02]">
                                Tempah
                            </button> --}}
                            <a href="{{ route('calendar.public') }}?pakej=C"
                                class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-5 py-2.5 dark:bg-nature-moss dark:text-white dark:hover:bg-nature-fern transition duration-300 hover:scale-[1.02]">Tempah</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 - Package D -->
            <div
                class="bg-[#fdfaf6] dark:bg-gray-700 rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 duration-300">
                <img src="{{ asset('img/rumah batu meranti/Poster D.png') }}" alt="rumah batu meranti"
                    class="w-full object-cover">
                <div class="p-6 text-left">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Rumah Batu &#40;Meranti&#41;
                    </h3>
                    <div class="flex pt-2 justify-end">
                        <button data-modal-target="packageDModal" data-modal-toggle="packageDModal"
                            class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-4 py-2 shadow dark:bg-primary-700 dark:text-white dark:hover:bg-primary-600 transition hover:scale-[1.02] duration-300">
                            Lihat Butiran
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal for Package D -->
            <div id="packageDModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-[#fdfaf6] rounded-lg shadow dark:bg-gray-800">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-700">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Pakej D - Rumah Batu &#40;Meranti&#41;
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="packageDModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Tutup modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6">
                            <!-- Carousel with uniform image sizing -->
                            <div class="carousel w-full rounded-lg overflow-hidden">
                                <div id="slideD1" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah batu meranti/batu-1.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideD5"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideD2"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideD2" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah batu meranti/batu-2.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideD1"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideD3"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideD3" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah batu meranti/batu-3.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideD2"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideD4"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideD4" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah batu meranti/batu-4.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideD3"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideD5"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="slideD5" class="carousel-item relative w-full">
                                    <img src="{{ asset('img/rumah batu meranti/batu-5.jpg') }}"
                                        class="w-full h-[300px] md:h-[400px] object-cover rounded-lg" />
                                    <div
                                        class="absolute flex justify-between items-center transform -translate-y-1/2 left-4 right-4 top-1/2">
                                        <!-- Previous Button -->
                                        <a href="#slideD4"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                            <span class="sr-only">Before</span>
                                        </a>

                                        <!-- Next Button -->
                                        <a href="#slideD1"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-400 hover:text-gray-900 dark:text-gray-200 dark:bg-gray-600 dark:hover:bg-gray-900 dark:hover:text-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transform transition hover:scale-105 duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                            <span class="sr-only">After</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Details package -->
                            <div class="mt-6 text-start text-gray-800 dark:text-white">
                                <h4 class="text-lg font-semibold mb-3">Maklumat Pakej D</h4>
                                <ul class="space-y-4">
                                    <li>
                                        <span class="font-medium">Harga:</span>
                                        <span
                                            class="text-nature-bark dark:text-primary-500 font-semibold">RM220/malam</span>
                                    </li>
                                    <li>
                                        <span class="font-medium">Bilik:</span> <span class="text-sm">2 Bilik Tidur
                                            &#40;Katil Double&#41;</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li>Setiap bilik dilengkapi penyejuk udara &#40;aircond&#41;</li>
                                            <li>Tandas di setiap bilik dilengkapi pemanas air</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="font-medium">Kemudahan Disediakan:</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li>Ruang tamu yang luas</li>
                                            <li>Kettle elektrik</li>
                                            <li>TV</li>
                                            <li>Seterika</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="font-medium">Terma & Syarat:</span>
                                        <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <li><span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">Check-in</span>
                                                bermula pukul <span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">3:00
                                                    petang</span>, <span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">check-out</span>
                                                sehingga pukul <span
                                                    class="font-semibold text-nature-bark dark:text-primary-500">12:00
                                                    tengah
                                                    hari</span></li>
                                            <li><span class="font-semibold text-nature-bark dark:text-primary-500">Maksimum
                                                    6 orang</span> dibenarkan menginap</li>
                                            <li><span class="font-semibold text-nature-bark dark:text-primary-500">Deposit
                                                    RM50</span> diperlukan untuk tempahan &#40;dikembalikan jika tiada
                                                kerosakan &
                                                rumah bersih&#41;</li>
                                            <li class="font-semibold text-red-600 dark:text-red-400">Dilarang merokok atau
                                                vaping</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-start justify-end space-x-4 p-4 border-t rounded-b dark:border-gray-700">
                            <button type="button" data-modal-hide="packageDModal"
                                class="bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white rounded-lg border px-5 py-2.5 transition duration-300 hover:scale-[1.02]">
                                Tutup
                            </button>
                            {{-- <button type="submit"
                                class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-5 py-2.5 dark:bg-nature-moss dark:text-white dark:hover:bg-nature-fern transition duration-300 hover:scale-[1.02]">
                                Tempah
                            </button> --}}
                            <a href="{{ route('calendar.public') }}?pakej=D"
                                class="bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium rounded-md px-5 py-2.5 dark:bg-nature-moss dark:text-white dark:hover:bg-nature-fern transition duration-300 hover:scale-[1.02]">Tempah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews"
        class="min-h-screen bg-gray-200 dark:bg-gray-700 text-black py-12 px-4 sm:px-8 flex flex-col items-center justify-center">
        <div class="max-w-6xl mx-auto text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white mb-2">Ulasan Tetamu</h2>
            <p class="text-gray-700 dark:text-gray-300">Tahap kepuasan pelanggan</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
            <div class="flex flex-col gap-6">
                @php
                    $reviews = [
                        [
                            'rating' => 5,
                            'title' => 'Lokasi yang strategik',
                            'content' =>
                                'Lokasi homestay sangat dekat dengan kawasan tarikan pelancong di sekitar Baling.',
                            'author' => 'Alif Najmi',
                        ],
                        [
                            'rating' => 5,
                            'title' => 'Selesa dan tenang',
                            'content' => 'Suasana homestay yang selesa dan tenang menghadap sawah padi.',
                            'author' => 'Athif Fitri',
                        ],
                        [
                            'rating' => 5,
                            'title' => 'Mesra keluarga',
                            'content' => 'Kawasan homestay yang luas dan sesuai untuk percutian keluarga.',
                            'author' => 'Amirul Najihin',
                        ],
                    ];
                @endphp

                @foreach ($reviews as $review)
                    <div
                        class="bg-[#fdfaf6] dark:bg-gray-800 text-gray-900 dark:text-white rounded-xl shadow-md p-6 hover:scale-105 transform transition-all duration-300">

                        <!-- Rating and Button in the same row -->
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $review['rating'] ? 'text-amber-600' : 'text-gray-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.196 3.685a1 1 0 00.95.69h3.873c.969 0 1.371 1.24.588 1.81l-3.132 2.273a1 1 0 00-.364 1.118l1.197 3.684c.3.922-.755 1.688-1.538 1.118l-3.132-2.273a1 1 0 00-1.175 0l-3.132 2.273c-.783.57-1.838-.196-1.538-1.118l1.197-3.684a1 1 0 00-.364-1.118L2.34 9.112c-.783-.57-.38-1.81.588-1.81h3.873a1 1 0 00.95-.69l1.196-3.685z" />
                                    </svg>
                                @endfor
                            </div>

                            <a href="https://www.google.com/travel/search?q=Pulai%20Greens%20Homestay&g2lb=4965990%2C4969803%2C72277293%2C72302247%2C72317059%2C72406588%2C72414906%2C72471280%2C72472051%2C72481459%2C72485658%2C72560029%2C72573224%2C72616120%2C72619927%2C72647020%2C72648289%2C72686036%2C72760082%2C72803964%2C72827241%2C72832976%2C72882230%2C72885032%2C72941449%2C72948010%2C72949855&hl=en-MY&gl=my&cs=1&ssta=1&ts=CAEaKwopEicyJTB4MzFiNGQ5MDQzNzY1YzY2NzoweGEzNDgzODA5MGNlYzc0MzQ&qs=CAEyFENnc0l0T2l4NTVDQmpxU2pBUkFCOAI&ap=ugEHcmV2aWV3cw&ictx=111&ved=0CAAQ5JsGahcKEwiQ0Jvcg4KNAxUAAAAAHQAAAAAQBQ"
                                target="_blank"
                                class="inline-block bg-nature-stone text-[#5d574a] hover:bg-nature-clay font-medium text-sm rounded-md px-4 py-2 shadow dark:bg-primary-700 dark:text-white dark:hover:bg-primary-600 transform transition hover:scale-[1.02] duration-300">
                                Lihat di Google
                            </a>
                        </div>

                        <h3 class="text-lg font-semibold mb-1">{{ $review['title'] }}</h3>
                        <p class="text-sm mb-3">{{ $review['content'] }}</p>
                        <p class="text-sm italic text-nature-bark dark:text-primary-500 font-semibold text-right">~
                            {{ $review['author'] }}</p>
                    </div>
                @endforeach

            </div>

            <div class="w-full h-[300px] md:h-[450px] rounded-xl overflow-hidden shadow-md">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3592.991676341888!2d100.88481308486435!3d5.657316658963338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31b4d9043765c667%3A0xa34838090cec7434!2sPulai%20Greens%20Homestay!5e1!3m2!1sen!2smy!4v1745297125101!5m2!1sen!2smy"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- FAQ & Contact Us Section -->
    <section id="faq"
        class="min-h-screen bg-[#e6dfd0] dark:bg-gray-900 py-16 px-4 flex flex-col items-center justify-center">
        <div class="max-w-6xl mx-auto text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-gray-100 mb-2">Pusat Bantuan</h2>
            <p class="text-gray-700 dark:text-gray-300">Soalan lazim & cara hubungi kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- FAQ -->
            <div class="bg-[#fdfaf6] dark:bg-gray-800 shadow-lg rounded-xl">
                <div class="space-y-4 p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-white">Soalan Lazim &#40;FAQ&#41;</h3>
                    <div
                        class="collapse collapse-plus bg-[#fff7ee] dark:bg-gray-700 border border-gray-300 dark:border-gray-600 shadow-lg">
                        <input type="radio" name="faq-accordion" checked />
                        <div class="collapse-title font-semibold text-amber-700 dark:text-primary-400">
                            Bagaimana untuk membuat akaun?
                        </div>
                        <div class="collapse-content text-sm text-gray-700 dark:text-gray-300">
                            Klik butang "Daftar" di penjuru kanan atas dan ikut proses pendaftaran.
                        </div>
                    </div>

                    <div
                        class="collapse collapse-plus bg-[#fff7ee] dark:bg-gray-700 border border-gray-300 dark:border-gray-600 shadow-lg">
                        <input type="radio" name="faq-accordion" />
                        <div class="collapse-title font-semibold text-amber-700 dark:text-primary-400">
                            Saya lupa kata laluan. Apa yang perlu saya lakukan?
                        </div>
                        <div class="collapse-content text-sm text-gray-700 dark:text-gray-300">
                            Klik "Lupa Kata Laluan" pada halaman log masuk dan ikut arahan yang dihantar ke emel anda.
                        </div>
                    </div>

                    <div
                        class="collapse collapse-plus bg-[#fff7ee] dark:bg-gray-700 border border-gray-300 dark:border-gray-600 shadow-lg">
                        <input type="radio" name="faq-accordion" />
                        <div class="collapse-title font-semibold text-amber-700 dark:text-primary-400">
                            Bagaimana untuk mengemaskini maklumat profil saya?
                        </div>
                        <div class="collapse-content text-sm text-gray-700 dark:text-gray-300">
                            Pergi ke tetapan "Akaun Saya" dan pilih "Edit Profil" untuk membuat perubahan.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Us -->
            <div class="flex items-center justify-center">
                <div class="bg-[#fdfaf6] dark:bg-gray-800 shadow-lg rounded-xl">
                    <div class="space-y-4 p-6">
                        <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Hubungi Kami</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            Jika anda mempunyai sebarang pertanyaan, jangan ragu untuk menghubungi kami:
                        </p>
                        <div class="text-gray-800 dark:text-gray-200 space-y-4">
                            <p class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 5a2 2 0 012-2h3.6a1 1 0 01.9.6l1.4 3a1 1 0 01-.1 1L9.2 9.8a11 11 0 005 5l1.2-1.6a1 1 0 011-.1l3 1.4a1 1 0 01.6.9V19a2 2 0 01-2 2h-1c-8.3 0-15-6.7-15-15V5z" />
                                </svg>
                                <strong>No Telefon:</strong>
                                <a href="https://wa.me/601110106876" target="_blank" class="text-sm sm:text-base"><span
                                        class="hover:text-green-600 dark:hover:text-green-400">+60 011-10106876</span>
                                    <span class="ml-2 font-semibold text-amber-700 dark:text-primary-400"> &#40;Puan
                                        Sarah&#41;</span></a>
                            </p>
                            <p class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <strong>Emel:</strong>
                                <a href="mailto:azamuddinmansor@gmail.com"
                                    class="hover:text-blue-600 dark:hover:text-blue-400 text-sm sm:text-base">
                                    <span>azamuddinmansor@gmail.com</span>
                                </a>
                            </p>
                            <p class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 11c1.38 0 2.5-1.12 2.5-2.5S13.38 6 12 6s-2.5 1.12-2.5 2.5S10.62 11 12 11z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 22s8-7.58 8-13A8 8 0 004 9c0 5.42 8 13 8 13z" />
                                </svg>
                                <strong>Lokasi:</strong>
                                <a href="https://maps.app.goo.gl/WMKQbHaXHSfM8rxe7" target="_blank"
                                    class="hover:text-red-600 dark:hover:text-red-400 text-sm sm:text-base">
                                    <span>Pekan Pulai, 09100 Baling, Kedah, Malaysia</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scroll to Top Button -->
    <button id="scrollToTopBtn" title="Go to top"
        class="hidden fixed bottom-6 right-6 z-50 p-3 bg-nature-clay text-gray-900 hover:bg-nature-bark dark:bg-primary-700 dark:text-white dark:hover:bg-primary-600 rounded-lg transform transition hover:scale-105 duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const hero = document.getElementById("hero-content");
            const scrollToTopBtn = document.getElementById('scrollToTopBtn');

            setTimeout(() => {
                hero.classList.remove("opacity-0", "translate-y-6");
                hero.classList.add("opacity-100", "translate-y-0");
            }, 150);

            document.getElementById("scrollToPackage").addEventListener("click", (e) => {
                e.preventDefault();
                document.getElementById("packages").scrollIntoView({
                    behavior: "smooth"
                });
            });

            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    scrollToTopBtn.classList.remove('hidden');
                } else {
                    scrollToTopBtn.classList.add('hidden');
                }
            });

            scrollToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endsection
