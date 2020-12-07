@push('css')
    <link href="{{asset('assets/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/toast-master/js/jquery.toast.js') }}"></script>
    <script>
        @if(session('success'))
        $.toast({
            heading: `{{ session('title')  }}`,
            text: `{{ session('message')  }}`,
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        });
        @endif
    </script>
@endpush
