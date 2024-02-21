@extends('dashboard')

@section('admin')
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                Category Page
                <a class="btn btn-success float-end" href="{{ url('/category/create') }}">Add new Category</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th scope="col" class="col-md-1">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col" class="col-md-1">&nbsp;</th>
                        <th scope="col" class="col-md-1"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row"># {{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td><a class="btn btn-primary" href="/category/edit/{{ $category->id }}">Edit</a></td>
                            <td>
                                <button type="button" class="btn btn-danger deleteBtn" value="{{ $category->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
    @include('category.modal')
@endsection
