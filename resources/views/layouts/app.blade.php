
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta name="csrf-token" id="token" content="{{csrf_token()}}">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{--    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
    <!-- Fonts -->
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="logo2.png" />
    <!-- Styles -->

</head>
<body>
{{--    <div class="content" id="app">--}}
{{--        @yield("content")--}}
{{--    </div>--}}
<div id="app">
    <router-view></router-view>
</div>

<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>

