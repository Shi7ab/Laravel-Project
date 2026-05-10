@extends('layout.master')
@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        @if ($posts->isEmpty())
            <p>No posts found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">content</th>
                        <th scope="col">created at</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{ route('posts.delete', $post->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" id="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection
