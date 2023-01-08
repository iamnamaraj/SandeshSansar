@extends('admin.layouts.app')

@section('heading', 'Edit category')

@section('button')
    <a href="{{ route('admin.categories') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin.categories.update',$category->id) }}" method="post" >
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="form-group mb-3">
                                <label>Name *</label>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Staus *</label>
                                <select name="status" class="form-control">
                                    <option value="Show" @if ($category->status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($category->status == 'Hide') selected @endif>Hide</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Order *</label>
                                <input type="text" class="form-control" name="order" value=" {{ $category->order }}">
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