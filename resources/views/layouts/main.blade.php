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
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('summary-ckeditor');
</script>
</body>
</html>
