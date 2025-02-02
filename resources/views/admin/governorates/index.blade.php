@extends('layouts.app')

@section('content')
<h1>Governorates</h1>
<a href="{{ route('governorates.create') }}" class="btn btn-primary mb-3">Add New Governorate</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($governorates as $governorate)
        <tr>
            <td>{{ $governorate->name }}</td>
            <td>{{ $governorate->description }}</td>
            <td>
                <a href="{{ route('governorates.edit', $governorate->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('governorates.destroy', $governorate->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
