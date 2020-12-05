@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card-body">
    <h4 class="card-title">Simple Toastr Alerts</h4>
    <h6 class="card-subtitle">You can use four different alert <code>info, warning, success, and error</code> message.
    </h6>
    <div class="button-box">
        <button class="tst1 btn btn-info">Info Message</button>
        <button class="tst2 btn btn-warning">Warning Message</button>
        <button class="tst3 btn btn-success">Success Message</button>
        <button class="tst4 btn btn-danger">Danger Message</button>
    </div>
</div>

@push('css')
    <link href="{{asset('assets/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/toast-master/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
@endpush
