@extends('layouts.app')

@section('content')
<h1>Edit Tourist Landmark</h1>
<form action="{{ route('tourist-landmarks.update', $landmark->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $landmark->name }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required>{{ $landmark->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" class="form-control" value="{{ $landmark->location }}" required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control">
        @if ($landmark->image)
            <img src="{{ asset('storage/' . $landmark->image) }}" alt="{{ $landmark->name }}" class="img-thumbnail mt-2" width="150">
        @endif
    </div>
    <div class="form-group">
        <label for="governorate_id">Governorate</label>
        <select name="governorate_id" class="form-control" required>
            @foreach ($governorates as $governorate)
                <option value="{{ $governorate->id }}" {{ $landmark->governorate_id == $governorate->id ? 'selected' : '' }}>
                    {{ $governorate->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
@endsection
