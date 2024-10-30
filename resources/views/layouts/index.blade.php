@include('layouts.head')
<body>
    <script src="{{asset('storage/assets/static/js/initTheme.js')}}"></script>
    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            @include('layouts.header')
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
</body>
@include('layouts.foot')