@extends('layouts.admin')
@section('content')
    <h1>Technologies</h1>
    <form class="d-flex" role="input" action="{{ route('admin.technologies.create') }}">
        <input class="form-control me-2" type="input" placeholder="New Technology" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Send</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr scope="row">
                    <td>{{ $technology->id }}</td>
                    <td>{{ $technology->name }}</td>
                    <td>
                        <a href="{{ route('admin.technologies.show', $technology->id) }}">View</a>
                        <a href="{{ route('admin.technologies.edit', $technology->id) }}">Edit</a>
                        <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST">
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
