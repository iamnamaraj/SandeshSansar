@extends('front.layouts.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $contact->contact_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="{{'contact'}}">{{ $contact->contact_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

    <div class="page-content">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    {!! $contact->contact_detail !!}
                </div>
                <div class="col-lg-6 col-md-12">
                    <form action="{{ route('contact.send_email') }}" method="post" class="form_contact_ajax">
                        @csrf

                        <div class="contact-form">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name">
                                <span class="text-danger error_text name_error"></span>

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" class="form-control" name="email">
                                <span class="text-danger error_text email_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea class="form-control" rows="3" name="message"></textarea>
                                <span class="text-danger error_text message_error"></span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="map">
                        {!! $contact->contact_map !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        (function($){
            $(".form_contact_ajax").on('submit', function(e){
                e.preventDefault();
                $('#loader').show();
                var form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.error-text').text('');
                    },
                    success:function(data)
                    {
                        $('#loader').hide();
                        if(data.code == 0)
                        {
                            $.each(data.error_message, function(prefix, val) {
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            });
                        }
                        else if(data.code == 1)
                        {
                            $(form)[0].reset();
                            iziToast.success({
                                title: '',
                                position: 'topRight',
                                message: data.success_message,
                            });
                        }

                    }
                });
            });
        })(jQuery);
    </script>
    <div id="loader"></div>


@endsection