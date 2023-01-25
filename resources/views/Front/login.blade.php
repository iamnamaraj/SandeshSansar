@extends('front.layouts.app')

@section('main_content')

    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $login->login_title }}</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $login->login_title }}</li>
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

                    <form action="{{ route('author.login-submit') }}" method="post">
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
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">

                                @error('password')
                                 <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Login</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection