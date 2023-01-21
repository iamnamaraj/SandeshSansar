@extends('front.layouts.app')

@section('main_content')

@if ($settings->news_ticker_status == 1)
<div class="news-ticker-item">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="acme-news-ticker">
                    <div class="acme-news-ticker-label">Latest News</div>
                    <div class="acme-news-ticker-box">
                        <ul class="my-news-ticker">

                            @php $i = 0; @endphp
                            @foreach ($posts as $post)
                                @php $i++; @endphp

                                @if ($i>$settings->news_ticker_total)
                                    @break
                                @endif
                                <li><a href="{{ route('front.post.view', $post->id) }}">{{ $post->title }}</a></li>

                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


    <div class="home-main">
        <div class="container">
            <div class="row g-2">
                <div class="col-lg-8 col-md-12 left">

                    @php $i = 0; @endphp
                    @foreach ($posts as $post)
                    @php $i++; @endphp
                    @if ($i>1)
                      @break
                    @endif
                        <div class="inner">
                            <div class="photo">
                                <div class="bg"></div>
                                <img src="{{ asset('uploads/'.$post->photo) }}" alt="">
                                <div class="text">
                                    <div class="text-inner">
                                        <div class="category">
                                            <span class="badge bg-success badge-sm">{{ $post->rSubCategory->name }}</span>
                                        </div>
                                        <h2><a href="{{ route('front.post.view',$post->id) }}">{{ $post->title }}</a></h2>
                                        <div class="date-user">
                                            <div class="user">
                                                @if ($post->author_id == 0)
                                                  @php
                                                  $user_data = \App\models\Admin::where('id', $post->admin_id)->first();
                                                  @endphp
                                                  @else
                                                  {{--- auther section--}}

                                                  @endif
                                                <a href="{{ route('front.post.view',$post->id) }}">{{ $user_data->name }}</a>
                                            </div>
                                            <div class="date">
                                                @php
                                                $ts = strtotime($post->updated_at);
                                                $updated_date =  date('d M Y', $ts);
                                                @endphp
                                                <a href="{{ route('front.post.view',$post->id) }}">{{ $updated_date }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="col-lg-4 col-md-12">

                    @php $i = 0; @endphp
                    @foreach ($posts as $post)
                    @php $i++; @endphp

                        @if ($i == 1)
                            @continue
                        @endif

                        @if ($i>3)
                            @break
                        @endif

                        <div class="inner inner-right">
                            <div class="photo">
                                <div class="bg"></div>
                                <img src="{{ asset('uploads/'.$post->photo) }}" alt="">
                                <div class="text">
                                    <div class="text-inner">
                                        <div class="category">
                                            <span class="badge bg-success badge-sm">{{ $post->rSubCategory->name }}</span>
                                        </div>
                                        <h2><a href="{{ route('front.post.view',$post->id) }}">{{ $post->title }}</a></h2>
                                        <div class="date-user">
                                            <div class="user">
                                                @if ($post->author_id == 0)
                                                @php
                                                $user_data = \App\models\Admin::where('id', $post->admin_id)->first();
                                                @endphp
                                                @else
                                                {{--- auther section--}}

                                                @endif
                                              <a href="{{ route('front.post.view',$post->id) }}">{{ $user_data->name }}</a>
                                            </div>
                                            <div class="date">
                                                @php
                                                $ts = strtotime($post->updated_at);
                                                $updated_date =  date('d M Y', $ts);
                                                @endphp
                                                <a href="{{ route('front.post.view',$post->id) }}">{{ $updated_date }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>
            </div>
        </div>
    </div>

    @if ($home_ad->above_search_ad_status == 'Show')
        <div class="ad-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if ($home_ad->above_search_ad_url == '')
                        <img src="{{ asset('uploads/'.$home_ad->above_search_ad) }}" alt="">

                        @else
                        <a href="{{ $home_ad->above_search_ad_url }}"><img src="{{ asset('uploads/'.$home_ad->above_search_ad) }}" alt=""></a>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="search-section">
        <div class="container">
            <div class="inner">

                <form action="{{ route('search.item') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="search_item" class="form-control" placeholder="Title or Description">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="category" id="category" class="form-select">
                                    <option value="">Select Category</option>
                                    @foreach ( $category_data as $category  )
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="sub_category" id="sub_category" class="form-select">
                                    <option value="">Select SubCategory</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="home-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 left-col">
                    <div class="left">



                        @foreach ($sub_categories as $subcat)

                            @if (count($subcat->rPost) == 0)
                                @continue

                            @endif
                            <!-- News Of Category -->
                            <div class="news-total-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <h2>{{ $subcat->name }}</h2>
                                    </div>
                                    <div class="col-lg-6 col-md-12 see-all">
                                        <a href="{{ route('subcats.view', $subcat->id)}}" class="btn btn-primary btn-sm">See All News</a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                                <div class="row">

                                    @foreach ($subcat->rpost as $post)
                                        @if ($loop->iteration == 2)
                                            @break
                                        @endif
                                        <div class="col-lg-6 col-md-12">
                                            <div class="left-side">
                                                <div class="photo">
                                                    <img src="{{ asset('uploads/'.$post->photo) }}" alt="">
                                                </div>
                                                <div class="category">
                                                    <span class="badge bg-success">{{ $subcat->name }}</span>
                                                </div>
                                                <h3><a href="{{ route('front.post.view', $post->id) }}">{{ $post->title }}</a></h3>
                                                <div class="date-user">
                                                    <div class="user">
                                                        @if ($post->author_id == 0)
                                                            @php
                                                            $user_data = \App\models\Admin::where('id', $post->admin_id)->first();
                                                            @endphp
                                                            @else
                                                            {{--- auther section--}}

                                                        @endif
                                                        <a href="{{ route('front.post.view', $post->id) }}">{{ $user_data->name }}</a>
                                                    </div>
                                                    <div class="date">
                                                        @php
                                                        $ts = strtotime($post->updated_at);
                                                        $updated_date =  date('d M Y', $ts);
                                                        @endphp
                                                        <a href="{{ route('front.post.view', $post->id) }}">{{ $updated_date }}</a>
                                                    </div>
                                                </div>
                                                <div class="post-short-text">
                                                    {!! $post->body !!}

                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                    <div class="col-lg-6 col-md-12">
                                        <div class="right-side">

                                            @foreach ($subcat->rPost as $post)
                                                @if ($loop->iteration == 1)
                                                    @continue
                                                @endif

                                                @if ($loop->iteration == 6)
                                                    @break
                                                @endif
                                                <div class="right-side-item">
                                                    <div class="left">
                                                        <img src="{{ asset('uploads/'.$post->photo) }}" alt="">
                                                    </div>
                                                    <div class="right">
                                                        <div class="category">
                                                            <span class="badge bg-success">{{ $subcat->name }}</span>
                                                        </div>
                                                        <h2><a href="{{ route('front.post.view', $post->id) }}">{{ $post->title }}</a></h2>
                                                        <div class="date-user">
                                                            <div class="user">
                                                                @if ($post->author_id == 0)
                                                                    @php
                                                                    $user_data = \App\models\Admin::where('id', $post->admin_id)->first();
                                                                    @endphp
                                                                @else
                                                                {{--- auther section--}}

                                                                @endif
                                                                <a href="{{ route('front.post.view', $post->id) }}">{{ $user_data->name }}</a>

                                                            </div>
                                                            <div class="date">
                                                                @php
                                                                    $ts = strtotime($post->updated_at);
                                                                    $updated_date =  date('d M Y', $ts);
                                                                @endphp
                                                                <a href="{{ route('front.post.view', $post->id) }}">{{ $updated_date }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // News Of Category -->
                        @endforeach

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 sidebar-col">

                    @include('Front.layouts.sidebar')

                </div>

            </div>
        </div>
    </div>
    <div class="video-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="video-heading">
                        <h2>Videos</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="video-carousel owl-carousel">
                        <div class="item">
                            <div class="video-thumb">
                                <img src="http://img.youtube.com/vi/tvsyp08Uylw/0.jpg" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="http://www.youtube.com/watch?v=tvsyp08Uylw" class="video-button"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-caption">
                                <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                            </div>
                            <div class="video-date">
                                <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-thumb">
                                <img src="http://img.youtube.com/vi/PKATJiyz0iI/0.jpg" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="http://www.youtube.com/watch?v=PKATJiyz0iI" class="video-button"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-caption">
                                <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                            </div>
                            <div class="video-date">
                                <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-thumb">
                                <img src="http://img.youtube.com/vi/ekgUjyWe1Yc/0.jpg" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="http://www.youtube.com/watch?v=ekgUjyWe1Yc" class="video-button"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-caption">
                                <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                            </div>
                            <div class="video-date">
                                <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-thumb">
                                <img src="http://img.youtube.com/vi/LEcpS6pX9kY/0.jpg" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="http://www.youtube.com/watch?v=LEcpS6pX9kY" class="video-button"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-caption">
                                <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                            </div>
                            <div class="video-date">
                                <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                            </div>
                        </div>
                        <div class="item">
                            <div class="video-thumb">
                                <img src="http://img.youtube.com/vi/N88TwF4D2PI/0.jpg" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="http://www.youtube.com/watch?v=N88TwF4D2PI" class="video-button"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <div class="video-caption">
                                <a href="">Haaland scores before going off injured in Dortmund win and it is very real</a>
                            </div>
                            <div class="video-date">
                                <i class="fas fa-calendar-alt"></i> Feb 28, 2022
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    @if ($home_ad->above_footer_ad_status == 'Show' )
        <div class="ad-section-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            @if ($home_ad->above_footer_ad_url == '')
                            <img src="{{ asset('uploads/'.$home_ad->above_footer_ad) }}" alt="">

                            @else
                            <a href="{{ $home_ad->above_footer_ad_url }}"><img src="{{ asset('uploads/'.$home_ad->above_footer_ad) }}" alt=""></a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <script>
        (function ($){
            $(document).ready(function(){
                $("#category").on("change", function(){
                    var categoryId = $("#category").val();
                    if(categoryId){
                        $.ajax({
                            type: "get",
                            url: "{{ url('/subcategory-by-category/') }}" + "/" + categoryId,
                            success: function(response) {
                                $("#sub_category").html(response.sub_category_data);
                            },
                            error: function(err){

                            }
                        })
                    }
                })
            });
        })(jQuery);
    </script>

@endsection