@extends('dashboard')
@section('title', 'Task Assign')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Task Assign</h1>
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                {{-- <div class="input-group">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">Search</button>
                    </div>
                </div> --}}
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('task_assign.create') }}" class="btn btn-primary mx-3">Add Assign Task</a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="row mt-4">
            <div class="table-responsive px-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Teammate</th>
                            <th>Project</th>   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskAssign as $assign)
                            <tr>
                                <td>{{ $assign->user->name }}</td>
                                <td>{{ $assign->task->task_name }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
