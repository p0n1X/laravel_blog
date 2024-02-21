@extends('dashboard')

@section('admin')
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                Post Page
                <a class="btn btn-success float-end" href="{{ url('/create') }}">Add new Post</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th scope="col" class="col-md-1">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col" class="col-md-1">&nbsp;</th>
                        <th scope="col" class="col-md-1">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row"># {{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td><a class="btn btn-primary" href="/edit/{{ $post->id }}">Edit</a></td>
                            <td>
                                <button type="button" class="btn btn-danger deleteBtn" value="{{ $post->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    @include('post.modal')
@endsection
