@extends('dashboard')
@section('title', 'Teammate Edit')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Teammate</h1>
                <hr>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="row mt-4">
            <div class="col-6">

            </div>
            <div class="col-6 text-right">
                <a href="{{ route('teammate') }}" class="btn btn-primary mx-3">Teammate</a>
            </div>
        </div>
        <div class="row mt-2 mb-3">
            <form action="{{ route('teammate.update', $teammate->id) }}" method="post" class="col-12">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $teammate->name) }}" placeholder="Enter name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $teammate->email) }}" placeholder="Enter email">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="form-group mt-3">
            <label for="employee_id">Employee ID</label>
            <input type="text" name="employee_id" id="employee_id" class="form-control"
                value="{{ old('employee_id', $teammate->employee_id) }}" placeholder="Enter employee ID">
            @error('employee_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="position">Position</label>
            <input type="text" name="position" id="position" class="form-control"
                value="{{ old('position', $teammate->position) }}" placeholder="Enter position">
            @error('position')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Update Teammate</button>
        </div>
        </form>
    </div>

    </div>
@endsection
