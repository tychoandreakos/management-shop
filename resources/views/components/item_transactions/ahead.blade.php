<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic usage</h4>
                <h6 class="card-subtitle">When initializing a typeahead, you pass the plugin method one or more
                    datasets. The source of a dataset is responsible for computing a set of suggestions for a given
                    query.</h6>
                <div id="the-basics">
                    <input class="typeahead form-control" type="text" placeholder="Countries">
                </div>
            </div>
        </div>
    </div>
</div>

@push('css')
    <link href="{{asset("assets/plugins/typeahead.js-master/dist/typehead-min.css")}}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{asset('assets/plugins/typeahead.js-master/dist/typeahead.bundle.min.js')}}"></script>
{{--    @include('components.item_transactions.ahead-script')--}}
@endpush
