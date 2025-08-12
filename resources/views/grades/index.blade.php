@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Grades</h1>
    <a href="{{ route('grades.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Grade</a>
    <ul>
        @foreach($grades as $grade)
            <li class="mb-2 p-2 border-b flex justify-between items-center">
                <span>{{ $grade->course }} - {{ $grade->assignment_name }}: {{ $grade->grade ?? 'N/A' }}</span>
                <div>
                    <a href="{{ route('grades.show', $grade) }}" class="text-blue-600 mr-2">View</a>
                    <a href="{{ route('grades.edit', $grade) }}" class="text-yellow-600 mr-2">Edit</a>
                    <form action="{{ route('grades.destroy', $grade) }}" method="POST" class="inline">
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
