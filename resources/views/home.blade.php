@extends('adminlte::page')

@section('title', 'Dashboard')

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
<div class="container">
    <div id="calendar"></div>
</div>

<script>
    declare var FullCalendar: any;

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid', 'interaction'],
            events: [
                @foreach($logs as $log)
                {
                    title: '{{ $log->user->name }}: {{ $log->status }}',
                    start: '{{ $log->created_at }}',
                },
                @endforeach
            ],
            editable: true,
            droppable: true
        });
        calendar.render();
    });
</script>
@endsection
