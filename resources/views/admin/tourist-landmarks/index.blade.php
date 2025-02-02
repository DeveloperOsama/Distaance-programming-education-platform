@extends('layouts.app')

@section('content')
<h1>Tourist Landmarks</h1>
<a href="{{ route('tourist-landmarks.create') }}" class="btn btn-primary mb-3">Add New Landmark</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Governorate</th>
            <th>Image</th> <!-- إضافة عمود جديد للصور -->
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($landmarks as $landmark)
        <tr>
            <td>{{ $landmark->name }}</td>
            <td>{{ $landmark->location }}</td>
            <td>{{ $landmark->governorate->name }}</td>
            <td>
                <img src="{{ asset('storage/' . $landmark->image) }}" alt="{{ $landmark->name }}" width="100"> <!-- عرض الصورة -->
            </td>
            <td>
                <a href="{{ route('tourist-landmarks.edit', ['tourist_landmark' => $landmark->id]) }}" class="btn btn-warning">Edit</a> <!-- تعديل الرابط -->
                <form action="{{ route('tourist-landmarks.destroy', ['tourist_landmark' => $landmark->id]) }}" method="POST" style="display:inline;">
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
