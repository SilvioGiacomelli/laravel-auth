@extends('layouts.admin')
@section('content')
    <h1>Technologies</h1>
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
    <form class="d-flex" role="input" action="{{ route('admin.technologies.store') }}" method="POST">
        @csrf
        <input class="form-control me-2" name="title" type="input" placeholder="New Technology" aria-label="Search">
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
                    <td>{{ $technology->title }}</td>
                    <td>
                        <form action="{{ route('admin.technologies.edit', $technology->id) }}">
                            <input type="text" name="title" id="title" placeholder="New Technology">
                            <input type="submit" value="Send" class="btn btn-outline-success">
                        </form>

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
