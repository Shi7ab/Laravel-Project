@extends('layout.master')

@section('content')
<form action="{{ route('posts.show', $post['id']) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Title --}}
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ $post['title'] }}"
            required
        >
    </div>

    {{-- Content --}}
    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea
            name="content"
            class="form-control"
            rows="5"
            required
        >{{ $post['content'] }}</textarea>
    </div>

     <div class="mb-3">
        <label class="form-label">description</label>   
        <textarea
            name="description"
            class="form-control"
            rows="5"
            required
        >{{ $post['description'] }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">
        Update
    </button>

    <a href="/posts" class="btn btn-secondary">
        Cancel
    </a>
</form>
@endsection
