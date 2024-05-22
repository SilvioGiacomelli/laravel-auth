@extends('layouts.admin')
@section('content')
    <h1>Projects</h1>
    <a href="{{ route('admin.projects.create') }}">Create a new project</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project->id) }}">View</a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
