@extends('layouts.layout')

@section('title', 'Senarai Tempahan')

@section('content')
<div class="container mx-auto p-4">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="mb-4 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Senarai Tempahan</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Lihat dan urus semua tempahan homestay.</p>
            </div>
            <a href="{{ route('index') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 rounded-lg dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
                Tambah Tempahan Baru
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nama Penyewa</th>
                        <th scope="col" class="px-6 py-3">Tujuan</th>
                        <th scope="col" class="px-6 py-3">Homestay</th>
                        <th scope="col" class="px-6 py-3">Check In</th>
                        <th scope="col" class="px-6 py-3">Check Out</th>
                        <th scope="col" class="px-6 py-3">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $booking->nama_penyewa }}
                            </td>
                            <td class="px-6 py-4">{{ $booking->tujuan }}</td>
                            <td class="px-6 py-4">{{ $booking->homestay }}</td>
                            <td class="px-6 py-4">{{ $booking->check_in }}</td>
                            <td class="px-6 py-4">{{ $booking->check_out }}</td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <button data-modal-target="editModal" data-modal-toggle="editModal"
                                            data-booking-id="{{ $booking->id }}"
                                            class="font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                        Kemaskini
                                    </button>
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                                onclick="return confirm('Adakah anda pasti untuk memadam tempahan ini?')">
                                            Padam
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <!-- Pagination -->
        <div class="mt-4">
            {{ $bookings->links() }}
        </div> --}}
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Kemaskini Tempahan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <!-- Tujuan Menyewa -->
                        <div>
                            <label for="edit_tujuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan Menyewa</label>
                            <select id="edit_tujuan" name="tujuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="Menginap">Menginap</option>
                                <option value="Kenduri">Kenduri</option>
                            </select>
                        </div>

                        <!-- Nama Penyewa -->
                        <div>
                            <label for="edit_nama_penyewa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penyewa</label>
                            <input type="text" id="edit_nama_penyewa" name="nama_penyewa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>

                        <!-- Alamat -->
                        <div class="md:col-span-2">
                            <label for="edit_alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Ringkas</label>
                            <input type="text" id="edit_alamat" name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>

                        <!-- Check-in Date -->
                        <div>
                            <label for="edit_check_in" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh Check-In</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="edit_check_in" name="check_in" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Select date" required>
                            </div>
                        </div>

                        <!-- Check-out Date -->
                        <div>
                            <label for="edit_check_out" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh Check-Out</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="edit_check_out" name="check_out" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Select date" required>
                            </div>
                        </div>

                        <!-- Bilangan Dewasa -->
                        <div>
                            <label for="edit_dewasa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bilangan Penyewa Dewasa</label>
                            <input type="number" id="edit_dewasa" name="dewasa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" min="0" required>
                        </div>

                        <!-- Bilangan Kanak-kanak -->
                        <div>
                            <label for="edit_kanak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bilangan Penyewa Kanak-kanak</label>
                            <input type="number" id="edit_kanak" name="kanak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" min="0" required>
                        </div>

                        <!-- Homestay -->
                        <div class="md:col-span-2">
                            <label for="edit_homestay" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Homestay</label>
                            <select id="edit_homestay" name="homestay" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="Rumah Kayu Merbau">Rumah Kayu Merbau</option>
                                <option value="Rumah Batu Jati">Rumah Batu Jati</option>
                                <option value="Rumah Batu Meranti">Rumah Batu Meranti</option>
                                <option value="Semua Rumah">Semua Rumah</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Simpan Perubahan
                        </button>
                        <button type="button" data-modal-hide="editModal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Handle edit modal
    const editButtons = document.querySelectorAll('[data-modal-target="editModal"]');
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const bookingId = button.getAttribute('data-booking-id');
            // Fetch booking data and populate form
            fetch(`/bookings/${bookingId}/edit`)
                .then(response => response.json())
                .then(data => {
                    const form = document.getElementById('editForm');
                    form.action = `/bookings/${bookingId}`;

                    // Populate form fields
                    document.getElementById('edit_tujuan').value = data.tujuan;
                    document.getElementById('edit_nama_penyewa').value = data.nama_penyewa;
                    document.getElementById('edit_alamat').value = data.alamat;
                    document.getElementById('edit_check_in').value = data.check_in;
                    document.getElementById('edit_check_out').value = data.check_out;
                    document.getElementById('edit_dewasa').value = data.dewasa;
                    document.getElementById('edit_kanak').value = data.kanak;
                    document.getElementById('edit_homestay').value = data.homestay;
                });
        });
    });
</script>
@endpush
