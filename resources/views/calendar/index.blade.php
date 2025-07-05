@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-extrabold text-blue-400 text-center mb-6 flex items-center justify-center gap-2">
        <span>🗓️</span> Kalender Kegiatan <span>📅</span>
    </h1>
    <div id="calendar" class="bg-white rounded-xl shadow-lg p-4"></div>
</div>
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        height: 600,
        events: {
            url: '{{ url('api/calendar-events') }}',
            method: 'GET',
            failure: function() {
                alert('Gagal memuat data kalender!');
            }
        },
        eventClick: function(info) {
            info.jsEvent.preventDefault();
            if (info.event.url) {
                window.location.href = info.event.url;
            }
        }
    });
    calendar.render();
});
</script>
@endpush
@endsection 