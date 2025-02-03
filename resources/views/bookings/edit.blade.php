<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemaskini Tempahan</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50">
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-green-800">Kemaskini Tempahan</h1>
            <a href="{{ route('bookings.list') }}" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-200 text-red-800 p-2 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded shadow" style="background-color: #d2b48c;>
            <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Tujuan Menyewa -->
                    <div>
                        <label class="block font-medium">Tujuan Menyewa</label>
                        <select name="tujuan" class="w-full p-2 border rounded">
                            <option value="Menginap" {{ $booking->tujuan == 'Menginap' ? 'selected' : '' }}>Menginap</option>
                            <option value="Kenduri" {{ $booking->tujuan == 'Kenduri' ? 'selected' : '' }}>Kenduri</option>
                        </select>
                    </div>
                    <!-- Nama Penyewa -->
                    <div>
                        <label class="block font-medium">Nama Penyewa</label>
                        <input type="text" name="nama_penyewa" value="{{ $booking->nama_penyewa }}" class="w-full p-2 border rounded">
                    </div>
                    <!-- Alamat Ringkas -->
                    <div class="md:col-span-2">
                        <label class="block font-medium">Alamat Ringkas</label>
                        <input type="text" name="alamat" value="{{ $booking->alamat }}" class="w-full p-2 border rounded">
                    </div>
                    <!-- Tarikh Check-In -->
                    <div>
                        <label class="block font-medium">Tarikh Check-In</label>
                        <input type="date" name="check_in" value="{{ $booking->check_in }}" class="w-full p-2 border rounded">
                    </div>
                    <!-- Tarikh Check-Out -->
                    <div>
                        <label class="block font-medium">Tarikh Check-Out</label>
                        <input type="date" name="check_out" value="{{ $booking->check_out }}" class="w-full p-2 border rounded">
                    </div>
                    <!-- Bilangan Dewasa -->
                    <div>
                        <label class="block font-medium">Bilangan Penyewa Dewasa</label>
                        <input type="number" name="dewasa" value="{{ $booking->dewasa }}" class="w-full p-2 border rounded" min="0">
                    </div>
                    <!-- Bilangan Kanak-kanak -->
                    <div>
                        <label class="block font-medium">Bilangan Penyewa Kanak-kanak</label>
                        <input type="number" name="kanak" value="{{ $booking->kanak }}" class="w-full p-2 border rounded" min="0">
                    </div>
                    <!-- Pilih Homestay -->
                    <div class="md:col-span-2">
                        <label class="block font-medium">Pilih Homestay</label>
                        <select name="homestay" class="w-full p-2 border rounded">
                            <option value="Rumah Kayu Merbau" {{ $booking->homestay == 'Rumah Kayu Merbau' ? 'selected' : '' }}>Rumah Kayu Merbau</option>
                            <option value="Rumah Batu Jati" {{ $booking->homestay == 'Rumah Batu Jati' ? 'selected' : '' }}>Rumah Batu Jati</option>
                            <option value="Rumah Batu Meranti" {{ $booking->homestay == 'Rumah Batu Meranti' ? 'selected' : '' }}>Rumah Batu Meranti</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4 flex justify-end space-x-2">
                    <a href="{{ route('bookings.list') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Batal
                    </a>
                    <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
            <!-- Delete Form -->
            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="mt-4" onsubmit="return confirm('Adakah anda pasti untuk memadam tempahan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Padam Tempahan
                </button>
            </form>
        </div>
    </div>
</body>
</html>
