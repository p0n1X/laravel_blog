@extends('dashboard')

@section('admin')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Edit Category
            </div>
            <div class="card-body">
                <form method="POST" action="/category/update">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-2">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name"
                               value="{{ old('name') ?? $category->name }}">
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $category->id }}">
                    <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                    <a class="btn btn-secondary float-end" href="/category" role="button">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
