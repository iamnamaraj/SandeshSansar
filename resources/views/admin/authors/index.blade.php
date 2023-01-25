@extends('admin.layouts.app')

@section('heading', 'Authors list')

@section('button')
    <a href="{{ route('admin.author.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if ($author->photo == NuLL)
                                            <td> <img src="{{ asset('uploads/default.png')}}" alt="" style="height: 150px" > </td>
                                        @else
                                            <td> <img src="{{ asset('uploads/'.$author->photo)}}" alt="" style="height: 150px" > </td>

                                        @endif
                                        <td> {{ $author->name }} </td>
                                        <td> {{ $author->email }} </td>

                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin.author.edit', $author->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin.author.delete', $author->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

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