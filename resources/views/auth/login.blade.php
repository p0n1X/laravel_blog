@extends('index')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Log in
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                   href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
