@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Student</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
            </div>

            <div class="mb-3">
                <label for="matricula" class="form-label">Matricula (ID) - Cannot be changed</label>
                <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $student->matricula }}" disabled>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ $student->age }}" required>
            </div>

            <div class="mb-3">
                <label for="sex" class="form-label">Sex - Cannot be changed</label>
                <input type="text" class="form-control" id="sex" name="sex" value="{{ $student->sex }}" disabled>
            </div>

            <div class="mb-3">
                <label for="blood_status" class="form-label">Blood Status</label>
                <input type="text" class="form-control" id="blood_status" name="blood_status" value="{{ $student->blood_status }}" required>
            </div>

            <div class="mb-3">
                <label for="house" class="form-label">House - Determined by Sorting Hat</label>
                <input type="text" class="form-control" id="house" value="{{ $student->house }}" disabled>
            </div>

            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
</div>
@endsection
