@extends('layout.master')
@section('content')
 
    <h1 class="text-center">All Posts</h1>

        <form action="{{ route('posts.search') }}" method="GET" class="d-flex justify-content-end mb-3">
            <!-- No @csrf needed for GET requests -->
            <input type="text" name="query" class="form-control w-25 me-2" placeholder="Search posts..." value="{{ request('query') }}">
            <button type="submit" class="btn btn-success">Search Posts</button>
        </form>
    <div class="text-center d-flex justify-content-center align-items-center" style="height: 60vh;">

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
        @foreach ($posts as  $post)
        <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>{{$post->content}}</td>
        <td>{{$post->created_at }}</td>
        <td>
            <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-info">View</a>
            <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-primary">Edit</a>
            <!-- <a href="/posts/{{$post['id']}}" class="btn btn-danger">Delete</a> -->

             <form method="POST" action="{{route('posts.delete', $post['id'])}}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" id="delete">Delete</button>
             </form>
        </td>
        @endforeach

        </tr>

    </tbody>
    </table>

    </div>
            <script>
                document.getElementById("delete").addEventListener('click',()=>{
                    confirm('do u want to delete ?')
                })
             </script>
@endsection
