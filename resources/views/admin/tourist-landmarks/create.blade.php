@extends('layouts.app')

@section('content')
<h1>Add New Tourist Landmark</h1>
<form action="{{ route('tourist-landmarks.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label for="governorate_id">Governorate</label>
        <select name="governorate_id" class="form-control" required>
            @foreach ($governorates as $governorate)
            <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>
@endsection
