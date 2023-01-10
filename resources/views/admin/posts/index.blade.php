@extends('admin.layouts.app')

@section('heading', 'Posts List')

@section('button')
    <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                        <th>Title</th>
                                        <th>Parent Category</th>
                                        <th>Sub Category</th>
                                        <th>Admin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/'.$post->photo) }}" alt="" style="width: 100px">
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->rSubCategory->rcategory->name}}</td>
                                            <td>{{ $post->rSubCategory->name  }}</td>
                                            <td>
                                                @if ($post->admin_id != 0)
                                                    {{ Auth::guard('admin')->user()->name }}
                                                @endif
                                            </td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route('posts.delete', $post->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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