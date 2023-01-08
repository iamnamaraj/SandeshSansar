@extends('admin.layouts.app')

@section('heading', 'Sidebar Advertisememnt')

@section('button')
    <a href="{{ route('admin.sidebar-ad.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>URL</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ad_data as $ad)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$ad->sidebar_ad) }}" alt="" style="width: 150px">
                                        </td>
                                        <td>{{ $ad->sidebar_ad_url }}</td>
                                        <td>{{ $ad->sidebar_ad_location }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin.sidebar-ad.edit', $ad->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin.sidebar-ad.delete', $ad->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()