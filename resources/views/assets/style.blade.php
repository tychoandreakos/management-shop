<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png')  }}">
<title>{{ env('APP_TITLE')  ?? "Setra App"  }}</title>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
@stack('css')
<!-- chartist CSS -->
<link href="{{ asset('assets/plugins/chartist-js/dist/chartist.min.css')  }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/chartist-js/dist/chartist-init.css')  }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')  }}"
      rel="stylesheet">
<!-- Custom CSS -->
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
<!-- You can change the theme colors from here -->
<link href="{{asset(('assets/css/colors/blue.css'))}}" id="theme" rel="stylesheet">
<style>
    .sidebar-nav > ul > li > a.active {
        background: #fff;
    }

    #cke_1_bottom {
        display: none;
    }
</style>
