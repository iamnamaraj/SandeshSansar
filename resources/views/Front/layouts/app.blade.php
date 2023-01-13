<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="">
        <title>SandeshSansar</title>

        <link rel="icon" type="image/png" href="uploads/front_favicon.png">

        @include('Front.layouts.styles')


        @include('Front.layouts.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>

        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-84213520-6');
        </script>

    </head>
    <body>
        @include('Front.layouts.nav')

        @yield('main_content')

        @include('Front.layouts.footer')

        @include('Front.layouts.footer_scripts')



        {{-- for subscriber section --}}

        <script>
            (function($){
                $(".form_subscribe_ajax").on('submit', function(e){
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




        {{-- iziToast for showing session error or success message --}}

        @if (session()->get('error'))
            <script>
                iziToast.error({
                    title:'',
                    position:'topRight',
                    message: '{{ session()->get('error') }}',
                });
            </script>
        @endif

        @if (session()->get('success'))
            <script>
                iziToast.success({
                    title:'',
                    position:'topRight',
                    message: '{{ session()->get('success') }}',
                });
            </script>
        @endif



    </body>

</html>