<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        @if(isset($breadCrumbs))
            <h3 class="text-themecolor">{{ $breadCrumbs  }}</h3>
        @else
            <h3 class="text-themecolor">Default</h3>
        @endif
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item">Apps</li>
            <li class="breadcrumb-item active">Customers</li>
        </ol>
    </div>
    <div class="">
        <button
            class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
            <i class="ti-settings text-white"></i></button>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
