@extends('dashboard')
@section('title', 'Task')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Task</h1>
                <hr>
            </div>
        </div>
        <form action="{{ route('task') }}" method="get">
            <div class="row">
            <div class="col-md-4">
                <label for="status">Filter by Status:</label>
                <select name="status" id="status" class="form-control">
                <option value="">All Statuses</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="working" {{ request('status') == 'working' ? 'selected' : '' }}>Working</option>
                <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                </select>
                <button type="submit" class="btn btn-primary my-2">Apply Filters</button> 
            </div>
            <div class="col-md-4">
                <label for="project">Filter by Project:</label>
                <select name="project" id="project" class="form-control">
                <option value="">All Projects</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ request('project') == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                    </option>
                @endforeach
                </select>
                <button type="submit" class="btn btn-primary my-2">Apply Filters</button> 
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ route('task.create') }}" class="btn btn-primary">Add Task</a>
            </div>
            </div>
        </form>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->project->name }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->status }}</td>
                                <td class="d-flex col">
                                    <a href="{{ route('task.edit', ['id' => $task->id]) }}"
                                        class="btn btn-primary btn-sm mx-2">Edit</a>
                                    <form action="{{ route('task.destroy', ['id' => $task->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
