@extends('layout.master')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">All Posts</h1>

        <form action="{{ route('posts.search') }}" method="GET" class="d-flex">
            <input 
                type="text"
                name="query"
                class="form-control me-2"
                placeholder="Search posts..."
                value="{{ request('query') }}"
            >

            <button type="submit" class="btn btn-success">
                Search
            </button>
        </form>
    </div>

    <div class="card shadow border-0">
        <div class="card-body">

            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th width="250">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($posts as $post)

                    <tr>
                        <td>{{ $post->id }}</td>

                        <td class="fw-bold">
                            {{ $post->title }}
                        </td>

                        <td>
                            {{ Str::limit($post->content, 80) }}
                        </td>

                        <td>
                            {{ $post->created_at->diffForHumans() }}
                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ route('posts.show', $post->id) }}"
                                   class="btn btn-info btn-sm">
                                    View
                                </a>

                                <a href="{{ route('posts.edit', $post->id) }}"
                                   class="btn btn-primary btn-sm">
                                    Edit
                                </a>

                                <form method="POST"
                                      action="{{ route('posts.delete', $post->id) }}"
                                      onsubmit="return confirm('Do you want to delete this post?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            No Posts Found
                        </td>
                    </tr>

                    @endforelse

                </tbody>
            </table>

            <div class="mt-4 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>

        </div>
    </div>

</div>

@endsection