<!-- Key Guidelines Modal Component -->
<div id="keyGuidelinesModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-[#fdfaf6] rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Panduan Kunci Pulai Greens Homestay
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="keyGuidelinesModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6">
                <div class="flex flex-col items-center">
                    <!-- Guidelines Image -->
                    <div class="w-full overflow-hidden rounded-lg mb-4">
                        <img src="{{ asset('assets/images/Panduan Kunci PGH.png') }}"
                            alt="Panduan Kunci Pulai Greens Homestay" class="w-full h-auto">
                    </div>

                    <!-- Additional Information -->
                    <div
                        class="mt-4 mb-2 text-sm text-amber-700 dark:text-amber-400 bg-amber-100 dark:bg-amber-900/30 p-3 rounded-lg w-full">
                        <p class="font-medium">Nota Penting:</p>
                        <p>Sila ikut panduan di atas untuk mengambil dan menggunakan kunci semasa daftar masuk.</p>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="flex items-start justify-end space-x-4 p-4 border-t rounded-b dark:border-gray-700">
                <button type="button" data-modal-hide="keyGuidelinesModal"
                    class="bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white rounded-lg border px-5 py-2.5 transition duration-300 hover:scale-[1.02]">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>