@extends('admin.layouts.app')

@section('heading', 'Update Author')

@section('button')
    <a href="{{ route('admin.author') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')
    <div class="section-body">
        <form action="{{ route('admin.author.update', $author->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Existing photo</label>
                                <div><img src="{{ asset('uploads/'.$author->photo) }}" alt="" style="height: 200px">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div><input type="file" name="photo"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Name *</label>
                                <input type="text" class="form-control" name="name" value="{{ $author->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Email *</label>
                                <input type="email" class="form-control" name="email" value="{{ $author->email}}">
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
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>


@endsection
