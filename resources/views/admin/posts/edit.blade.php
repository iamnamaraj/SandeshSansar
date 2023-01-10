{{-- @extends('admin.layouts.app')

@section('heading', 'Update Post')

@section('button')
    <a href="{{ route('posts.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label>Existing Photo</label>
                                <div>
                                    <img src="{{ asset('uploads/'.$post->photo) }}" alt="" style="width: 200px">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Photo *</label>
                                <div>
                                    <input type="file"  name="photo" value="">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Title *</label>
                                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                            </div>



                            <div class="form-group mb-3">
                                <label>Category *</label>
                                <select name="sub_category_id" class="form-control">
                                    <option value="">Choose category..</option>
                                    @foreach ($sub_categories as $category)
                                        <option value={{ $category->id }} @if ($category->id == $post->sub_category_id) selected @endif>{{ $category->name }} ({{ $category->rCategory->name }})</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Body *</label>
                                <textarea name="body" class="form-control snote" id="" cols="30" rows="10" >{{ $post->body }}</textarea>
                            </div>


                            <div class="form-group mb-3">
                                <label>Is Sharable ?*</label>
                                <select name="is_share" class="form-control">
                                    <option value="1" @if ($post->is_share == 1) selected @endif>Yes</option>
                                    <option value="0" @if ($post->is_share == 0) selected @endif>No</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Allow comments ?*</label>
                                <select name="is_comment" class="form-control">
                                    <option value="1" @if ($post->is_comment == 1) selected @endif>Yes</option>
                                    <option value="0" @if ($post->is_comment == 0) selected @endif>No</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Existing tags</label>
                                <table class="table table-bordered">
                                    @foreach ($tags as $tag)
                                    <tr>
                                        <td>
                                            {{ $tag->tag_name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('posts.tag.delete', [$tag->id, $post->id]) }}" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>

                                    @endforeach

                                </table>
                            </div>

                            <div class="form-group mb-3">
                                <label>Tags *</label>
                                <input type="text" class="form-control" name="tag_name" placeholder="Separate tags using coma(,)"  value="{{ old('tag_name') }}">
                            </div>


                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>

    </div> --}}


@extends('admin.layouts.app')

@section('heading', 'Update Post')

@section('button')
    <a href="{{ route('posts.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="form-group mb-3">
                                <label>Existing Photo</label>
                                <div>
                                    <img src="{{ asset('uploads/'.$post->photo) }}" alt="" style="width:200px">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Photo *</label>
                                <div>
                                    <input type="file"  name="photo" value="">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Title *</label>
                                <input type="text" class="form-control" name="title" value="{{  $post->title}}">
                            </div>



                            <div class="form-group mb-3">
                                <label>Category *</label>
                                <select name="sub_category_id" class="form-control">
                                    <option value="">Choose category..</option>
                                    @foreach ($sub_categories as $category)
                                        <option value={{ $category->id }} @if ($category->id == $post->sub_category_id) selected @endif >{{ $category->name }} ({{ $category->rCategory->name }})</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Body *</label>
                                <textarea name="body" class="form-control snote" id="" cols="30" rows="10" >{{$post->body}}</textarea>
                            </div>


                            <div class="form-group mb-3">
                                <label>Is Sharable ?*</label>
                                <select name="is_share" class="form-control">
                                    <option value="1" @if ($post->is_share == 1) selected @endif>Yes</option>
                                    <option value="0" @if ($post->is_share == 0) selected @endif>No</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Allow comments ?*</label>
                                <select name="is_comment" class="form-control">
                                    <option value="1" @if ($post->is_comment == 1) selected @endif>Yes</option>
                                    <option value="0" @if ($post->is_comment == 0) selected @endif>No</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Existing tags</label>
                                <table class="table table-bordered">
                                    @foreach ($tags as $tag)
                                    <tr>
                                        <td>
                                            {{ $tag->tag_name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('posts.tag.delete', [$tag->id, $post->id]) }}" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>

                                    @endforeach

                                </table>
                            </div>

                            <div class="form-group mb-3">
                                <label>Tags *</label>
                                <input type="text" class="form-control" name="tag_name" placeholder="Separate tags using coma(,)" value="{{ old('tag_name') }}">
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