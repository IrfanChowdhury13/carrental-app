<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.frontend.includes.metas')

    <title>{{ config('app.name') }}</title>

    @include('layouts.frontend.includes.styles')
</head>
<body>
    
    <div id="app">
        @include('components.frontend.nav')
        @yield('content')
        @include('components.frontend.footer')
    </div>

    @include('layouts.frontend.includes.backtotop')
    @include('layouts.frontend.includes.scripts')
</body>
</html>
