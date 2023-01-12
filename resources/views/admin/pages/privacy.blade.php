@extends('admin.layouts.app')

@section('heading', 'Privacy & Policies Page')


@section('main_content')
<div class="section-body">
    <form action="{{ route('admin.privacy.update') }}" method="post" >
        @csrf

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="privacy_title" value="{{ $privacy->privacy_title }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Staus *</label>
                            <select name="privacy_status" class="form-control">
                                <option value="Show" @if ($privacy->privacy_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if ($privacy->privacy_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Details *</label>
                            <textarea name="privacy_detail" class="form-control snote" cols="30" rows="10">{{ $privacy->privacy_detail }}</textarea>
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
