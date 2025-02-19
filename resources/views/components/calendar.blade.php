@props(['editable' => false])

<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    {{-- <div class="mb-4">
        <h3 class="text-xl font-semibold dark:text-white">Calendar</h3>
    </div> --}}

    <!-- Filter Section -->
    <div class="p-4 mb-4 bg-gray-50 border border-gray-100 rounded-lg dark:bg-gray-700 dark:border-gray-600">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="filterTujuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan</label>
                <select id="filterTujuan" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    <option value="">Semua</option>
                    <option value="Menginap">Menginap</option>
                    <option value="Kenduri">Kenduri</option>
                </select>
            </div>
            <div id="homestayFilterContainer" class="hidden">
                <label for="filterHomestay" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Homestay</label>
                <select id="filterHomestay" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
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
    /* Calendar Dark Mode Styles */
    .dark .fc {
        color: #fff;
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
    .dark .fc-day-header {
        color: #fff !important;
    }
    .dark .fc-day-number {
        color: #fff !important;
    }
    /* Ensure events stay within calendar boundaries */
    .fc-event {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        max-width: 100%;
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

        // Show/hide homestay filter based on tujuan selection
        filterTujuan.addEventListener('change', function() {
            homestayFilterContainer.classList.toggle('hidden', this.value !== 'Menginap');
            refreshCalendar();
        });

        filterHomestay.addEventListener('change', refreshCalendar);

        // Define homestay colors
        const homestayColors = {
            'Rumah Kayu Merbau': '#4B5320',
            'Rumah Batu Jati': '#0B6623',
            'Rumah Batu Meranti': '#568203'
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
            editable: {{ $editable }},
            eventDidMount: function(info) {
                const homestayType = info.event.title.split(' - ')[0];
                info.el.style.backgroundColor = homestayColors[homestayType];
                info.el.style.borderColor = homestayColors[homestayType];
                info.el.title = info.event.title;
            },
            @if($editable)
            eventDrop: function(info) {
                let event = info.event;
                let newStartDate = event.start.toISOString().split('T')[0];
                let newEndDate = event.end ? event.end.toISOString().split('T')[0] : newStartDate;

                fetch(`/bookings/${event.id}/update-dates`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        check_in: newStartDate,
                        check_out: newEndDate
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        info.revert();
                        alert(data.message || 'Failed to update booking dates. Please try again.');
                    }
                })
                .catch(error => {
                    info.revert();
                    alert('An error occurred while updating the booking.');
                });
            },
            @endif
            events: function(fetchInfo, successCallback, failureCallback) {
                let url = new URL('/bookings/events', window.location.origin);
                let params = new URLSearchParams();

                if (filterTujuan.value) {
                    params.append('tujuan', filterTujuan.value);
                }
                if (filterTujuan.value === 'Menginap' && filterHomestay.value) {
                    params.append('homestay', filterHomestay.value);
                }

                url.search = params.toString();

                fetch(url)
                    .then(response => response.json())
                    .then(data => successCallback(data))
                    .catch(error => failureCallback(error));
            }
        });

        calendar.render();

        window.addEventListener('resize', function() {
            calendar.updateSize();
        });

        function refreshCalendar() {
            calendar.refetchEvents();
        }
    });
</script>
@endpush
