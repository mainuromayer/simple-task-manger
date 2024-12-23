@extends('dashboard')
@section('title', 'Project')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Project</h1>
                <hr>
            </div>
        </div>
        <form action="{{ route('project') }}" method="get">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search"
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary my-2">Search</button>
                </div>

                <div class="col-md-4 text-right">
                    <a href="{{ route('project.create') }}" class="btn btn-primary">Add Project</a>
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
                            <th>Name</th>
                            <th>Project Code</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->project_code }}</td>
                                <td class="d-flex col">
                                    <a href="{{ route('project.edit', ['id' => $project->id]) }}"
                                        class="btn btn-primary btn-sm mx-2">Edit</a>
                                    <form action="{{ route('project.destroy', ['id' => $project->id]) }}" method="post">
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
