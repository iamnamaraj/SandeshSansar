<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li class="today-text">Today: January 20, 2022</li>
                    <li class="email-text">princenc111gmail.com</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="right">

                    @if ($global_page_data->faq_status == 'Show')
                        <li class="menu"><a href="{{ route('faq') }}">{{ $global_page_data->faq_title }}</a></li>
                    @endif


                    @if ($global_page_data->about_status == 'Show')
                        <li class="menu"><a href="{{route('about')}}">{{ $global_page_data->about_title }}</a></li>
                    @endif

                    <li class="menu"><a href="contact.html">Contact</a></li>

                    @if ($global_page_data->login_status == 'Show')
                        <li class="menu"><a href="{{ route('login') }}">{{ $global_page_data->login_title }}</a></li>
                    @endif


                    <li>
                        <div class="language-switch">
                            <select name="">
                                <option value="">English</option>
                                <option value="">Hindi</option>
                                <option value="">Arabic</option>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="heading-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('uploads/front_logo.png') }}" alt="">
                    </a>
                </div>
            </div>

            @if ($global_top_ad_data->top_ad_status == 'Show')
                <div class="col-md-8">
                    <div class="ad-section-1">
                        @if ($global_top_ad_data->top_ad__url == '')
                            <a href=""><img src="{{ asset('uploads/'.$global_top_ad_data->top_ad) }}" alt=""></a>

                        @else
                        <a href="{{ $global_top_ad_data->top_ad__url }}"><img src="{{ asset('uploads/'.$global_top_ad_data->top_ad) }}" alt=""></a>

                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

<div class="website-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                            </li>


                            @foreach ($global_categories as $category)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void;" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $category->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                       @foreach ($category->rSubCategory as $subcat)
                                            <li><a class="dropdown-item" href="{{ route('subcats.view', $subcat->id) }}">{{ $subcat->name }}</a></li>
                                       @endforeach
                                    </ul>
                                </li>
                            @endforeach




                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sports
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Photo</a></li>
                                    <li><a class="dropdown-item" href="#">video</a></li>
                                </ul>
                            </li> --}}



                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>