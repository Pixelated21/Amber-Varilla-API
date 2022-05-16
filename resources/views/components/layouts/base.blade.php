@props([
    'title' => 'Halftime Car Rental'
])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@livewireStyles
@stack('style')

<!-- CDN's -->
    <link href='https://css.gg/css' rel='stylesheet'>
@stack('cdn')

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
@stack('script')


<body class="antialiased">
{{$slot}}
<script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@livewireScripts
</body>
</html>
