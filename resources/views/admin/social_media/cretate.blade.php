@extends('admin.layouts.app')

@section('heading', 'Create Social media')

@section('button')
    <a href="{{ route('admin.social_media') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin.social_media.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <div class="form-group mb-3">
                                <label>Name *</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Icon *</label>
                                <input type="text" class="form-control" name="icon" value="{{old('icon')}}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Url *</label>
                                <input type="text" class="form-control" name="url" value="{{old('url')}}">
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