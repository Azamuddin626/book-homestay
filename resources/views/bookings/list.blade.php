<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Tempahan Pelanggan</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50">
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-green-800">Senarai Tempahan Pelanggan</h1>
            <a href="{{ route('home') }}" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
                Kembali
            </a>
        </div>

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

        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-700 text-white">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Tujuan</th>
                        <th class="px-4 py-2">Nama Penyewa</th>
                        <th class="px-4 py-2">Alamat</th>
                        <th class="px-4 py-2">Check-In</th>
                        <th class="px-4 py-2">Check-Out</th>
                        <th class="px-4 py-2">Dewasa</th>
                        <th class="px-4 py-2">Kanak-kanak</th>
                        <th class="px-4 py-2">Homestay</th>
                        <th class="px-4 py-2">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($bookings as $booking)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $booking->tujuan }}</td>
                            <td class="px-4 py-2">{{ $booking->nama_penyewa }}</td>
                            <td class="px-4 py-2">{{ $booking->alamat }}</td>
                            <td class="px-4 py-2">{{ $booking->check_in }}</td>
                            <td class="px-4 py-2">{{ $booking->check_out }}</td>
                            <td class="px-4 py-2">{{ $booking->dewasa }}</td>
                            <td class="px-4 py-2">{{ $booking->kanak }}</td>
                            <td class="px-4 py-2">{{ $booking->homestay }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('bookings.editPage', $booking->id) }}"
                                   class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">
                                    Edit
                                </a>
                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Adakah anda pasti untuk memadam tempahan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">
                                        Padam
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($bookings->isEmpty())
                        <tr>
                            <td colspan="10" class="px-4 py-2 text-center text-gray-500">
                                Tiada tempahan ditemui.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
