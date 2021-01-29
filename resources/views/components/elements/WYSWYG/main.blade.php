<div class="row">
    <div class="col-md-12 ">
        <div class="form-group @if($errors->has('spec')) has-danger @endif">
            <label>Specification Item*</label>
            <textarea class="textarea_editor form-control" rows="15"
                      name="spec">{{ isset($itemTransaction) ? $itemTransaction->spesificationItem->property : old('spec')  }}</textarea>
            @if($errors->has('spec'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>

@push('css')
    <link rel="stylesheet" href="{{asset('assets/plugins/html5-editor/bootstrap-wysihtml5.css')}}"/>
@endpush


@push('scripts')
    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="{{asset('assets/plugins/html5-editor/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{ asset("assets/plugins/html5-editor/bootstrap-wysihtml5.js")  }}"></script>
    <script>
        $(document).ready(function () {
            $('.textarea_editor').wysihtml5();
        });
    </script>
@endpush
