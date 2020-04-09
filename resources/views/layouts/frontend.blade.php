<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    @if(isset($settings))
        @if($settings['color'] === 'red')
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @else
            <link href="{{ asset('css/black_theme.css') }}" rel="stylesheet">
        @endif
    @else
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif

    <title>{{ $settings->title ?? ''}}</title>

</head>
<body>
    @yield('content')
</body>
</html>
