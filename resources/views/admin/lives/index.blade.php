@extends('admin.layouts.app')

@section('heading', 'Live channel list')

@section('button')
    <a href="{{ route('admin.live.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Video</th>
                                    <th>Heading</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lives as $live)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            <iframe
                                                width="300" height="220" src="https://www.youtube.com/embed/{{ $live->video_id }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen>
                                             </iframe>
                                        </td>

                                        <td> {{ $live->heading }} </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin.live.edit', $live->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin.live.delete', $live->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

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