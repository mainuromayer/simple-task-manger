@extends('dashboard')
@section('title', 'Assign Task')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Assign Task</h1>
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">

            </div>
            <div class="col-6 text-right">
                <a href="{{ route('task_assign') }}" class="btn btn-primary mx-3"> Task Assign</a>
            </div>
        </div>
        <div class="row mt-2 mb-3">
            <form action="{{ route('task_assign.store') }}" method="post" class="col-12">
                @csrf
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">Select User</option>
                        @foreach ($teammate as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="task_id">Task</label>
                    <select name="task_id" id="task_id" class="form-control">
                        <option value="">Select Task</option>
                        @foreach ($task as $taskItem)
                            <option value="{{ $taskItem->id }}" {{ old('task_id') == $taskItem->id ? 'selected' : '' }}>
                                {{ $taskItem->task_name }}
                            </option>
                        @endforeach
                    </select>
                    
                    @error('task_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Assign Task</button>
                </div>
            </form>
        </div>
    </div>
@endsection
