@extends('dashboard')

@section('admin')
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        Create new post
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/post/">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                            </div>
                            <div class="form-floating mt-2">
                                <select id="category_id" name="category_id" class="form-select"
                                        aria-label="Default select example">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="category">{{ __('Category') }}</label>
                            </div>
                            <div class="form-group mt-2">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea type="text" class="form-control" id="description" name="description" rows="10" placeholder="Description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">{{ __('Create') }}</button>
                            <a class="btn btn-secondary float-end mt-2" href="/dashboard" role="button">Back</a>
                        </form>
                    </div>
                </div>
            </div>
@endsection
