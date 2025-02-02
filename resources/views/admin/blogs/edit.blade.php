@extends('layouts.app')

@section('content')
<h1>Edit Blog</h1>
<form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" rows="5" required>{{ $blog->content }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control">
        @if ($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-thumbnail mt-2" width="150">
        @endif
    </div>
    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
@endsection
