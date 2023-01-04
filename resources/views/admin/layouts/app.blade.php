<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    @include('admin.layouts.styles')

    @include('admin.layouts.scripts')

</head>

<body>
<div id="app">
    <div class="main-wrapper">

        @include('admin.layouts.nav')

        @include('admin.layouts.sidebar')

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('heading')</h1>
                    <div class="ml-auto">
                        {{-- <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Button</a> --}}
                    </div>
                </div>


                @yield('main_content')


            </section>
        </div>

    </div>
</div>

@include('admin.layouts.scripts_footer')

</body>
</html>