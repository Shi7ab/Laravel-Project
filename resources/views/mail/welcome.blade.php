@extends('layout.master')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center align-items-center" style="min-height: 75vh;">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <div class="card-body p-5 text-center">

                    <div class="mb-4">
                        <div class="display-3">
                            🚀
                        </div>
                    </div>

                    <h1 class="fw-bold mb-3 text-dark">
                        Welcome to Our Blog
                    </h1>

                    <p class="lead text-muted mb-4">
                        Thank you for joining our community.
                        Discover inspiring articles, modern web development ideas,
                        programming tutorials, and powerful technology insights.
                    </p>

                    <div class="d-flex justify-content-center gap-3 flex-wrap">

                        <a href="{{ url('/posts') }}"
                           class="btn btn-primary btn-lg px-4 rounded-pill shadow-sm">
                            Explore Posts
                        </a>

                        <a href="{{ url('/') }}"
                           class="btn btn-outline-dark btn-lg px-4 rounded-pill">
                            Back Home
                        </a>

                    </div>

                    <hr class="my-5">

                    <div class="row text-center">

                        <div class="col-md-4 mb-3">
                            <div class="p-3 rounded-4 bg-light shadow-sm">
                                <h3 class="fw-bold text-primary">
                                    100+
                                </h3>
                                <p class="text-muted mb-0">
                                    Articles
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="p-3 rounded-4 bg-light shadow-sm">
                                <h3 class="fw-bold text-success">
                                    24/7
                                </h3>
                                <p class="text-muted mb-0">
                                    Learning Access
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="p-3 rounded-4 bg-light shadow-sm">
                                <h3 class="fw-bold text-danger">
                                    Laravel
                                </h3>
                                <p class="text-muted mb-0">
                                    Modern Development
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
