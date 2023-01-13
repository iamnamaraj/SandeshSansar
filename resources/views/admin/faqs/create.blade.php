@extends('admin.layouts.app')

@section('heading', 'Faq Create')

@section('button')
    <a href="{{ route('admin.faq') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin.faq.store') }}" method="post">
        @csrf

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group mb-3">
                            <label>Title </label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>



                        <div class="form-group mb-3">
                            <label>Details </label>
                            <textarea name="detail" class="form-control snote" cols="30" rows="10"></textarea>
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
