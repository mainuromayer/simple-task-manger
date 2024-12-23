@extends('dashboard')
@section('title', 'Teammate')
@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to <span class="text-success">{{ $user->name }}</span> Dashboard</h1>
                <hr>
            </div>
        </div>
        <div class="mt-4">
            <form action="{{ route('dashboard') }}" method="get">
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search"
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="status" id="status" class="form-control">
                            <option value="">All Statuses</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="working" {{ request('status') == 'working' ? 'selected' : '' }}>Working</option>
                            <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
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
                            <th>Task Name</th>
                            <th>Project</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->project->name ?? 'No Project' }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
