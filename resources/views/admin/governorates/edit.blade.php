@extends('layouts.app')

@section('content')
<h1>Edit Governorate</h1>
<form action="{{ route('governorates.update', $governorate->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $governorate->name }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ $governorate->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
@endsection
