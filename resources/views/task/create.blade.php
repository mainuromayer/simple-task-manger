@extends('dashboard')
@section('title', 'Task Create')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Task</h1>
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">

            </div>
            <div class="col-6 text-right">
                <a href="{{ route('task') }}" class="btn btn-primary mx-3">Task</a>
            </div>
        </div>
        <div class="row mt-2 mb-3">
            <form action="{{ route('task.store') }}" method="post" class="col-12">
                @csrf
                <div class="form-group">
                    <label for="task_name">Task Name</label>
                    <input type="text" name="task_name" id="task_name" class="form-control" value="{{ old('task_name') }}"
                        placeholder="Enter task name">
                    @error('task_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="project">Project</label>
                    <select name="project" id="project" class="form-control">
                        <option value="">Select Project</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" {{ old('project') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @error('project')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Description" rows="4"></textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="working" {{ old('status') == 'working' ? 'selected' : '' }}>Working</option>
                        <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Add Project</button>
                </div>
            </form>
        </div>

    </div>
@endsection
