<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <script src="{{ asset('mix/js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('mix/css/app.css') }}">
    <style>
        body {
            background: #f0f0f0;
        }
    </style>
    @yield('include-styles')
    @yield('style')
</head>
<body>
    @yield('body')
</body>
@yield('include-scripts')
@yield('script')
</html>
