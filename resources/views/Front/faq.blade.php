@extends('front.layouts.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $faq->faq_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="{{'faq'}}">{{ $faq->faq_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            @if ($faq->faq_detail != '')

                <div class="col-md-12">
                    {!! $faq->faq_detail !!}
                </div>

            @endif


                @php $i=0; @endphp
            @foreach ($faqs as $faq)
                @php $i++; @endphp

                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $i }}">
                                <button class="accordion-button  @if($loop->iteration != 1) collapsed @endif" type="button"  data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded=" @if($loop->iteration == 1) true @else false @endif" aria-controls="collapse{{ $i }}">
                                    {{ $faq->title }}
                                </button>
                            </h2>

                            <div id="collapse{{ $i }}" class="accordion-collapse collapse  @if($loop->iteration == 1) show  @endif" aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $faq->detail !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>
@endsection