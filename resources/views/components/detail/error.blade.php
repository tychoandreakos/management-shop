@push('css')
    <link href="{{asset('assets/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/toast-master/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
        @if($errors->any())
        $.toast({
            heading: 'Oops, there is something errors',
            text: `
            <ul>
                @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
                @endforeach
            </ul>
`,
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 3500

        });
        @endif
    </script>
@endpush
