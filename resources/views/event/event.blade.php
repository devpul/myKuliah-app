
@extends('layout')

@section('content')
    <h1>ini events page</h1>

    <div id="calendar" class="overflow-x-scroll">
    </div>   

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                // Konfigurasi untuk mengambil events dari route Laravel
                events: '{{ route('events_data') }}', 

                // Konfigurasi tambahan (Opsional: interaktivitas)
                editable: false,
                eventDrop: function(info) {
                // Logic untuk update event via AJAX ke Laravel saat event di-drag
                },
                dateClick: function(info) {
                // Logic untuk menambah event baru saat tanggal di-klik
                },
                // ... konfigurasi FullCalendar lainnya
            });

            calendar.render();
        });
    </script>
@endsection