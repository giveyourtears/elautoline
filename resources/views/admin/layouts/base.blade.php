<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MOSART') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/admin/vendor.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/admin/app.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/app.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
</head>
<body>
<div class="admin-panel">

    @include('admin.layouts.header')

    <main class="py-4 container-fluid">
        <div class="row">
        @isset($hide_sidebar)
            @yield('content')
        @else
            <div class="col-2">
                @include('admin.layouts.sidebar')
            </div>
            <div class="col-10">
                @yield('content')
            </div>
        @endisset
        </div>
    </main>

    @include('admin.layouts.footer')
</div>
</body>
</html>
