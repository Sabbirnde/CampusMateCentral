@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Schedules</h1>
    <a href="{{ route('schedules.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Schedule</a>
    <ul>
        @foreach($schedules as $schedule)
            <li class="mb-2 p-2 border-b flex justify-between items-center">
                <span>{{ $schedule->day }} {{ $schedule->time }} - {{ $schedule->course }} ({{ $schedule->code }})</span>
                <div>
                    <a href="{{ route('schedules.show', $schedule) }}" class="text-blue-600 mr-2">View</a>
                    <a href="{{ route('schedules.edit', $schedule) }}" class="text-yellow-600 mr-2">Edit</a>
                    <form action="{{ route('schedules.destroy', $schedule) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
