@extends('admin.layouts.app')

@section('heading', 'Social medias list')

@section('button')
    <a href="{{ route('admin.social_media.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Url</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medias as $media)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $media->name }} </td>
                                        <td> <i class="{{ $media->icon }}"></td>
                                        <td> {{ $media->url }} </td>

                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin.social_media.edit', $media->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin.social_media.delete', $media->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

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
@endsection