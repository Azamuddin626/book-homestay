@extends('layouts.layout')

@section('title', 'Tempahan Homestay')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-4">Borang Tempahan Homestay</h1>

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

    <div class="max-w-3xl mx-auto">
        <!-- WhatsApp Integration Notice -->
        <div
            class="mb-6 bg-nature-leaf/30 dark:bg-primary-900/30 border border-nature-fern/30 dark:border-primary-700/30 rounded-lg p-4">
            <p class="flex items-start text-nature-bark dark:text-white font-medium">
                <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Selepas menghantar borang ini, anda akan dibawa ke WhatsApp untuk pengesahan tempahan dengan pihak
                    pengurusan.</span>
            </p>
        </div>

        <!-- Booking Form -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <form id="bookingForm" action="{{ route('bookings.public.store') }}" method="POST">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <!-- Tujuan Menyewa -->
                    <div>
                        <label for="tujuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan
                            Menyewa</label>
                        <select id="tujuan" name="tujuan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                            <option value="">Sila Pilih</option>
                            <option value="Menginap" {{ old('tujuan')=='Menginap' ? 'selected' : '' }}>Menginap</option>
                            <option value="Kenduri" {{ old('tujuan')=='Kenduri' ? 'selected' : '' }}>Kenduri</option>
                        </select>
                        @error('tujuan')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Penyewa -->
                    <div>
                        <label for="nama_penyewa"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penyewa</label>
                        <input type="text" id="nama_penyewa" name="nama_penyewa" value="{{ old('nama_penyewa') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                        @error('nama_penyewa')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat Ringkas -->
                    <div class="md:col-span-2">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                            Ringkas</label>
                        <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                        @error('alamat')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No. Telefon (WhatsApp) -->
                    <div class="md:col-span-2">
                        <label for="telefon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                            Telefon (WhatsApp)</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                +60
                            </span>
                            <input type="tel" id="telefon" name="telefon" value="{{ old('telefon') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none rounded-r-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Contoh: 1xxxxxxxx (tanpa awalan)" required>
                        </div>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Sila masukkan nombor tanpa awalan '0'
                            atau '+60'. Contoh: 123456789</p>
                        @error('telefon')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Check-in Date -->
                    <div>
                        <label for="check_in"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh Check-In</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="check_in" name="check_in"
                                value="{{ old('check_in') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="YYYY-MM-DD" required>
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
                            <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="check_out" name="check_out"
                                value="{{ old('check_out') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="YYYY-MM-DD" required>
                        </div>
                        @error('check_out')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bilangan Dewasa -->
                    <div>
                        <label for="dewasa"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bilangan Penyewa
                            Dewasa</label>
                        <input type="number" id="dewasa" name="dewasa" value="{{ old('dewasa') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            min="0" required>
                        @error('dewasa')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bilangan Kanak-kanak -->
                    <div>
                        <label for="kanak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bilangan
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
                        <label for="homestay" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                            Homestay</label>
                        <select id="homestay" name="homestay"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                            <option value="">Sila Pilih</option>
                            <option value="Rumah Kayu Merbau" {{ old('homestay')=='Rumah Kayu Merbau' ? 'selected' : ''
                                }}>Rumah Kayu Merbau</option>
                            <option value="Rumah Batu Jati" {{ old('homestay')=='Rumah Batu Jati' ? 'selected' : '' }}>
                                Rumah Batu Jati</option>
                            <option value="Rumah Batu Meranti" {{ old('homestay')=='Rumah Batu Meranti' ? 'selected'
                                : '' }}>Rumah Batu Meranti</option>
                            <option value="Semua Rumah" {{ old('homestay')=='Semua Rumah' ? 'selected' : '' }}>Semua
                                Rumah</option>
                        </select>
                        @error('homestay')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('calendar.public') }}"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Kembali Ke Kalendar
                    </a>
                    <button type="submit" id="submitButton"
                        class="text-white bg-nature-fern hover:bg-nature-moss focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.6 6.4A7.8 7.8 0 0 0 12 4a8 8 0 0 0-8 8 7.9 7.9 0 0 0 1.7 5L5 22h4.3l.5-1.4a5.2 5.2 0 0 0 2.2 0L12.7 22H17l-.4-5a7.9 7.9 0 0 0 5-8 7.8 7.8 0 0 0-4-2.6zM12 17.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm2.5-6.5c-.5.5-1 .7-1 1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5c0-1 .5-1.8 1-2.3.4-.4.7-.6.7-1.2 0-.7-.6-1.5-1.7-1.5s-1.5.8-1.7 1.4a.5.5 0 0 1-.5.3H7a.5.5 0 0 1-.5-.5C6.7 6.2 9 4.5 12 4.5c2.9 0 4.5 1.8 4.5 3.5 0 1.5-.9 2.3-2 3z" />
                        </svg>
                        Hantar & Hubungi WhatsApp
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('bookingForm');
        const submitBtn = document.getElementById('submitButton');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form values
            const nama = document.getElementById('nama_penyewa').value;
            const telefon = document.getElementById('telefon').value;
            const tujuan = document.getElementById('tujuan').value;
            const homestay = document.getElementById('homestay').value;
            const checkIn = document.getElementById('check_in').value;
            const checkOut = document.getElementById('check_out').value;
            const dewasa = document.getElementById('dewasa').value;
            const kanak = document.getElementById('kanak').value;
            const alamat = document.getElementById('alamat').value;

            // Format the WhatsApp message
            const message =
                `Assalamualaikum, saya ingin membuat tempahan homestay:

Nama: ${nama}
Alamat: ${alamat}
Tujuan: ${tujuan}
Homestay: ${homestay}
Tarikh Check-in: ${checkIn}
Tarikh Check-out: ${checkOut}
Bilangan Dewasa: ${dewasa}
Bilangan Kanak-kanak: ${kanak}

Terima kasih.`;

            // Define the admin's phone number for WhatsApp
            const adminPhone = "601110106876"; // Admin's phone number without spaces or dashes
            const encodedMessage = encodeURIComponent(message);

            // Send form data to server (AJAX) to save in leads database
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    nama_penyewa: nama,
                    alamat: alamat,
                    tujuan: tujuan,
                    homestay: homestay,
                    check_in: checkIn,
                    check_out: checkOut,
                    dewasa: dewasa,
                    kanak: kanak,
                    telefon: telefon,
                    _token: document.querySelector('input[name="_token"]').value
                })
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      // If successfully saved to database, redirect to WhatsApp with the message
                      window.location.href = `https://wa.me/${adminPhone}?text=${encodedMessage}`;
                  } else {
                      // Show error message
                      alert(data.message || 'Terdapat ralat. Sila cuba lagi.');
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
                  alert('Terdapat ralat dengan sistem. Sila cuba lagi.');
              });
        });
    });
</script>
@endpush

@endsection