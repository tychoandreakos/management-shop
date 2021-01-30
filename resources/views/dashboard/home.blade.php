@extends('components.main-wrapper')

@section('main')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    @include('components.customers.breadcrumbs')
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->

    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            @include('components.dashboards.graphic')
            <div class="col-lg-4 col-md-5">
                <!-- Column -->
            @include('components.dashboards.order-stats')
            <!-- Column -->
                <div class="card card-default">
                    @include('components.dashboards.latest-product')
                    @include('components.dashboards.product-overview')
                </div>
            </div>
        </div>
        <!-- footer -->
        <!-- ============================================================== -->
    @include('components.dashboards.footer')
    <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection

@push('css')
    <!-- Morries chart CSS -->
    <link href="{{asset('assets/plugins/morrisjs/morris.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{asset('assets/plugins/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('assets/plugins/morrisjs/morris.min.js')}}"></script>
    <!-- sparkline chart -->
    <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
@endpush

