<div class="form-group pl-2 pr-2 @if($errors->has('lname')) has-danger @endif">
    <label>Customer Labels*</label>
    <select class=" selectpicker" multiple data-live-search="true" name="label[]">
        @foreach($labels as $label)
            <option value="{{ $label->id  }}">{{ $label->name }}</option>
        @endforeach
    </select>
    @if($errors->has('lname'))
        <small class="form-control-feedback"> This field has error. </small>
    @endif
</div>



@push('css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            const data = [];
            @if(isset($label))
            $('select').val(data);
            $('select').selectpicker('refresh');
            @else
            $('select').selectpicker();
            @endif
        });
    </script>
@endpush
