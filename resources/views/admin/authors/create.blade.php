@extends('admin.layouts.app')

@section('heading', 'Author create')

@section('button')
    <a href="{{ route('admin.author') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')
    <div class="section-body">
        <form action="{{ route('admin.author.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div><input type="file" name="photo"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Name *</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Email *</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password *</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group mb-3">
                                <label>Retype Password *</label>
                                <input type="password" class="form-control" name="retype_password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

        </form>
    </div>


@endsection
