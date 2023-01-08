@extends('admin.layouts.app')

@section('heading', 'Sidebar Advertisement update')

@section('button')
    <a href="{{ route('admin.sidebar-ad') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin.sidebar-ad.update', $ad_data->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label>Existing Photo</label>
                                <div>
                                    <img src="{{ asset('uploads/'.$ad_data->sidebar_ad) }}" alt="" style="width: 200px">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Change Photo</label>
                                <div>
                                    <input type="file" name="sidebar_ad">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" class="form-control" name="sidebar_ad_url" value="{{ $ad_data->sidebar_ad_url }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Location</label>
                                <select name="sidebar_ad_location" class="form-control">
                                    <option value="Top" @if($ad_data->sidebar_ad_location == 'Top') selected @endif>Top</option>
                                    <option value="Bottom" @if($ad_data->sidebar_ad_location == 'Bottom') selected @endif>Bottom</option>
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