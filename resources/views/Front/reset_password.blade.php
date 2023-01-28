@extends('front.layouts.app')

@section('main_content')

    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Reset password</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reset password</li>
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

                    <form action="{{ route('author.reset_password.submit') }}" method="post">
                        @csrf

                        <input type="hidden" name="token" value="{{  $token  }}">
                        <input type="hidden" name="email" value="{{  $email  }}">

                        <div class="login-form">

                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">

                                @error('password')
                                 <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Retype Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="retype_password">

                            </div>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Reset</button>
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection