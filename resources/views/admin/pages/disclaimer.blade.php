@extends('admin.layouts.app')

@section('heading', 'Disclaimer page')


@section('main_content')
<div class="section-body">
    <form action="{{ route('admin.disclaimer.update') }}" method="post" >
        @csrf

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="disclaimer_title" value="{{ $disclaimer->disclaimer_title }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Staus *</label>
                            <select name="disclaimer_status" class="form-control">
                                <option value="Show" @if ($disclaimer->disclaimer_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if ($disclaimer->disclaimer_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Details *</label>
                            <textarea name="disclaimer_detail" class="form-control snote" cols="30" rows="10">{{ $disclaimer->disclaimer_detail }}</textarea>
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
