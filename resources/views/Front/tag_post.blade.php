@extends('front.layouts.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All post of {{ $tagname }} tag</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Tag</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $tagname }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">

                <div class="category-page">
                    <div class="row">


                        @if (count($all_post))
                            @foreach ($all_post as $post)
                                @if (!in_array($post->id, $post_id))
                                    @continue
                                @endif

                                <div class="col-lg-6 col-md-12">
                                    <div class="category-page-post-item">
                                        <div class="photo">
                                            <img src="{{ asset('uploads/'.$post->photo) }}" alt="">
                                        </div>
                                        <div class="category">
                                            <span class="badge bg-success">{{ $post->rSubCategory->name }}</span>
                                        </div>
                                        <h3><a href="{{ route('front.post.view', $post->id) }}">{{ $post->title }}</a></h3>
                                        <div class="date-user">
                                            <div class="user">

                                                @if ($post->author_id == 0)
                                                    @php
                                                        $user_data = \App\Models\Admin::where('id', $post->admin_id)->first();
                                                    @endphp
                                                @else

                                                @endif
                                                <a href="{{ route('front.post.view', $post->id) }}">{{ $user_data->name }}</a>

                                            </div>

                                            <div class="date">
                                                @php
                                                $ts = strtotime($post->updated_at);
                                                $updated_date = date('d M Y', $ts);
                                                @endphp
                                                <a href="{{ route('front.post.view', $post->id) }}">{{ $updated_date }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @else
                            <span class="text-danger">Sorry,no post is found.</span>

                        @endif

                        {{-- <div class="col-md-12">
                            {{ $all_post->links() }}
                        </div> --}}


                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('Front.layouts.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection