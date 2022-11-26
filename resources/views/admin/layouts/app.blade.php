<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <x-head.tinymce-config/>

    @vite('resources/css/app.css')
</head>
<body>

@include('admin/common/header')

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        @include('common/alerts')
        @yield('content')
    </div>
</section>
@include('common/footer')
</body>
</html>
