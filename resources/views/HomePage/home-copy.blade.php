<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pulai Greens Homestay</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Awesome Icon-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
    {{-- Splide CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.11/dist/css/splide.min.css">

</head>

<body class="bg-white text-green-800 font-sans">
    <!-- Hero Section -->
    <section class="hero-gradient text-white py-20">
        <div class="container mx-auto px-6 lg:px-12 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang ke Pulai Greens Homestay</h1>
            <p class="text-lg md:text-xl mb-6">Penginapan Selesa, Pemandangan Indah, dan Servis Mesra</p>
            <button onclick="openChatbot()"
                class="bg-white font-semibold py-3 px-6 rounded-lg hover:bg-gray-100 animate-float transition"
                style="color: black;">
                Chat dengan Ai Bot Kami
            </button>
        </div>
    </section>

    {{-- Gallery Section --}}
    <section id="thumbnail-carousel" class="splide"
        aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img src="{{ asset('assets/images/batu 1.jpg') }}" alt="">
                </li>
                <li class="splide__slide">
                    <img src="{{ asset('assets/images/batu 2.jpg') }}" alt="">
                </li>
                <li class="splide__slide">
                    <img src="{{ asset('assets/images/kayu 4.jpg') }}" alt="">
                </li>
            </ul>
        </div>
    </section>

    <style>
        .splide__slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .splide__slide {
            opacity: 0.6;
        }


        .splide__slide.is-active {
            opacity: 1;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {



            var thumbnails = new Splide('#thumbnail-carousel', {
                fixedWidth: 100,
                fixedHeight: 60,
                gap: 10,
                rewind: true,
                pagination: false,
                isNavigation: true,
                breakpoints: {
                    600: {
                        fixedWidth: 60,
                        fixedHeight: 44,
                    },
                },
            });


            main.sync(thumbnails);
            main.mount();
            thumbnails.mount();
        });
    </script>


    <!-- About Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 lg:px-12 text-center">
            <h2 class="text-3xl font-bold text-green-600 mb-8">Kenapa Pilih Kami?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-white rounded-lg shadow-lg transform transition-transform hover:scale-105">
                    <img src="{{ asset('assets/images/batu 1.jpg') }}" alt="Comfort" class="mx-auto mb-4 w-100 h-100">
                    <h3 class="text-xl font-semibold mb-2">Keselesaan Terjamin</h3>
                    <p class="text-gray-700">Kami menawarkan bilik yang luas, bersih, dan selesa untuk pengalaman
                        terbaik anda.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg transform transition-transform hover:scale-105">
                    <img src="{{ asset('assets/images/kayu 4.jpg') }}" alt="View" class="mx-auto mb-4 w-100 h-100">
                    <h3 class="text-xl font-semibold mb-2">Pemandangan Indah</h3>
                    <p class="text-gray-700">Nikmati kehijauan alam semula jadi yang menyegarkan mata dan minda anda.
                    </p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg transform transition-transform hover:scale-105">
                    <img src="{{ asset('assets/images/batu 2.jpg') }}" alt="Service" class="mx-auto mb-4 w-100 h-100">
                    <h3 class="text-xl font-semibold mb-2">Layanan Mesra</h3>
                    <p class="text-gray-700">Staff kami sentiasa sedia membantu untuk memastikan keselesaan anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pakej Section -->
    <section id="pakej-section" class="container mx-auto px-3 lg:px-12 text-center">
        <h2 class="text-3xl font-bold text-center mb-8">✨ PROMOSI PAKEJ KENDURI DI PULAI GREENS HOMESTAY ✨</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-8">

            <!-- Card 1 (Retained as-is) -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-full">
                <img src="{{ asset('assets/images/Poster A.png') }}" alt="Pakej 1 - Tapak Kenduri"
                    class="w-full h-48 object-cover">

                <!-- Main card content -->
                <div class="p-6 flex-grow">
                    <h3 class="text-xl font-semibold mb-4">Pakej A - Tapak Kenduri</h3>
                    <p class="text-gray-700 mb-4">HARGA: RM1500 SHJ 🤯</p>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-center"><i class="ri-landscape-line text-green-500 mr-2"></i> Tapak
                            majlis/ kenduri yg luas</li>
                        <li class="flex items-center"><i class="ri-umbrella-line text-green-500 mr-2"></i> Muat sehingga
                            7 biji khemah</li>
                        <li class="flex items-center"><i class="ri-home-2-line text-green-500 mr-2"></i> Termasuk 1
                            Rumah Kayu & 2 Rumah Batu untuk 3 hari</li>
                        <li class="flex items-center"><i class="fas fa-restroom text-green-500 mr-2"></i> Tandas luar
                            disediakan.</li>
                        <li class="flex items-center"><i class="ri-restaurant-line text-green-500 mr-2"></i> Kemudahan
                            tempat cuci pinggan untuk catering disediakan</li>
                        <li class="flex items-center"><i class="ri-parking-box-line text-green-500 mr-2"></i> Tempat
                            letak kereta yang luas</li>
                        <li class="flex items-center"><i class="ri-sun-line text-green-500 mr-2"></i> Gazebo untuk
                            bersantai</li>
                    </ul>
                </div>

                <!-- Button at the bottom of the card -->
                <div class="p-6 bg-gray-100 text-center">
                    <a href="#" style="background-color: #248347; color: white;"
                        class="py-2 px-4 rounded-full hover:bg-green-600 transition duration-200">
                        Book Sekarang!
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ asset('assets/images/Poster B.png') }}" alt="Pakej B" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4">Pakej B - Rumah Kayu (MERBAU)</h3>
                    <p class="text-gray-700 mb-4">HARGA: RM180 /malam</p>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-center">
                            <i class="ri-landscape-line text-green-500 mr-2"></i> Pemandangan sawah padi yang cantik
                        </li>
                        <li class="flex items-center">
                            <i class="ri-home-2-line text-green-500 mr-2"></i> 2 bilik tidur dengan katil double
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-restroom text-green-500 mr-2"></i> 3 tandas
                        </li>
                        <li class="flex items-center">
                            <i class="ri-restaurant-line text-green-500 mr-2"></i> Dapur lengkap dengan peralatan
                            memasak
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-drumstick-bite text-green-500 mr-2"></i> Rice cooker dan kettle elektrik
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-tint text-green-500 mr-2"></i> Mesin basuh dan peti ais
                        </li>
                        <li class="flex items-center">
                            <i class="ri-tv-line text-green-500 mr-2"></i> TV, seterika, dan ampaian
                        </li>
                        <li class="flex items-center">
                            <i class="ri-restaurant-line text-green-500 mr-2"></i> Breakfast PERCUMA disediakan
                        </li>
                    </ul>
                </div>
                <!-- Button at the bottom of the card -->
                <div class="p-6 bg-gray-100 text-center">
                    <a href="#" style="background-color: #248347; color: white;"
                        class="py-2 px-4 rounded-full hover:bg-green-200 transition duration-200">
                        Book Sekarang!
                    </a>
                </div>
            </div>

            <!-- Card 3 (Pakej C - Rumah Batu 1) -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-full">
                <img src="{{ asset('assets/images/Poster C.png') }}" alt="Pakej C"
                    class="w-full h-48 object-cover">

                <!-- Main card content -->
                <div class="p-6 flex-grow">
                    <h3 class="text-xl font-semibold mb-4">Pakej C - Rumah Batu 1 (JATI)</h3>
                    <p class="text-gray-700 mb-4">HARGA: RM120 /malam</p>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-center"><i class="ri-home-2-line text-green-500 mr-2"></i> 1 bilik tidur
                            dengan katil double (penyejuk udara)</li>
                        <li class="flex items-center"><i class="fas fa-restroom text-green-500 mr-2"></i> 1 tandas
                            dengan pemanas air</li>
                        <li class="flex items-center"><i class="ri-tv-line text-green-500 mr-2"></i> Kettle elektrik,
                            TV, dan seterika</li>
                        <li class="flex items-center">
                            <i class="ri-restaurant-line text-green-500 mr-2"></i> Breakfast PERCUMA disediakan
                        </li>
                    </ul>
                </div>

                <!-- Button at the bottom of the card -->
                <div class="p-6 bg-gray-100 text-center">
                    <a href="#" style="background-color: #248347; color: white;"
                        class="py-2 px-4 rounded-full hover:bg-green-600 transition duration-200">
                        Book Sekarang!
                    </a>
                </div>
            </div>


            <!-- Card 4 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ asset('assets/images/Poster D.png') }}" alt="Pakej D"
                    class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4">Pakej D - Rumah Batu 2 (MERANTI)</h3>
                    <p class="text-gray-700 mb-4">HARGA: RM220 /malam</p>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-center">
                            <i class="ri-home-2-line text-green-500 mr-2"></i> 2 bilik tidur dengan katil double
                            (penyejuk udara)
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-restroom text-green-500 mr-2"></i> 2 tandas dengan pemanas air
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-couch text-green-500 mr-2"></i> Ruang tamu yang luas
                        </li>
                        <li class="flex items-center">
                            <i class="ri-tv-line text-green-500 mr-2"></i> Kettle elektrik, TV, dan seterika
                        </li>
                        <li class="flex items-center">
                            <i class="ri-restaurant-line text-green-500 mr-2"></i> Breakfast PERCUMA disediakan
                        </li>
                    </ul>
                </div>
                <!-- Button at the bottom of the card -->
                <div class="p-6 bg-gray-100 text-center">
                    <a href="#" style="background-color: #248347; color: white;"
                        class="py-2 px-4 rounded-full hover:bg-green-600 transition duration-200">
                        Book Sekarang!
                    </a>
                </div>
            </div>

        </div>
    </section>


    <!-- Testimonials Section -->
    <section class="py-16 bg-grey" style="background-color:#f4f0e6">
        <div class="container mx-auto px-6 lg:px-12 text-center">
            <h2 class="text-3xl font-bold text-green-600 mb-8">Apa Kata Pelanggan Kami?</h2>
            <div class="relative overflow-hidden">
                <div class="flex gap-8 scroll-animation">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-64">
                        <p class="text-gray-700">" Tempat yang sangat selesa dan bersih! Pasti akan datang lagi."</p>
                        <span class="block mt-4 text-green-600 font-bold">- Aina M.</span>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg w-64">
                        <p class="text-gray-700">"Layanan mesra dan persekitaran yang tenang. Sangat disyorkan!"</p>
                        <span class="block mt-4 text-green-600 font-bold">- Amir R.</span>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg w-64">
                        <p class="text-gray-700">"Pemandangan yang menakjubkan dan bilik yang selesa!"</p>
                        <span class="block mt-4 text-green-600 font-bold">- Siti A.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hubungi Kami Section -->
    <section class="py-16 bg-grey" style="background-color:#f4f0e6">
        <div class="container mx-auto px-6 lg:px-12 text-center">
            <h2 class="text-3xl font-bold text-green-600 mb-8">Hubungi Kami</h2>

            <!-- Button Row -->
            <div class="flex flex-col items-center gap-4 mt-4">
                <!-- WhatsApp Button -->
                <a href="https://wa.me/+601110106876" target="_blank"
                    class="w-48 py-2 rounded-lg bg-[#25D366] text-white font-semibold hover:bg-[#1ebe57] transition-colors text-center"
                    style="background-color: #25D366">
                    <i class="fab fa-whatsapp mr-2"></i> Whatsapp Kami
                </a>

                <!-- Google Maps Button -->
                <a href="https://maps.app.goo.gl/kcyZgVgnNE4zXMkJ9" target="_blank"
                    class="w-48 py-2 rounded-lg bg-[#4285F4] text-white font-semibold hover:bg-[#357ae8] transition-colors text-center"
                    style="background-color: #4285F4">
                    <i class="fas fa-map-marker-alt mr-2"></i> Lokasi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('include/footer')

    <!-- Chatbot Widget -->
    <div id="chatbox"
        class="hidden fixed bottom-10 right-10 w-80 h-96 bg-white border-2 border-green-600 shadow-lg rounded-lg">
        <div class="p-4 bg-green-600 text-white font-bold">Pulai Greens Chatbot</div>
        <iframe id="chatbase" src="https://www.chatbase.co/chatbot/YOUR_CHATBASE_BOT_ID" width="100%"
            height="85%" frameborder="0"></iframe>
        <button onclick="closeChatbot()" class="bg-green-600 text-white py-2 px-4 w-full">Close</button>
    </div>

    <script>
        function openChatbot() {
            document.getElementById('chatbox').classList.remove('hidden');
        }

        function closeChatbot() {
            document.getElementById('chatbox').classList.add('hidden');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.11/dist/js/splide.min.js"></script>

</body>

</html>
