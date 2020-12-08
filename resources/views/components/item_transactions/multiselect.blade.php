<div class="row">
    <div class="col-md-12 ">
        <div class="form-group @if($errors->has('name')) has-danger @endif">
            <label>Item Category*</label>
            <select class=" selectpicker" multiple data-live-search="true" name="category[]">
                @foreach($categories as $category)
                    <option value="{{ $category->id  }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @if($errors->has('name'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>

@push('css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select').selectpicker();
        });
    </script>
@endpush
