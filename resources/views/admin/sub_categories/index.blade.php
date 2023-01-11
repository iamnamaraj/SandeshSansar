@extends('admin.layouts.app')

@section('heading', 'Sub-Categories List')

@section('button')
    <a href="{{ route('admin.sub-categories.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Parent Category</th>
                                    <th>Show on menu</th>
                                    <th>Show on home</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sub_categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            {{ $category->rCategory->name}}
                                        </td>
                                        <td>{{ $category->status }}</td>
                                        <td>{{ $category->show_on_home }}</td>
                                        <td>{{ $category->order }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin.sub-categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin.sub-categories.delete', $category->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

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