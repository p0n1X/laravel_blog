@extends('dashboard')

@section('admin')
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                Create Category
            </div>
            <div class="card-body">
                <form method="POST" action="/category/post">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name"
                               value="">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">{{ __('Create') }}</button>
                    <a class="btn btn-secondary float-end mt-2" href="/category" role="button">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
