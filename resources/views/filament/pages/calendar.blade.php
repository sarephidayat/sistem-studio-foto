<x-filament-panels::page>
    <style>
    #calendar {
        min-height: 850px;
    }

    .fc {
        font-family: Inter, sans-serif;
    }

    .fc-toolbar-title {
        font-size: 24px !important;
        font-weight: 700 !important;
    }

    .fc-button {
        border-radius: 8px !important;
    }

    .fc-event {
        border-radius: 8px !important;
        border: none !important;
        background: #f59e0b !important;
        padding: 2px 4px;
    }

    .fc-day-today {
        background: rgba(245, 158, 11, 0.08) !important;
    }
    .fc .fc-toolbar {
    margin-bottom: 20px !important;
    }

    .fc .fc-toolbar-chunk {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .fc .fc-button-group {
        display: flex;
        gap: 8px;
    }

    .fc .fc-button {
        border-radius: 10px !important;
    }
</style>
    <div id="calendar"></div>

    {{-- FullCalendar CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.css" rel="stylesheet">

    {{-- FullCalendar JS --}}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js"></script>

    <script>
        
        document.addEventListener('DOMContentLoaded', function () {

            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',

                height: 850,

                nowIndicator: true,

                dayMaxEvents: true,

                navLinks: true,

                expandRows: true,

                slotMinTime: '08:00:00',

                slotMaxTime: '22:00:00',

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                buttonText: {
                    today: 'Hari Ini',
                    month: 'Bulan',
                    week: 'Minggu',
                    day: 'Hari'
                },

                events: @json($events),

                eventClick: function(info) {
                    alert(
                        'Customer: ' + info.event.title +
                        '\nTanggal: ' + info.event.start.toLocaleDateString('id-ID') +
                        '\nJam: ' + info.event.start.toLocaleTimeString('id-ID')
                    );
                }
            });

            calendar.render();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</x-filament-panels::page>