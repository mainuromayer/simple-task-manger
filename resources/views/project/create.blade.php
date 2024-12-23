@extends('dashboard')
@section('title', 'Project Create')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Project</h1>
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">

            </div>
            <div class="col-6 text-right">
                <a href="{{ route('project') }}" class="btn btn-primary mx-3">Project</a>
            </div>
        </div>
        <div class="row mt-2 mb-3">
            <form action="{{ route('project.store') }}" method="post" class="col-12">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Enter name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="project_code">Project Code</label>
                    <input type="project_code" name="project_code" id="project_code" class="form-control"
                        value="{{ old('project_code') }}" placeholder="Enter Project Code">
                    @error('project_code')
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
