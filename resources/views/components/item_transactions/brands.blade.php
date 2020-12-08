<div class="row">
    <div class="col-md-12 ">
        <div class="form-group @if($errors->has('bname')) has-danger @endif">
            <label>Brand Name*</label>
            <input value="{{ old('bname')  }}" name="bname" type="text" class="nmb form-control">
            @if($errors->has('bname'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group @if($errors->has('location')) has-danger @endif">
            <label>Brand Location</label>
            <input value="{{ old('location') }}" name="location" type="text"
                   class="lc form-control">
            @if($errors->has('location'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
        <div class="form-group @if($errors->has('founded')) has-danger @endif">
            <label>Brand Founded</label>
            <input value="{{ old('founded')  }}" name="founded" type="text"
                   class="fd form-control">
            @if($errors->has('founded'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        (function () {
            const path = "{{ route('brands.autocomplete') }}";
            $('input.nmb').typeahead({
                source: function (query, process) {
                    return $.get(path, {query: query}, function (data) {
                        $('.lc').val(data[0].location)
                        $('.fd').val(data[0].founded)
                        return process(data);
                    });
                }
            });

            $('input.nmb').blur(function () {
                if ($(this).val() === "") {
                    $('.lc').val("")
                    $('.fd').val("")
                }
            })
        })()
    </script>
@endpush
