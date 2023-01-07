@extends('admin.layouts.app')

@section('heading', 'Home Advertisement')

@section('main_content')
    <div class="section-body">
        <form action="{{ route('admin.top-ad.submit') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Top ad </h4>

                            <div class="form-group mb-3">
                                <label>Exisiting Photo</label>
                                <div>
                                    <img src="{{ asset('uploads/'.$ad_data->top_ad) }}" alt="" style="width: 100%">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Change Photo</label>
                                <div>
                                    <input type="file" name="top_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="top_ad_url" value="{{ $ad_data->top_ad_url }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="top_ad_status" class="form-control">
                                    <option value="Show" @if ($ad_data->top_ad_status == 'Show') selected @endif >Show</option>
                                    <option value="Hide" @if ($ad_data->top_ad_status == 'Hide') selected @endif >Hide</option>
                                </select>
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