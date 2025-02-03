<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Tempahan Homestay</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FullCalendar CSS & JS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet" />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script>
        // Initialize FullCalendar
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                events: '{{ route("bookings.events") }}',
                eventClick: function (info) {
                    // When an event is clicked, fetch its details via AJAX and populate the modal form
                    fetch(`/bookings/${info.event.id}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('edit_tujuan').value = data.tujuan;
                            document.getElementById('edit_nama_penyewa').value = data.nama_penyewa;
                            document.getElementById('edit_alamat').value = data.alamat;
                            document.getElementById('edit_check_in').value = data.check_in;
                            document.getElementById('edit_check_out').value = data.check_out;
                            document.getElementById('edit_dewasa').value = data.dewasa;
                            document.getElementById('edit_kanak').value = data.kanak;
                            document.getElementById('edit_homestay').value = data.homestay;

                            // Set the update and delete form actions using the booking id.
                            document.getElementById('editForm').action = `/bookings/${data.id}`;
                            document.getElementById('deleteForm').action = `/bookings/${data.id}`;

                            // Show the modal
                            document.getElementById('editModal').classList.remove('hidden');
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
            calendar.render();
        });

        // Close the edit modal
        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Confirm and submit the delete form
        function deleteBooking() {
            if (confirm('Adakah anda pasti untuk memadam tempahan ini?')) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
</head>

<body class="bg-green-50">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center text-green-800 mb-4">Sistem Tempahan Homestay</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-200 text-red-800 p-2 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- Calendar Section (with a min-height to ensure display) -->
        <div id="calendar" class="mb-8 bg-white rounded shadow" style="min-height: 500px;"></div>

        <!-- Booking Form Section -->
        <div class="relative p-6 rounded shadow" style="background-color: #d2b48c;">
            <!-- "View all customer" button at top right -->
            <a href="{{ route('bookings.list') }}"
                class="absolute top-4 right-4 bg-green-700 text-white px-3 py-1 rounded hover:bg-green-800">
                View all customer
            </a>
            <h2 class="text-2xl font-semibold text-green-900 mb-4">Borang Tempahan</h2>
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Tujuan Menyewa -->
                    <div>
                        <label class="block font-medium text-green-900">Tujuan Menyewa</label>
                        <select name="tujuan" class="w-full p-2 border rounded">
                            <option value="">Sila Pilih</option>
                            <option value="Menginap" {{ old('tujuan') == 'Menginap' ? 'selected' : '' }}>Menginap</option>
                            <option value="Kenduri" {{ old('tujuan') == 'Kenduri' ? 'selected' : '' }}>Kenduri</option>
                        </select>
                        @error('tujuan')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Nama Penyewa -->
                    <div>
                        <label class="block font-medium text-green-900">Nama Penyewa</label>
                        <input type="text" name="nama_penyewa" value="{{ old('nama_penyewa') }}"
                            class="w-full p-2 border rounded" placeholder="Nama Penyewa">
                        @error('nama_penyewa')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Alamat Ringkas -->
                    <div class="md:col-span-2">
                        <label class="block font-medium text-green-900">Alamat Ringkas</label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}" class="w-full p-2 border rounded"
                            placeholder="Alamat Ringkas">
                        @error('alamat')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Tarikh Check-In -->
                    <div>
                        <label class="block font-medium text-green-900">Tarikh Check-In</label>
                        <input type="date" name="check_in" value="{{ old('check_in') }}"
                            class="w-full p-2 border rounded">
                        @error('check_in')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Tarikh Check-Out -->
                    <div>
                        <label class="block font-medium text-green-900">Tarikh Check-Out</label>
                        <input type="date" name="check_out" value="{{ old('check_out') }}"
                            class="w-full p-2 border rounded">
                        @error('check_out')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Bilangan Dewasa -->
                    <div>
                        <label class="block font-medium text-green-900">Bilangan Penyewa Dewasa</label>
                        <input type="number" name="dewasa" value="{{ old('dewasa') }}" class="w-full p-2 border rounded"
                            min="0">
                        @error('dewasa')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Bilangan Kanak-kanak -->
                    <div>
                        <label class="block font-medium text-green-900">Bilangan Penyewa Kanak-kanak</label>
                        <input type="number" name="kanak" value="{{ old('kanak') }}" class="w-full p-2 border rounded"
                            min="0">
                        @error('kanak')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Pilih Homestay -->
                    <div class="md:col-span-2">
                        <label class="block font-medium text-green-900">Pilih Homestay</label>
                        <select name="homestay" class="w-full p-2 border rounded">
                            <option value="">Sila Pilih</option>
                            <option value="Rumah Kayu Merbau" {{ old('homestay') == 'Rumah Kayu Merbau' ? 'selected' : '' }}>Rumah Kayu Merbau</option>
                            <option value="Rumah Batu Jati" {{ old('homestay') == 'Rumah Batu Jati' ? 'selected' : '' }}>
                                Rumah Batu Jati</option>
                            <option value="Rumah Batu Meranti" {{ old('homestay') == 'Rumah Batu Meranti' ? 'selected' : '' }}>Rumah Batu Meranti</option>
                        </select>
                        @error('homestay')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Hantar
                        Tempahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal for Editing Booking (triggered from calendar event click) -->
    <div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded shadow-lg w-11/12 md:w-1/2">
            <div class="px-4 py-2 border-b">
                <h3 class="text-xl font-semibold">Kemaskini Tempahan</h3>
            </div>
            <div class="p-4">
                <!-- Update Form -->
                <form id="editForm" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Tujuan Menyewa -->
                        <div>
                            <label class="block font-medium">Tujuan Menyewa</label>
                            <select name="tujuan" id="edit_tujuan" class="w-full p-2 border rounded">
                                <option value="Menginap">Menginap</option>
                                <option value="Kenduri">Kenduri</option>
                            </select>
                        </div>
                        <!-- Nama Penyewa -->
                        <div>
                            <label class="block font-medium">Nama Penyewa</label>
                            <input type="text" name="nama_penyewa" id="edit_nama_penyewa"
                                class="w-full p-2 border rounded">
                        </div>
                        <!-- Alamat Ringkas -->
                        <div class="md:col-span-2">
                            <label class="block font-medium">Alamat Ringkas</label>
                            <input type="text" name="alamat" id="edit_alamat" class="w-full p-2 border rounded">
                        </div>
                        <!-- Tarikh Check-In -->
                        <div>
                            <label class="block font-medium">Tarikh Check-In</label>
                            <input type="date" name="check_in" id="edit_check_in" class="w-full p-2 border rounded">
                        </div>
                        <!-- Tarikh Check-Out -->
                        <div>
                            <label class="block font-medium">Tarikh Check-Out</label>
                            <input type="date" name="check_out" id="edit_check_out" class="w-full p-2 border rounded">
                        </div>
                        <!-- Bilangan Dewasa -->
                        <div>
                            <label class="block font-medium">Bilangan Penyewa Dewasa</label>
                            <input type="number" name="dewasa" id="edit_dewasa" class="w-full p-2 border rounded"
                                min="0">
                        </div>
                        <!-- Bilangan Kanak-kanak -->
                        <div>
                            <label class="block font-medium">Bilangan Penyewa Kanak-kanak</label>
                            <input type="number" name="kanak" id="edit_kanak" class="w-full p-2 border rounded" min="0">
                        </div>
                        <!-- Pilih Homestay -->
                        <div class="md:col-span-2">
                            <label class="block font-medium">Pilih Homestay</label>
                            <select name="homestay" id="edit_homestay" class="w-full p-2 border rounded">
                                <option value="Rumah Kayu Merbau">Rumah Kayu Merbau</option>
                                <option value="Rumah Batu Jati">Rumah Batu Jati</option>
                                <option value="Rumah Batu Meranti">Rumah Batu Meranti</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end space-x-2">
                        <button type="button" onclick="closeModal()"
                            class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded">Simpan
                            Perubahan</button>
                    </div>
                </form>
                <!-- Delete Form -->
                <form id="deleteForm" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteBooking()"
                        class="bg-red-600 text-white px-4 py-2 rounded">Padam Tempahan</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
