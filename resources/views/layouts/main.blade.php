<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('assets/meta')
    @include('assets/style')
    @include('assets/profil')
</head>

<body class="fix-header fix-sidebar card-no-border">
@yield('content')
<!-- ============================================================== -->
<!-- End Wrapper -->
@include('assets/javascript')
</body>
</html>
