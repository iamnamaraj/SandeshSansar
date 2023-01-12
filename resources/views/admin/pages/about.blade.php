@extends('admin.layouts.app')

@section('heading', 'About page')


@section('main_content')
<div class="section-body">
    <form action="{{ route('admin.about.update') }}" method="post" >
        @csrf

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="about_title" value="{{ $about->about_title }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Staus *</label>
                            <select name="about_status" class="form-control">
                                <option value="Show" @if ($about->about_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if ($about->about_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Details *</label>
                            <textarea name="about_detail" class="form-control snote" cols="30" rows="10">{{ $about->about_detail }}</textarea>
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
