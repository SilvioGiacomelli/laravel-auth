@extends('layouts.admin')
@section('content')
    <h1>Types</h1>
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
    <form class="d-flex" role="search" action="{{ route('admin.types.store') }}" method="POST">
        @csrf
        <input class="form-control me-2" name="title" type="input" placeholder="New Type" aria-label="Search">
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
            @foreach ($types as $type)
                <tr scope="row">
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->title }}</td>
                    <td>
                        <a href="{{ route('admin.types.show', $type->id) }}">View</a>
                        <a href="{{ route('admin.types.edit', $type->id) }}">Edit</a>
                        <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
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
