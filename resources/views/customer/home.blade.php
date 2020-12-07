@extends('components.main-wrapper')

@section('main')
    @include('components.customers.breadcrumbs')
    @include('components.detail.error')
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- .left-right-aside-column-->
                    <div class="contact-page-aside">
                    @include('components.customers.left-aside')
                    @include('components.customers.right-aside')
                    <!-- /.left-right-aside-column-->
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        @include('components.customers.right-sidebar')
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
@endsection

