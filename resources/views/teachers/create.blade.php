@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Create Teacher</div>
            <div class="card-body">
                <form action="/teachers" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Teacher Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="hobbies" class="form-label">Hobbies</label>
                        <input type="text" class="form-control" id="hobbies" name="hobbies">
                    </div>
                    <button type="submit" class="btn btn-primary">Create Teacher</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
