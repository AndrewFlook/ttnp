<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.includes.header')
    </head>
    <body>
        @yield('content')
    </body>
    <!-- Scripts -->
    @include('layouts.includes.footer.scripts')
    <!-- Scripts -->
</html>
