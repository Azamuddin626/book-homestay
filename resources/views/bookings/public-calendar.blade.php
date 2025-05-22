@extends('layouts.layout')

@section('title', 'Sistem Tempahan Homestay')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-4">Kalendar Pulai Greens Homestay</h1>

    <!-- Notification and Booking Button -->
    <div
        class="mb-6 bg-nature-leaf/30 dark:bg-primary-900/30 border border-nature-fern/30 dark:border-primary-700/30 rounded-lg p-4 flex flex-col md:flex-row md:items-center justify-between">
        <div class="mb-3 md:mb-0">
            <p class="text-nature-bark dark:text-white font-medium">
                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Sila semak tarikh kekosongan untuk homestay sebelum membuat tempahan.
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Tarikh yang bertanda pada kalendar telah ditempah.
            </p>
        </div>
        <a href="{{ route('bookings.public.create') }}"
            class="inline-flex items-center bg-nature-fern hover:bg-nature-moss text-white font-medium py-2 px-4 rounded-lg transition duration-300">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Tempah Sekarang
        </a>
    </div>

    <div
        class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <!-- Filter Section -->
        <div class="p-4 mb-4 bg-gray-50 border border-gray-100 rounded-lg dark:bg-gray-700 dark:border-gray-600">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="filterTujuan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan</label>
                    <select id="filterTujuan"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Semua</option>
                        <option value="Menginap">Menginap</option>
                        <option value="Kenduri">Kenduri</option>
                    </select>
                </div>
                <div id="homestayFilterContainer" class="hidden">
                    <label for="filterHomestay"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Homestay</label>
                    <select id="filterHomestay"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Semua</option>
                        <option value="Rumah Kayu Merbau">Rumah Kayu Merbau</option>
                        <option value="Rumah Batu Jati">Rumah Batu Jati</option>
                        <option value="Rumah Batu Meranti">Rumah Batu Meranti</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Calendar Section -->
        <div id="calendar" class="bg-white dark:bg-gray-800" style="min-height: 500px;"></div>
    </div>

    @push('styles')
    <style>
        /* Make calendar responsive on mobile */
        @media screen and (max-width: 768px) {
            .fc {
                font-size: 0.8em;
            }

            .fc-toolbar {
                flex-direction: column;
                gap: 0.5rem;
            }

            .fc-toolbar-chunk {
                display: flex;
                justify-content: center;
            }

            .fc-event {
                padding: 2px;
                font-size: 0.9em;
            }
        }

        /* Light Mode Calendar Styles - Improved Contrast */
        .fc {
            color: #333 !important;
        }

        .fc-button {
            background-color: #e5e7eb !important;
            border-color: #d1d5db !important;
            color: #374151 !important;
            font-weight: 500 !important;
        }

        .fc-button:hover {
            background-color: #d1d5db !important;
        }

        .fc-day-today {
            background-color: rgba(59, 130, 246, 0.1) !important;
        }

        .fc th,
        .fc td {
            border-color: #d1d5db !important;
        }

        .fc-theme-standard .fc-scrollgrid {
            border: 1px solid #d1d5db !important;
        }

        .fc .fc-col-header-cell-cushion {
            color: #111827;
            font-weight: 600;
            padding: 6px 4px;
        }

        .fc .fc-daygrid-day-number {
            color: #374151;
            font-weight: 500;
        }

        .fc-toolbar-title {
            color: #111827 !important;
            font-weight: 600 !important;
        }

        /* Calendar Dark Mode Styles */
        .dark .fc {
            color: #fff !important;
        }

        .dark .fc-button {
            background-color: #374151 !important;
            border-color: #4B5563 !important;
            color: #fff !important;
        }

        .dark .fc-button:hover {
            background-color: #4B5563 !important;
        }

        .dark .fc-day-today {
            background-color: rgba(59, 130, 246, 0.1) !important;
        }

        .dark .fc-col-header-cell-cushion {
            color: #fff !important;
        }

        .dark .fc-daygrid-day-number {
            color: #fff !important;
        }

        .dark .fc-toolbar-title {
            color: #fff !important;
            font-weight: 600 !important;
        }

        .dark .fc th,
        .dark .fc td {
            border-color: #4B5563 !important;
        }

        .dark .fc-theme-standard .fc-scrollgrid {
            border: 1px solid #4B5563 !important;
        }

        /* Ensure events stay within calendar boundaries */
        .fc-event {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 100%;
            border-width: 1px;
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                    let filterTujuan = document.getElementById('filterTujuan');
                    let filterHomestay = document.getElementById('filterHomestay');
                    let homestayFilterContainer = document.getElementById('homestayFilterContainer');

                    // Detect URL parameters
                    const urlParams = new URLSearchParams(window.location.search);
                    const pakejParam = urlParams.get('pakej');
                    const tujuanParam = urlParams.get('filterTujuan');
                    const homestayParam = urlParams.get('filterHomestay');

                    // Pakej logic
                    if (pakejParam) {
                        switch (pakejParam.toUpperCase()) {
                            case 'A':
                                filterTujuan.value = 'Kenduri';
                                homestayFilterContainer.classList.add('hidden');
                                break;
                            case 'B':
                                filterTujuan.value = 'Menginap';
                                filterHomestay.value = 'Rumah Kayu Merbau';
                                homestayFilterContainer.classList.remove('hidden');
                                break;
                            case 'C':
                                filterTujuan.value = 'Menginap';
                                filterHomestay.value = 'Rumah Batu Jati';
                                homestayFilterContainer.classList.remove('hidden');
                                break;
                            case 'D':
                                filterTujuan.value = 'Menginap';
                                filterHomestay.value = 'Rumah Batu Meranti';
                                homestayFilterContainer.classList.remove('hidden');
                                break;
                            default:
                                break;
                        }
                    } else {
                        // Use fallback to filterTujuan / filterHomestay if provided in URL
                        if (tujuanParam) {
                            filterTujuan.value = tujuanParam;
                            homestayFilterContainer.classList.toggle('hidden', tujuanParam !== 'Menginap');
                        }
                        if (homestayParam) {
                            filterHomestay.value = homestayParam;
                        }
                    }

                    // Define homestay colors
                    const homestayColors = {
                        'Rumah Kayu Merbau': '#4B5320',
                        'Rumah Batu Jati': '#0B6623',
                        'Rumah Batu Meranti': '#568203',
                        'Semua Rumah': '#6B8E23'  // Adding a color for "Semua Rumah" option
                    };

                    let calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                        initialView: 'dayGridMonth',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        views: {
                            dayGridMonth: {
                                dayMaxEventRows: 4
                            }
                        },
                        eventDidMount: function(info) {
                            const homestayType = info.event.extendedProps.originalTitle.split(' - ')[0];
                            info.el.style.backgroundColor = homestayColors[homestayType];
                            info.el.style.borderColor = homestayColors[homestayType];
                            info.el.querySelector('.fc-event-title').textContent = 'Telah Ditempah';
                            info.el.title = info.event.extendedProps.originalTitle;
                        },
                        events: function(fetchInfo, successCallback, failureCallback) {
                            let url = new URL('/bookings/events', window.location.origin);
                            let params = new URLSearchParams();

                            if (filterTujuan.value) {
                                params.append('tujuan', filterTujuan.value);
                            }
                            if (filterHomestay.value) {
                                params.append('homestay', filterHomestay.value);
                            }

                            url.search = params.toString();

                            fetch(url)
                                .then(response => response.json())
                                .then(data => {
                                    const modifiedEvents = data.map(event => ({
                                        ...event,
                                        extendedProps: {
                                            originalTitle: event.title
                                        },
                                        title: 'Telah Ditempah'
                                    }));
                                    successCallback(modifiedEvents);
                                })
                                .catch(error => failureCallback(error));
                        }
                    });

                    calendar.render();

                    window.addEventListener('resize', function() {
                        calendar.updateSize();
                    });

                    // Handle UI filter changes
                    filterTujuan.addEventListener('change', function() {
                        homestayFilterContainer.classList.toggle('hidden', this.value !== 'Menginap');
                        refreshCalendar();
                    });
                    filterHomestay.addEventListener('change', refreshCalendar);

                    function refreshCalendar() {
                        calendar.refetchEvents();
                    }

                    // Initial calendar load
                    refreshCalendar();
                });
    </script>
    @endpush
    @endsection