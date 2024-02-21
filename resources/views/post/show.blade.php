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
            <div class="col-lg-8">
                <div class="card mb-3">
                    <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..."/>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text"><small class="text-muted">Category: {{ $post->category->name }}</small></p>
                        <p class="card-text"><small class="text-muted">Author: {{ $post->user->name }}</small></p>
                        <p class="card-text">{{ $post->description }}</p>
                    </div>
                </div>
                @include('post.comment')
            </div>
            @include('sidebar')
        </div>
    </div>
@endsection


