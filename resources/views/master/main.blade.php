<html>
<head>
    @include('master.head')
</head>
<body>
<div class="main-wrapper">
    @include('master.header')

    @yield('content')

    @include('master.footer')
</div>
    @include('master.scripts')

</body>
</html>
