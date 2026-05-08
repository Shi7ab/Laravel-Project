@extends('layout.master')
@section('content')
    <div class="container">
        <h1 class="text-center">Profile</h1>
        <p>Name: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <p>Joined at: {{ Auth::user()->created_at }}</p>
        <a href="{{ route('auth.login') }}" class="btn btn-danger">Logout</a>
    </div>
@endsection
