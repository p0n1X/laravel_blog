@extends('dashboard')

@section('admin')
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        Edit post
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/update">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                       value="{{ old('title') ?? $post->title }}">
                            </div>
                            <div class="form-floating mt-2">
                                <select id="category" name="category" class="form-select"
                                        aria-label="Default select example">
                                    <option selected>{{ old('category') ?? $post->category->name }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="category">{{ __('Category') }}</label>
                            </div>
                            <div class="form-group mt-2">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea type="text" class="form-control" id="description" name="description" rows="10"
                                          placeholder="Description">{{ old('description') ?? $post->description }}</textarea>
                            </div>
                            <input type="hidden" class="form-control" id="id" name="id" value="{{ $post->id }}">
                            <button type="submit" class="btn btn-primary mt-2">{{ __('Edit') }}</button>
                            <a class="btn btn-secondary float-end mt-2" href="/dashboard" role="button">Back</a>
                        </form>
                    </div>
                </div>
            </div>
@endsection
