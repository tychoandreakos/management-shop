@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        @include('components.spinner')
        @include('components.topbar')
        @include('components.left-sidebar')
        <div class="page-wrapper">
            @yield('main')
        </div>
    </div>

@endsection
