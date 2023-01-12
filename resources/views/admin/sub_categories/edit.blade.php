@extends('admin.layouts.app')

@section('heading', 'Update Sub-category')

@section('button')
    <a href="{{ route('admin.sub-categories') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin.sub-categories.update',$sub_category->id) }}" method="post" >
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="form-group mb-3">
                                <label>Sub Category *</label>
                                <input type="text" class="form-control" name="name" value="{{ $sub_category->name}}">
                            </div>


                            <div class="form-group mb-3">
                                <label>Parent Category *</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $parent)
                                        <option value="{{ $parent->id }}"  @if ($sub_category->category_id == $parent->id) selected @endif>{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>show on menu *</label>
                                <select name="status" class="form-control">
                                    <option value="Show" @if($sub_category->status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if($sub_category->status == 'Hide') selected @endif>Hide</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Show on home *</label>
                                <select name="show_on_home" class="form-control">
                                    <option value="Show" @if($sub_category->show_on_home == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if($sub_category->show_on_home == 'Hide') selected @endif>Hide</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Order *</label>
                                <input type="text" class="form-control" name="order" value="{{ $sub_category->order }}">
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