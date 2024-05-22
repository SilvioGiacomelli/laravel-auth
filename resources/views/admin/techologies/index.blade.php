@extends('layouts.admin')
@section('content')
    <h1>Technologies</h1>
    <a href="{{ route('admin.technologies.create') }}">Create a new technology</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td>{{ $technology->id }}</td>
                    <td>{{ $technology->name }}</td>
                    <td>
                        <a href="{{ route('admin.technologies.show', $technology->id) }}">View</a>
                        <a href="{{ route('admin.technologies.edit', $technology->id) }}">Edit</a>
                        <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST">
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
