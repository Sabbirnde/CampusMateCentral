@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Assignments</h1>
    <a href="{{ route('assignments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Assignment</a>
    <ul>
        @foreach($assignments as $assignment)
            <li class="mb-2 p-2 border-b flex justify-between items-center">
                <span>{{ $assignment->title }} (Due: {{ $assignment->due_date }})</span>
                <div>
                    <a href="{{ route('assignments.show', $assignment) }}" class="text-blue-600 mr-2">View</a>
                    <a href="{{ route('assignments.edit', $assignment) }}" class="text-yellow-600 mr-2">Edit</a>
                    <form action="{{ route('assignments.destroy', $assignment) }}" method="POST" class="inline">
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
