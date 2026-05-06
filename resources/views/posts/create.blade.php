@extends('layout.master')

@section('content')
<div class="container mt-5">

    <h2>Create Post</h2>

    <form  action="{{ route('posts.store') }}" method="POST">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input
                type="text"
                name="title"
                class="form-control"
                placeholder="Enter post title"
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
                placeholder="Enter post content"
                required
            ></textarea>
        </div>
          <div class="mb-3">
            <label class="form-label">description</label>
            <textarea
                name="description"
                class="form-control"
                rows="5"
                placeholder="Enter post content"
                required
            ></textarea>
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-success">
            Create
        </button>

        <a href="/posts" class="btn btn-secondary">
            Cancel
        </a>
    </form>

</div>
@endsection
