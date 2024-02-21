@extends('index')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-lg-2">
                <div class="card mb-4">
                    <div class="card-header">
                        Menu
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a class="nav-link" href="{{ url('/dashboard') }}">Post</a></li>
                        <li class="list-group-item"><a class="nav-link" href="{{ url('/category') }}">Category</a></li>
                    </ul>
                </div>
            </div>
            @section('admin')
            @show
        </div>
    </div>
@endsection
