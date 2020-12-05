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
            <li class="breadcrumb-item"><a href="{{ route('customers.home')  }}">Home</a></li>
            <li class="breadcrumb-item">Apps</li>
            @if(isset($breadCrumbs))
                <li class="breadcrumb-item active">{{ $breadCrumbs  }}</li>
            @else
                <li class="breadcrumb-item active">Default</li>
            @endif
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
