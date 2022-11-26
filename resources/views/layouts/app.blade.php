<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Larecipes - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
    </head>
    <body>

        @include('common/header')

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                @include('common/alerts')
                @yield('content')
            </div>
        </section>
        @include('common/footer')
    </body>
</html>