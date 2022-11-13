<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD</title>

        <link href="{{ asset('bootstrap-5/bootstrap.css') }}" rel="stylesheet">

    </head>
    <body>

        @include('includes.header')

        @yield('content')

        <script src="{{ asset('bootstrap-5/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('custom.js') }}"></script>
    </body>
</html>
