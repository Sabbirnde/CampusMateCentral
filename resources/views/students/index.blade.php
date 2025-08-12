@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Students</h1>
    <a href="{{ route('students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Student</a>
    <ul>
        @foreach($students as $student)
            <li class="mb-2 p-2 border-b flex justify-between items-center">
                <span>{{ $student->full_name }} ({{ $student->student_id }})</span>
                <div>
                    <a href="{{ route('students.show', $student) }}" class="text-blue-600 mr-2">View</a>
                    <a href="{{ route('students.edit', $student) }}" class="text-yellow-600 mr-2">Edit</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
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
