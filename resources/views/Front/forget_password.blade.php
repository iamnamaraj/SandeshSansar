@extends('front.layouts.app')

@section('main_content')

    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Forget password</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Forget password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <form action="{{ route('author.forget-password.submit') }}" method="post">
                        @csrf


                        <div class="login-form">
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">

                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Submit</button>
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection