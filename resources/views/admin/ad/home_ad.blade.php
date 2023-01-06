@extends('admin.layouts.app')

@section('heading', 'Home Advertisememnt')

@section('main_content')
    <div class="section-body">
        <form action="{{ route('admin.home-ad.submit') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Above search</h4>
                            <div class="form-group mb-3">
                                <label>Exisiting Photo</label>
                                <div>
                                    <img src="{{ asset('uploads/'.$data->above_search_ad) }}" alt="" style="width:100%">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Change Photo</label>
                                <div>
                                    <input type="file" name="above_search_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Url</label>
                                <input type="text" class="form-control" name="above_search_ad_url" value="{{ $data->above_search_ad_url }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Staus</label>
                                <select name="above_search_ad_status" class="form-control">
                                    <option value="Show" @if ($data->above_search_ad_status == 'Show') selected @endif >Show</option>
                                    <option value="Hide" @if ($data->above_search_ad_status == 'Hide') selected @endif >Hide</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Above footer</h4>

                            <div class="form-group mb-3">
                                <label>Exisiting Photo</label>
                                <div>
                                    <img src="{{ asset('uploads/'.$data->above_footer_ad) }}" alt="" style="width: 100%">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Change Photo</label>
                                <div>
                                    <input type="file" name="above_footer_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="above_footer_ad_url" value="{{ $data->above_footer_ad_url }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Staus</label>
                                <select name="above_footer_ad_status" class="form-control">
                                    <option value="Show" @if ($data->above_footer_ad_status == 'Show') selected @endif >Show</option>
                                    <option value="Hide" @if ($data->above_footer_ad_status == 'Hide') selected @endif >Hide</option>
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