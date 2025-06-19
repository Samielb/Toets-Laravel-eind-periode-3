@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Teachers</h1>
    <a href="/teachers/create" class="btn btn-primary">Add Teacher</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Hobbies</th>
                <th>Courses</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->hobbies }}</td>
                <td>
                    <ul class="list-unstyled mb-0">
                        @foreach($teacher->courses as $course)
                        <li>{{ $course->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="/teachers/{{ $teacher->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <form action="/teachers/{{ $teacher->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
