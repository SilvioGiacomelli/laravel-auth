@extends('layouts.admin')
@section('content')
    <h1>Projects</h1>
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-green" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form class="d-flex" role="input" action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <input class="form-control me-2" name="title" type="input" placeholder="New Project" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Send</button>
    </form>

    <table class="table">
        <thead>
            <tr scope="row">
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr scope="row">
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project->id) }}">View</a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
