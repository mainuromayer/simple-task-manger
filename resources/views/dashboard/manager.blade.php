@extends('dashboard')
@section('title', 'Manager')
@section('content')
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to Manager Dashboard</h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                <a href="{{ route('teammate.create') }}" class="btn btn-primary">Add Teammate</a>
                <a href="{{ route('task_assign.create') }}" class="btn btn-primary">Task Assign</a>
            </div>
        </div>
    </div>
@endsection
