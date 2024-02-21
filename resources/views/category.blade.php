@extends('index')


@section('content')
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center">
                <h1 class="fw-bolder">Welcome to Blog Place!</h1>
                <p class="lead mb-0">Test blog place</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Blog post-->
                        @foreach($posts as $post)
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top"
                                                  src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..."/></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ $post->created_at }}</div>
                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    <p class="card-text">{{ $post->description }}</p>
                                    <a class="btn btn-primary" href="/show/{{ $post->id }}">Read more →</a>
                                </div>
                            </div>
                        @endforeach
                        <!-- Blog post-->
                    </div>
                </div>
            </div>
            @include('sidebar')
        </div>
    </div>
@endsection
