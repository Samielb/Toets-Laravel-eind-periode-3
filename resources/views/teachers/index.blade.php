@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Teachers</h1>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary">Create New Teacher</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Hobby</th>
                    <th>Subjects</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->naam }}</td>
                    <td>{{ $teacher->hobby }}</td>
                    <td>
                        <ul class="list-unstyled mb-0">
                            @foreach($teacher->subjects as $subject)
                            <li>{{ $subject->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
