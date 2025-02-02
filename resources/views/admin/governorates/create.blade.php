@extends('layouts.app')

@section('content')
<h1>Add New Governorate</h1>
<form action="{{ route('governorates.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>
@endsection
