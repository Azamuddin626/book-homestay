@extends('layouts.layout')

@section('title', 'Senarai Pertanyaan Tempahan')

@section('content')
<div class="container mx-auto p-4">
    <div
        class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="mb-4 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Senarai Pertanyaan Tempahan</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Lihat dan proses semua pertanyaan tempahan
                    homestay.</p>
            </div>
            <a href="{{ route('bookings.list') }}"
                class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 rounded-lg dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l2.586 2.586c.391.39.586.902.586 1.414v11c0 .828-.672 1.5-1.5 1.5h-9c-.828 0-1.5-.672-1.5-1.5v-13c0-.828.672-1.5 1.5-1.5zm0 5h6m-6 4h6m-6 4h6" />
                </svg>
                Lihat Tempahan Disahkan
            </a>
        </div>

        @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <!-- Migration Notice -->
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <div class="font-medium">Sistem Leads - Panduan Penggunaan</div>
            <ul class="mt-1.5 ml-4 list-disc list-inside">
                <li>Jika anda melihat jadual kosong, jalankan fail <strong>/run_leads_migration.php</strong> melalui
                    pelayar web untuk membuat pangkalan data</li>
                <li>Permohonan tempahan dari borang awam akan disimpan sebagai "Leads" disini</li>
                <li>Bila anda mengklik "Terima", lead akan dijadikan tempahan dalam kalendar</li>
                <li>Nombor telefon pemohon boleh diklik untuk menghubungi mereka melalui WhatsApp</li>
            </ul>
        </div>

        <!-- Filter Form -->
        <div class="p-4 mb-4 bg-gray-50 border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600">
            <form action="{{ route('leads.index') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-4">
                    <div>
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="status" name="status"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Semua</option>
                            <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Belum Diproses
                            </option>
                            <option value="confirmed" {{ request('status')=='confirmed' ? 'selected' : '' }}>Disahkan
                            </option>
                            <option value="rejected" {{ request('status')=='rejected' ? 'selected' : '' }}>Ditolak
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="tujuan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan</label>
                        <select id="tujuan" name="tujuan"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Semua</option>
                            <option value="Menginap" {{ request('tujuan')=='Menginap' ? 'selected' : '' }}>Menginap
                            </option>
                            <option value="Kenduri" {{ request('tujuan')=='Kenduri' ? 'selected' : '' }}>Kenduri
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="homestay"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Homestay</label>
                        <select id="homestay" name="homestay"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Semua</option>
                            <option value="Rumah Kayu Merbau" {{ request('homestay')=='Rumah Kayu Merbau' ? 'selected'
                                : '' }}>Rumah Kayu Merbau</option>
                            <option value="Rumah Batu Jati" {{ request('homestay')=='Rumah Batu Jati' ? 'selected' : ''
                                }}>Rumah Batu Jati</option>
                            <option value="Rumah Batu Meranti" {{ request('homestay')=='Rumah Batu Meranti' ? 'selected'
                                : '' }}>Rumah Batu Meranti</option>
                            <option value="Semua Rumah" {{ request('homestay')=='Semua Rumah' ? 'selected' : '' }}>Semua
                                Rumah</option>
                        </select>
                    </div>

                    <div>
                        <label for="from_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dari
                            Tarikh</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="from_date" name="from_date"
                                value="{{ request('from_date') }}"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="YYYY-MM-DD">
                        </div>
                    </div>

                    <div>
                        <label for="to_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hingga
                            Tarikh</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="to_date" name="to_date"
                                value="{{ request('to_date') }}"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="YYYY-MM-DD">
                        </div>
                    </div>

                    <div>
                        <label for="nama_penyewa"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penyewa</label>
                        <input type="text" id="nama_penyewa" name="nama_penyewa" value="{{ request('nama_penyewa') }}"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Carian nama...">
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-4 h-4 mr-2 inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        Tapis
                    </button>
                    <a href="{{ route('leads.index') }}"
                        class="text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-2 dark:bg-gray-600 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-primary-800 border border-gray-300 dark:border-gray-500">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Lead Listing -->
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Nama Penyewa</th>
                        <th scope="col" class="px-6 py-3">Tujuan</th>
                        <th scope="col" class="px-6 py-3">Homestay</th>
                        <th scope="col" class="px-6 py-3">Tarikh Masuk</th>
                        <th scope="col" class="px-6 py-3">Tarikh Keluar</th>
                        <th scope="col" class="px-6 py-3">No. Telefon</th>
                        <th scope="col" class="px-6 py-3">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            @if($lead->status == 'pending')
                            <span class="px-2 py-1 text-xs font-medium text-amber-700 bg-amber-100 rounded-full">Belum
                                Diproses</span>
                            @elseif($lead->status == 'confirmed')
                            <span
                                class="px-2 py-1 text-xs font-medium text-emerald-700 bg-emerald-100 rounded-full">Disahkan</span>
                            @else
                            <span
                                class="px-2 py-1 text-xs font-medium text-rose-700 bg-rose-100 rounded-full">Ditolak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $lead->nama_penyewa }}
                        </td>
                        <td class="px-6 py-4">{{ $lead->tujuan }}</td>
                        <td class="px-6 py-4">{{ $lead->homestay }}</td>
                        <td class="px-6 py-4">{{ date('d/m/Y', strtotime($lead->check_in)) }}</td>
                        <td class="px-6 py-4">{{ date('d/m/Y', strtotime($lead->check_out)) }}</td>
                        <td class="px-6 py-4">
                            <a href="https://wa.me/60{{ ltrim($lead->telefon, '0+') }}" target="_blank"
                                class="text-primary-700 hover:text-primary-800 dark:text-primary-500 dark:hover:text-primary-400">
                                +60{{ ltrim($lead->telefon, '0+') }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            @if($lead->status == 'pending')
                            <div class="flex space-x-2">
                                <form action="{{ route('leads.update-status', $lead->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit"
                                        class="font-medium text-emerald-600 dark:text-emerald-500 hover:underline">
                                        Terima
                                    </button>
                                </form>
                                <form action="{{ route('leads.update-status', $lead->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        Tolak
                                    </button>
                                </form>
                                <a href="https://wa.me/60{{ ltrim($lead->telefon, '0+') }}" target="_blank"
                                    class="font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                    WhatsApp
                                </a>
                            </div>
                            @else
                            <a href="https://wa.me/60{{ ltrim($lead->telefon, '0+') }}" target="_blank"
                                class="font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                WhatsApp
                            </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white dark:bg-gray-800">
                        <td colspan="8" class="px-6 py-4 text-center">Tiada pertanyaan tempahan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $leads->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection