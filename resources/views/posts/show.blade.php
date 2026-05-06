@extends('layout.master')
@section('content')
    <div class="text-center d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $post['title'] }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $post['content'] }}</p>
            <p class="card-text">{{ $post['description'] }}</p>
            <h6 class="card-subtitle mb-2 text-muted">{{ $post['created_at'] }}</h6>
        </div>
        </div>
    </div>
@endsection
