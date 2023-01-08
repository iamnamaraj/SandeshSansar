@extends('admin.layouts.app')

@section('heading', 'Create Sub-category')

@section('button')
    <a href="{{ route('admin.sub-categories') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin.sub-categories.store') }}" method="post" >
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="form-group mb-3">
                                <label>Sub Category *</label>
                                <input type="text" class="form-control" name="name" value="">
                            </div>


                            <div class="form-group mb-3">
                                <label>Parent Category *</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $parent)
                                    <option value="">Choose parent category..</option>
                                        <option value="{{$parent->id}}">{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Staus *</label>
                                <select name="status" class="form-control">
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Order *</label>
                                <input type="text" class="form-control" name="order" value="">
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

        </form>

    </div>

@endsection