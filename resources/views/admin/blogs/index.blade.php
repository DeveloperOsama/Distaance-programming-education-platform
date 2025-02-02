@extends('layouts.app')

@section('content')
<h1>Blogs</h1>
<a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Add New Blog</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <td>{{ $blog->title }}</td>
            <td>{{ Str::limit($blog->content, 50) }}</td>
            <td>
                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
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
