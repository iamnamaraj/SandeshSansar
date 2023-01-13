@extends('admin.layouts.app')

@section('heading', 'Faq page')


@section('main_content')
<div class="section-body">
    <form action="{{ route('admin.faq.update', $faq->id) }}" method="post" >
        @csrf

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group mb-3">
                            <label>Title </label>
                            <input type="text" class="form-control" name="title" value="{{ $faq->title }}">
                        </div>



                        <div class="form-group mb-3">
                            <label>Details </label>
                            <textarea name="detail" class="form-control snote" cols="30" rows="10">{{ $faq->detail }}</textarea>
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
