<html>
<head>
    @include('master.head')
</head>
<body>
<div class="main-wrapper">
    @include('master.doc-header')

    @yield('content')

    @include('master.footer')
</div>
    @include('master.scripts')

</body>
</html>
