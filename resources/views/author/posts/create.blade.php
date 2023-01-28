@extends('author.layouts.app')

@section('heading', 'Post create')

@section('button')
    <a href="{{ route('author.post') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('author.post.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="form-group mb-3">
                                <label>Photo *</label>
                                <div>
                                    <input type="file"  name="photo" value="">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Title *</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                            </div>



                            <div class="form-group mb-3">
                                <label>Category *</label>
                                <select name="sub_category_id" class="form-control">
                                    <option value="">Choose category..</option>
                                    @foreach ($sub_categories as $category)
                                        <option value={{ $category->id }}>{{ $category->name }} ({{ $category->rCategory->name }})</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Body *</label>
                                <textarea name="body" class="form-control snote" id="" cols="30" rows="10" ></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Tags *</label>
                                <input type="text" class="form-control" name="tag_name" placeholder="Separate tags using coma(,)" value="">
                            </div>


                            <div class="form-group mb-3">
                                <label>Is Sharable ?*</label>
                                <select name="is_share" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Allow comments ?*</label>
                                <select name="is_comment" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Share with Subscribers ?*</label>
                                <select name="subscriber_share" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
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