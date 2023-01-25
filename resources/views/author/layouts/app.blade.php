<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Author Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    @include('author.layouts.styles')

    @include('author.layouts.scripts')

</head>

<body>
<div id="app">
    <div class="main-wrapper">

        @include('author.layouts.nav')

        @include('author.layouts.sidebar')

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('heading')</h1>
                    <div class="ml-auto">
                        @yield('button')
                    </div>
                </div>


                @yield('main_content')


            </section>
        </div>

    </div>
</div>

@include('author.layouts.scripts_footer')

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.error({
                title:'',
                position:'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

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