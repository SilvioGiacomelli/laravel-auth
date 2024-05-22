@extends('layouts.admin')
@section('content')
    <h1>Types</h1>
    <a href="{{ route('admin.types.create') }}">Create a new types</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>
                        <a href="{{ route('admin.types.show', $type->id) }}">View</a>
                        <a href="{{ route('admin.types.edit', $type->id) }}">Edit</a>
                        <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
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
