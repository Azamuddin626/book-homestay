@extends('layouts.layout')

@section('title', 'Sistem Tempahan Homestay')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center text-nature-bark dark:text-white mb-4">Sistem Tempahan Homestay</h1>

    @if (session('success'))
    <div class="p-4 mb-4 text-nature-fern rounded-lg bg-nature-leaf dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <!-- Centered Buttons -->
    <div class="flex justify-center space-x-4 mb-8">
        <button data-modal-target="bookingModal" data-modal-toggle="bookingModal"
            class="bg-nature-fern hover:bg-nature-moss text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 1v16M1 9h16" />
            </svg>
            Tambah Tempahan
        </button>
        <a href="{{ route('bookings.list') }}"
            class="bg-nature-sage hover:bg-nature-moss text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l2.586 2.586c.391.39.586.902.586 1.414v11c0 .828-.672 1.5-1.5 1.5h-9c-.828 0-1.5-.672-1.5-1.5v-13c0-.828.672-1.5 1.5-1.5zm0 5h6m-6 4h6m-6 4h6" />
            </svg>
            Senarai Tempahan
        </a>
    </div>

    <x-calendar :editable="true" />

    <!-- Booking Modal -->
    <div id="bookingModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-700">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Borang Tempahan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="bookingModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <!-- Tujuan Menyewa -->
                            <div>
                                <label for="tujuan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan
                                    Menyewa</label>
                                <select id="tujuan" name="tujuan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                                    <option value="">Sila Pilih</option>
                                    <option value="Menginap" {{ old('tujuan')=='Menginap' ? 'selected' : '' }}>
                                        Menginap</option>
                                    <option value="Kenduri" {{ old('tujuan')=='Kenduri' ? 'selected' : '' }}>Kenduri
                                    </option>
                                </select>
                                @error('tujuan')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Penyewa -->
                            <div>
                                <label for="nama_penyewa"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Penyewa</label>
                                <input type="text" id="nama_penyewa" name="nama_penyewa"
                                    value="{{ old('nama_penyewa') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                                @error('nama_penyewa')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Alamat Ringkas -->
                            <div class="md:col-span-2">
                                <label for="alamat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                    Ringkas</label>
                                <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                                @error('alamat')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Check-in Date -->
                            <div>
                                <label for="check_in"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh
                                    Check-In</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="check_in"
                                        name="check_in" value="{{ old('check_in') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Select date" required>
                                </div>
                                @error('check_in')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Check-out Date -->
                            <div>
                                <label for="check_out"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh
                                    Check-Out</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="check_out"
                                        name="check_out" value="{{ old('check_out') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Select date" required>
                                </div>
                                @error('check_out')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Bilangan Dewasa -->
                            <div>
                                <label for="dewasa"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bilangan
                                    Penyewa Dewasa</label>
                                <input type="number" id="dewasa" name="dewasa" value="{{ old('dewasa') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    min="0" required>
                                @error('dewasa')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Bilangan Kanak-kanak -->
                            <div>
                                <label for="kanak"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bilangan
                                    Penyewa Kanak-kanak</label>
                                <input type="number" id="kanak" name="kanak" value="{{ old('kanak') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    min="0" required>
                                @error('kanak')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Pilih Homestay -->
                            <div class="md:col-span-2">
                                <label for="homestay"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                    Homestay</label>
                                <select id="homestay" name="homestay"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                                    <option value="">Sila Pilih</option>
                                    <option value="Rumah Kayu Merbau" {{ old('homestay')=='Rumah Kayu Merbau'
                                        ? 'selected' : '' }}>Rumah Kayu
                                        Merbau</option>
                                    <option value="Rumah Batu Jati" {{ old('homestay')=='Rumah Batu Jati' ? 'selected'
                                        : '' }}>Rumah Batu Jati
                                    </option>
                                    <option value="Rumah Batu Meranti" {{ old('homestay')=='Rumah Batu Meranti'
                                        ? 'selected' : '' }}>Rumah Batu
                                        Meranti</option>
                                    <option value="Semua Rumah" {{ old('homestay')=='Semua Rumah' ? 'selected' : '' }}>
                                        Semua Rumah</option>
                                </select>
                                @error('homestay')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end space-x-4">
                            <button type="button" data-modal-hide="bookingModal"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Batal
                            </button>
                            <button type="submit"
                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Hantar Tempahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection